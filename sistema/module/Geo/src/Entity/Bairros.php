<?php

namespace Geo\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Shift\Entity\BaseEntity;
use Shift\SM;

/**
 * @ORM\Table(name="bairros")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Bairros
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
     * @ORM\Column(type="string")
     */
    protected $nome;
    
    /**
     * @var Filtro
     *
     * @ORM\ManyToOne(targetEntity="Cidades", inversedBy="filhos")
     * @ORM\JoinColumn(name="cidade_id", referencedColumnName="id")
     */
    protected $pai;
    
    
    public function __construct()
    {
        parent::__construct();
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
    
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }
    
    public function setPai($pai)
    {
        $this->pai = $pai;
        return $this;
    }

    public function getPai()
    {
        return $this->pai;
    }
    
}
