<?php

namespace Usuarios\Form;

use Usuarios\Entity\Usuario;
use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ArraySerializable as ArraySerializableHydrator;

class UsuarioForm extends Form
{
    public function __construct()
    {
        parent::__construct('usuario_form');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'type' => 'Usuarios\Form\UsuarioFieldset',
            'options' => array(
                'use_as_base_fieldset' => true,
            )
        ));
        $this->add(array(
            'name' => 'csrf',
            'type' => 'Shift\Form\Element\Csrf',
        ));
    }

    public function isValid()
    {
        // No caso de edição, remove a obrigatoriedade da senha.
        if ($this->data['usuario']['id']) {
            $this->getInputFilter()->get('usuario')->get('senha')->setRequired(false);
            $this->getInputFilter()->get('usuario')->get('senha2')->setRequired(false);
        }
        return parent::isValid();
    }
}
