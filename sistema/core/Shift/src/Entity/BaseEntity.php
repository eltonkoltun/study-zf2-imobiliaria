<?php

namespace Shift\Entity;

use Doctrine\ORM\Mapping as ORM;
use Shift\SM;

/**
 * BaseEntity
 *
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks
 */
class BaseEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="cliente_id", type="integer")
     */
    protected $cliente_id;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="criacao", type="datetime")
     */
    protected $criacao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="alteracao", type="datetime")
     */
    protected $alteracao;


    /**
     * @var boolean
     *
     * @ORM\Column(name="visivel", type="boolean")
     */
    protected $visivel;

    public function __construct()
    {
        $this->setVisivel(true);
    }

    /**
     * Obtém o id da entidade.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Chamado automaticamente pelo entity manager do doctrine, define as datas de criação e modificação do registro.
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function defineTimestamps()
    {
        $this->setAlteracao(new \DateTime());
        if (!$this->getCriacao()) {
            $this->setCriacao($this->getAlteracao());
        }
    }

    /**
     * Log das operações de insert e update.
     *
     * @ORM\PostPersist
     * @ORM\PostUpdate
     */
    public function log()
    {
        $log = array();
        // Identifica o usuário logado
        $usuarioLogado = SM::get('usuarios.session.usuarios')->getUsuarioLogado();
        if ($usuarioLogado) {
            $log['usuarioLogado'] = array('id' => $usuarioLogado->getId(), 'nome' => $usuarioLogado->getNome());
        } else {
            $log['usuarioLogado'] = array('id' => 0, 'nome' => 'Usuário não identificado');
        }
        // Nome da entidade
        $entidade = get_class($this);
        $log['entidade'] = substr($entidade, strrpos($entidade, '\\') + 1);
        // Trata os atributos
        $vars = get_object_vars($this);
        foreach ($vars as &$var) {
            if ($var instanceof BaseEntity) {
                $var = $var->getId();
            } else if ($var instanceof \Datetime) {
                $var = $var->format('d/m/Y H:i:s');
            }
        }
        // Se tiver um campo "senha", deverá ser omitido
        unset($vars['senha']);
        //
        $log['propriedades'] = $vars;
        $logger = SM::get('db_logger');
        $logger->info(json_encode($log));
        // $logger->info($vars);
    }

    /**
     * Seta a o id do cliente.
     * 
     * @param $cliente_id
     * @return BaseEntity
     */
    public function setClienteId()
    {
        // seta o cliente, o ID inserido aqui vem de /Core/Shift/Module.php
        $this->cliente_id = SM::getCliente()->id;
        return $this;
    }

    /**
     * Obtém o id do cliente.
     */
    public function getClienteId()
    {
        return $this->cliente_id;
    }
    
    /**
     * Seta a data e hora de criação da entidade.
     *
     * @param \DateTime $criacao
     * @return BaseEntity
     */
    public function setCriacao($criacao)
    {
        $this->criacao = $criacao;
        return $this;
    }

    /**
     * Obtém a data e hora de criação da entidade.
     *
     * @return \DateTime
     */
    public function getCriacao($formatted = false)
    {
        if ($formatted) {
            $formatter = SM::get('shift.formatter.date_time_formatter');
            return $formatter->format($this->criacao);
        }
        return $this->criacao;
    }

    /**
     * Seta a data e hora de modificação da entidade.
     *
     * @param \DateTime $alteracao
     * @return BaseEntity
     */
    public function setAlteracao($alteracao)
    {
        $this->alteracao = $alteracao;
        return $this;
    }

    /**
     * Obtém a data e hora de modificação da entidade.
     *
     * @return \DateTime
     */
    public function getAlteracao($formatted = false)
    {
        if ($formatted) {
            $formatter = SM::get('shift.formatter.date_time_formatter');
            return $formatter->format($this->alteracao);
        }
        return $this->alteracao;
    }

    /**
     * Define se a entidade deve ou não estar visível.
     *
     * @param boolean $visivel
     * @return BaseEntity
     */
    public function setVisivel($visivel)
    {
        $this->visivel = $visivel;
        return $this;
    }

    /**
     * Obtém o status de visibilidade da entidade.
     *
     * @return boolean Retorna true se a entidade estiver visível ou false caso não esteja.
     */
    public function isVisivel()
    {
        return $this->visivel;
    }
}
