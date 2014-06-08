<?php

namespace Geo\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Shift\Entity\BaseEntity;
use Shift\SM;

/**
 * @ORM\Table(name="cidades")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Cidades
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
     * @ORM\ManyToOne(targetEntity="Estados", inversedBy="filhos")
     * @ORM\JoinColumn(name="estado_id", referencedColumnName="id")
     */
    protected $pai;
    
    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Bairros", mappedBy="pai", indexBy="id", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\OrderBy({"nome"="asc"})
     */
    protected $filhos;

   
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
    
    public function getFilhos()
    {
        return $this->filhos;
    }

}
