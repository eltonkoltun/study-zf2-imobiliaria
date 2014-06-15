<?php

namespace Filtros\Form;

use Zend\Form\Form;
use Shift\SM;

class FiltroForm extends Form
{

    public function __construct()
    {
        parent::__construct('filtro_form');
        
        $this->add(array(
            'name' => 'csrf',
            'type' => 'Shift\Form\Element\Csrf',
        ));        
        
        $this->add(array(
            'name' => 'id',
            'type' => 'Zend\Form\Element\Hidden',
        ));
        
        $this->add(array(
            'name' => 'nome',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'id' => 'nome',
                'class' => 'form-control'
            ),
        ));
        $this->add(array(
            'name' => 'pai',
            'type'  => 'Zend\Form\Element\Select',
//            'type'  => 'DoctrineModule\Form\Element\ObjectSelect',
            'attributes' => array(
                'id' => 'pai',
                'class' => 'form-control',
                'options' => SM::get('filtros.service.filtros')->lista(),
            ),
        ));
        $this->add(array(
            'name' => 'visivel',
            'type' => 'Zend\Form\Element\Checkbox',
            'attributes' => array(
                'type'  => 'checkbox',
                'id' => 'visivel',
            ),
        ));
    }

}
