<?php

namespace Geo\Service;

use DateTime;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator;
use Shift\Service\BaseService;
use Geo\Entity\Pais;
use Zend\Paginator\Paginator;

class CidadesService extends BaseService {

    public function get($id, $args = array()) {
        
        return $this->em->getRepository('Geo\Entity\Cidades')->findOneBy(array('id' => $id) + $args);
    }

    public function collection($args = array(), $pagina = null) {

        $params = array();

        $dql = "
            select p
            from Geo\Entity\Cidades p
        ";
        
        $dql .= '
            order by p.nome
        ';
        
        $query = $this->em->createQuery($dql);
        $query->setParameters($params);
        if ($pagina === null) {
            return $query->getResult();
        }
        $paginator = new Paginator(
                new DoctrinePaginator(new ORMPaginator($query))
        );
        $paginator->setCurrentPageNumber($pagina);
        return $paginator;
    }

}
