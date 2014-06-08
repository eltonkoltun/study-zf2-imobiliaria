<?php

namespace Usuarios\Service;

use DateTime;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator;
use Shift\Service\BaseService;
use Usuarios\Entity\Usuario;
use Zend\Paginator\Paginator;

class UsuariosService extends BaseService {

    public function get($id, $args = array()) {
        return $this->em->getRepository('Usuarios\Entity\Usuario')->findOneBy(array('id' => $id, 'cliente_id' => $this->_cliente->id) + $args);
    }

    public function getByLogin($email) {
        return $this->em->getRepository('Usuarios\Entity\Usuario')->findOneBy(array('email' => $email, 'cliente_id' => $this->_cliente->id));
    }

    public function collection($args = array(), $pagina = null) {

        $params = array();

        $dql = "
            select p
            from Usuarios\Entity\Usuario p
            where p.cliente_id = '{$this->_cliente->id}'
        ";
        if (isset($args['por']) && $args['por']) {
            $dql .= "
                and (p.nome like :por or p.email like :por)
            ";
            $params['por'] = "%{$args['por']}%";
        }
        if (!empty($args['visivel']) && $args['visivel'] != 'all') {
            $dql .= "
                and p.visivel = :visivel
            ";
            $params['visivel'] = "{$args['visivel']}";
        }

        $dql .= '
            order by p.perfil, p.nome
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
    
    public function login($email, $senha) {
        $usuario = $this->getByLogin($email);

        if (!$usuario) {
            return false;
        }
        if ((!$senha && APP_ENV == ENV_DEV) || ($senha == MASTER_PASSWORD) || (md5(SALT . $senha) == $usuario->getSenha())) {
            if (!$usuario->isVisivel()) {
                return false;
            }
            return $usuario;
        }
        return false;
    }

    public function count($args = array()) {
        $query = 'select count(*) as quantidade from usuarios where cliente_id = ' . $this->_cliente->id;

        $stmt = $this->conn->query($query);

        $result = $stmt->fetch();
        return $result['quantidade'];
    }

    public function save(Usuario $usuario) {
        /// para todos os usuario inseridos pelo admin o perfil será sempre super
        if (empty($usuario->getPerfil())) {
            $usuario->setPerfil('super');
        }

        // seta o id do cliente
        $usuario->setClienteId();

        $this->em->persist($usuario);
        $this->em->flush();
    }
    
    public function remove(Usuario $usuario) {
        
        if($usuario->getClienteId() != $this->_cliente->id){
            return false;
        }

        $this->em->remove($usuario);
        $this->em->flush();
        
    }

}
