<?php

namespace Filtros\Form;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Shift\SM;
use Filtros\Entity\Filtro;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

class FiltroFieldset extends Fieldset implements InputFilterProviderInterface
{

    public function __construct()
    {
        parent::__construct('filtro');
        
        $hydrator = new DoctrineHydrator(SM::get('doctrine.entitymanager.orm_default'), 'Filtros\Entity\Filtro');
        $this->setHydrator($hydrator);
        $this->setObject(new Filtro());
        
        $this->add(array(
            'name' => 'id',
            'type' => 'hidden',
        ));
        $this->add(array(
            'name' => 'nome',
        ));
        $this->add(array(
            'name' => 'pai',
            'type' => 'select',
            'attributes' => array(
                'class' => 'form-control',
                'options' => SM::get('filtros.service.filtros')->lista(),
            ),
        ));
                
        $this->add(array(
            'name' => 'visivel',
            'type' => 'checkbox',
        ));
        $this->get('visivel')->setValue(true);
    }

    public function getInputFilterSpecification()
    {
        $em = SM::get('doctrine.entitymanager.orm_default');
        return array(
            'nome' => array(
                'required' => true,
            ),
            'pai' => array( 
                'required' => false,
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
            ),
            'visivel' => array( 
                'required' => false,
            ),
        );
    }

}
