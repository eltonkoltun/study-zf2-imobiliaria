<?php

namespace Cms\Form;

use Zend\Form\Form;

class CmsSearchForm extends Form
{
    public function __construct()
    {
        parent::__construct('cms_search_form');

        $this->add(array(
            'name' => 'por'
        ));
    }
}
