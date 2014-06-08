<?php

namespace Cms\Form;

use Cms\Entity\Cms;
use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ArraySerializable as ArraySerializableHydrator;

class CmsForm extends Form
{
    public function __construct()
    {
        parent::__construct('cms_form');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'type' => 'Cms\Form\CmsFieldset',
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
