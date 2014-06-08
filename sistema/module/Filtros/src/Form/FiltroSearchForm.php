<?php

namespace Filtros\Form;

use Zend\Form\Form;

class FiltroSearchForm extends Form
{
    public function __construct()
    {
        parent::__construct('filtro_search_form');

        $this->add(array(
            'name' => 'por'
        ));
    }
}
