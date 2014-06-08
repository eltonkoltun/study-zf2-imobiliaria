<?php

namespace Filtros\Form;

use Filtros\Entity\Filtro;
use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ArraySerializable as ArraySerializableHydrator;

class FiltroForm extends Form
{
    public function __construct()
    {
        parent::__construct('filtro_form');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'type' => 'Filtros\Form\FiltroFieldset',
            'options' => array(
                'use_as_base_fieldset' => true,
            )
        ));
        $this->add(array(
            'name' => 'csrf',
            'type' => 'Shift\Form\Element\Csrf',
        ));
    }
}
