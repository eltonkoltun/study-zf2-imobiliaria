<?php

namespace Usuarios\Form;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Shift\SM;
use Usuarios\Entity\Usuario;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

class UsuarioFieldset extends Fieldset implements InputFilterProviderInterface
{

    public function __construct()
    {
        parent::__construct('usuario');
        $hydrator = new DoctrineHydrator(SM::get('doctrine.entitymanager.orm_default'), 'Usuarios\Entity\Usuario');
        $this->setHydrator($hydrator);
        $this->setObject(new Usuario());
        $this->add(array(
            'name' => 'id',
            'type' => 'hidden',
        ));
        $this->add(array(
            'name' => 'nome',
        ));
        $this->add(array(
            'name' => 'email',
        ));
        $this->add(array(
            'name' => 'senha',
        ));
        $this->add(array(
            'name' => 'senha2',
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
            'email' => array(
                'required' => true,
                'validators' => array(
                    array(
                        'name' => 'EmailAddress',
                    ),
                    array(
                        'name' => 'DoctrineModule\Validator\UniqueObject',
                        'options' => array(
                            'object_manager' => $em,
                            'object_repository' => $em->getRepository('Usuarios\Entity\Usuario'),
                            'fields' => 'email',
                            'messages' => array(
                                'objectNotUnique' => 'Este email não pode ser utilizado.',
                            ),
                        ),
                    ),
                ),
            ),
            'senha' => array(
                'required' => true,
                'validators' => array(
                    array(
                        'name' => 'Identical',
                        'options' => array(
                            'token' => 'senha2',
                            'messages' => array(
                                'notSame' => 'As senhas não combinam.',
                            ),
                        ),
                    ),
                ),
            ),
            'senha2' => array(
                'required' => true,
            ),
            'visivel' => array(
                'required' => false,
            ),
        );
    }

}
