<?php

namespace Filtros\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Shift\Entity\BaseEntity;
use Shift\SM;

/**
 * @ORM\Table(name="filtros")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Filtro extends BaseEntity
{

    /**
     * @ORM\Column(type="string")
     */
    protected $nome;

    /**
     * @var Filtro
     *
     * @ORM\ManyToOne(targetEntity="Filtro", inversedBy="filhos")
     * @ORM\JoinColumn(name="filtro_id", referencedColumnName="id")
     */
    protected $pai;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Filtro", mappedBy="pai", indexBy="id", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\OrderBy({"id"="asc"})
     */
    protected $filhos;
    

    public function __construct()
    {
        parent::__construct();
        $this->filhos = new ArrayCollection();
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

    /**
     * @param Filtro $filho
     * @return Filtro
     */
    public function addFilho(Filtro $filho)
    {
        $filho->setPai($this);
        $this->filhos->add($filho);
        return $this;
    }

    /**
     * @param Filtro $filho
     * @return Filtro
     */
    public function removeFilho(Filtro $filho)
    {
        $this->filhos->removeElement($filho);
        $filho->setPai(null);
        return $this;
    }

    public function getFilhos()
    {
        return $this->filhos;
    }

}
