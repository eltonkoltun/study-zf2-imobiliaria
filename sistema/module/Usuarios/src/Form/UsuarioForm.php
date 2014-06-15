<?php

namespace Usuarios\Form;

use Zend\Form\Form;

class UsuarioForm extends Form
{
    public function __construct()
    {
        parent::__construct('usuario_form');
                
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
                'id' => 'titulo',
                'class' => 'form-control'
            ),
        ));
        $this->add(array(
            'name' => 'email',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'id' => 'titulo',
                'class' => 'form-control'
            ),
        ));
        $this->add(array(
            'name' => 'senha',
            'type' => 'Zend\Form\Element\Password',
            'attributes' => array(
                'id' => 'titulo',
                'class' => 'form-control'
            ),
        ));
        $this->add(array(
            'name' => 'senha2',
            'type' => 'Zend\Form\Element\Password',
            'attributes' => array(
                'id' => 'titulo',
                'class' => 'form-control'
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

    public function isValid()
    {
        // No caso de edição, remove a obrigatoriedade da senha.
        if ($this->data['id']) {
            $this->getInputFilter()->get('senha')->setRequired(false);
            $this->getInputFilter()->get('senha2')->setRequired(false);
        }
        return parent::isValid();
    }
}
