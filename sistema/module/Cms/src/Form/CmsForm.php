<?php

namespace Cms\Form;

use Zend\Form\Form;

class CmsForm extends Form
{
    public function __construct()
    {
        parent::__construct('cms_form');
        
        $this->add(array(
            'name' => 'csrf',
            'type' => 'Shift\Form\Element\Csrf',
        ));        
        
        $this->add(array(
            'name' => 'id',
            'type' => 'Zend\Form\Element\Hidden',
        ));
        
        $this->add(array(
            'name' => 'titulo',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'id' => 'titulo',
                'class' => 'form-control'
            ),
        ));
        $this->add(array(
            'name' => 'texto',
            'type' => 'Zend\Form\Element\Textarea',
            'attributes' => array(
                'id' => 'texto',
                'class' => 'form-control'
            ),
        ));
        $this->add(array(
            'name' => 'metaDescricao',
            'type' => 'Zend\Form\Element\Textarea',
            'attributes' => array(
                'id' => 'metaDescricao',
                'class' => 'form-control'
            ),
        ));
        $this->add(array(
            'name' => 'metaPalavrasChave',
            'type' => 'Zend\Form\Element\Textarea',
            'attributes' => array(
                'id' => 'metaPalavrasChave',
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
}
