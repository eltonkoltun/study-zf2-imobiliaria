<?php

namespace Cms\Service;

use DateTime;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator;
use Shift\Service\BaseService;
use Cms\Entity\Cms;
use Zend\Paginator\Paginator;

class CmsService extends BaseService {

    public function get($id, $args = array()) {
        
        return $this->em->getRepository('Cms\Entity\Cms')->findOneBy(array('id' => $id, 'cliente_id' => $this->_cliente->id) + $args);
    }

    public function collection($args = array(), $pagina = null) {

        $params = array();

        $dql = "
            select c
            from Cms\Entity\Cms c
            where c.cliente_id = '{$this->_cliente->id}'
        ";
        if (isset($args['por']) && $args['por']) {
            $dql .= "
                and (c.titulo like :por)
            ";
            $params['por'] = "%{$args['por']}%";
        }
        if (!empty($args['visivel']) && $args['visivel'] != 'all') {
            $dql .= "
                and c.visivel = :visivel
            ";
            $params['visivel'] = "{$args['visivel']}";
        }

        $dql .= '
            order by c.titulo
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

    public function count($args = array()) {
        $query = 'select count(*) as quantidade from cms where cliente_id = ' . $this->_cliente->id;

        $stmt = $this->conn->query($query);

        $result = $stmt->fetch();
        return $result['quantidade'];
    }

    public function save(Cms $cms) {

        // seta o id do cliente
        $cms->setClienteId();
        
        // seta pagina fixa
        if(!$cms->isFixa()){
            $cms->setFixa(0);
        }

        $this->em->persist($cms);
        $this->em->flush();
    }
    
    public function remove(Cms $cms) {
        
        if($cms->getClienteId() != $this->_cliente->id){
            return false;
        }

        $this->em->remove($cms);
        $this->em->flush();
        
    }

}
