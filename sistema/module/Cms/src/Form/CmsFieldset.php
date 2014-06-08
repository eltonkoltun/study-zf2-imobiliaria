<?php

namespace Cms\Form;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Shift\SM;
use Cms\Entity\Cms;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

class CmsFieldset extends Fieldset implements InputFilterProviderInterface
{

    public function __construct()
    {
        parent::__construct('cms');
        $hydrator = new DoctrineHydrator(SM::get('doctrine.entitymanager.orm_default'), 'Cms\Entity\Cms');
        $this->setHydrator($hydrator);
        $this->setObject(new Cms());
        
        $this->add(array(
            'name' => 'id',
            'type' => 'hidden',
        ));
        $this->add(array(
            'name' => 'titulo',
        ));
        $this->add(array(
            'name' => 'texto',
        ));
        $this->add(array(
            'name' => 'metaDescricao',
        ));
        $this->add(array(
            'name' => 'metaPalavrasChave',
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
            'titulo' => array(
                'required' => true,
            ),
            'texto' => array(
                'required' => false,
            ),
            'metaDescricao' => array(
                'required' => false,
            ),
            'metaPalavrasChave' => array(
                'required' => false,
            ),
            'visivel' => array( 
                'required' => false,
            ),
        );
    }

}
