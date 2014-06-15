<?php

namespace Filtros\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Shift\Entity\BaseEntity;
use Shift\SM;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

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
     * @ORM\OrderBy({"nome"="asc"})
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
    
    /**
     * Configura os filtros dos campos da entidade
     *
     * @return Zend\InputFilter\InputFilter
     */
    public function getInputFilter()
    {
        if (!isset($this->inputFilter)) {
            
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();
            
            $inputFilter->add($factory->createInput(array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name'     => 'nome',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'min'      => 1,
                            'max'      => 60,
                        ),
                    ),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name'     => 'pai',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
                'validators' => array(
                    array(
                        'name' => 'InArray',
                        'options' => array(
                            'haystack' => array_keys(SM::get('filtros.service.filtros')->lista()),
                            'messages' => array(
                                'notInArray' => 'O item selecionado não está na lista'
                            ),
                        ),
                    ),
                ),
            )));
           
            $inputFilter->add($factory->createInput(array(
                'name'     => 'visivel',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Boolean')
                )
            )));
            
            $this->inputFilter = $inputFilter;
        }
        
        return $this->inputFilter;
        
    }
    
}
