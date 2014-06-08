<?php

namespace Usuarios\Form;

use Shift\SM;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

class LoginFieldset extends Fieldset implements InputFilterProviderInterface
{

    public function __construct()
    {
        parent::__construct('usuario');
        $this->add(array(
            'name' => 'email',
        ));
        $this->add(array(
            'name' => 'senha',
        ));
    }

    public function getInputFilterSpecification()
    {
        $em = SM::get('doctrine.entitymanager.orm_default');
        $specs = array(
            'email' => array(
                'required' => true,
                'filters' => array(
                    array('name' => 'StringTrim'),
                    array('name' => 'StripTags'),
                ),
            ),
        );
        if (APP_ENV != ENV_DEV) {
            $specs['senha'] = array(
                'required' => true,
            );
        }
        return $specs;
    }

}
