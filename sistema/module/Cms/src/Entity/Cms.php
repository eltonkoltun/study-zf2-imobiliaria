<?php

namespace Cms\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Shift\Entity\BaseEntity;
use Shift\SM;

/**
 * @ORM\Table(name="cms")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Cms extends BaseEntity
{

    /**
     * @ORM\Column(type="string")
     */
    protected $titulo;

    /**
     * @ORM\Column(type="text")
     */
    protected $texto;

    /**
     * @ORM\Column(type="string")
     * @ORM\Column(name="meta_descricao", type="string")
     */
    protected $metaDescricao;

    /**
     * @ORM\Column(type="string")
     * @ORM\Column(name="meta_palavras_chave", type="string")
     */
    protected $metaPalavrasChave;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $fixa;

    public function __construct()
    {
        parent::__construct();
    }


    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
        return $this;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTexto($texto)
    {
        $this->texto = $texto;
        return $this;
    }

    public function getTexto()
    {
        return $this->texto;
    }

    public function setMetaDescricao($metaDescricao)
    {
        $this->metaDescricao = $metaDescricao;
        return $this;
    }

    public function getMetaDescricao()
    {
        return $this->metaDescricao;
    }
    
    public function setMetaPalavrasChave($metaPalavrasChave)
    {
        $this->metaPalavrasChave = $metaPalavrasChave;
        return $this;
    }

    public function getMetaPalavrasChave()
    {
        return $this->metaPalavrasChave;
    }
    
    /**
     * @param boolean $fixa
     */
    public function setFixa($fixa)
    {
        $this->fixa = $fixa;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isFixa()
    {
        return $this->fixa;
    }

}
