<?php

namespace Filtros\Service;

use DateTime;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator;
use Shift\Service\BaseService;
use Filtros\Entity\Filtro;
use Zend\Paginator\Paginator;

class FiltrosService extends BaseService {

    public function get($id, $args = array()) {
        
        return $this->em->getRepository('Filtros\Entity\Filtro')->findOneBy(array('id' => $id, 'cliente_id' => $this->_cliente->id) + $args);
    }

    public function collection($args = array(), $pagina = null) {

        $params = array();

        $dql = "
            select f
            from Filtros\Entity\Filtro f
            where f.cliente_id = '{$this->_cliente->id}'
        ";
        if (isset($args['por']) && $args['por']) {
            $dql .= "
                and (f.nome like :por)
            ";
            $params['por'] = "%{$args['por']}%";
        }
        if (!empty($args['visivel']) && $args['visivel'] != 'all') {
            $dql .= "
                and f.visivel = :visivel
            ";
            $params['visivel'] = "{$args['visivel']}";
        }

        $dql .= '
            order by f.nome
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
    
    public function lista(){
        
        $result = $this->collection(array('pai_id' => ''));
        
        $arr = array('' => 'Selecione...');
        
        foreach($result as $value){
            $arr[$value->getId()] = $value->getNome();
        }
        
        return $arr;
        
    }

    public function count($args = array()) {
        
        $query = 'select count(*) as quantidade from filtros where cliente_id = ' . $this->_cliente->id;

        $stmt = $this->conn->query($query);

        $result = $stmt->fetch();
        return $result['quantidade'];
    }

    public function save(Filtro $filtro) {

        // seta o id do cliente
        $filtro->setClienteId();

        $this->em->persist($filtro);
        $this->em->flush();
    }
    
    public function remove(Filtro $filtro) {
        
        if($filtro->getClienteId() != $this->_cliente->id){
            return false;
        }

        $this->em->remove($filtro);
        $this->em->flush();
        
    }

}
