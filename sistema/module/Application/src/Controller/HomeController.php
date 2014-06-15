<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Shift\SM;

class HomeController extends AbstractActionController
{

    public function indexAction()
    {   
        return new ViewModel();
    }

}
