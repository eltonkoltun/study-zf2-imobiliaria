<?php

namespace Usuarios\Controller;

use Shift\SM;
use Usuarios\Entity\Usuario;
use Usuarios\Form\UsuarioFieldset;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class UsuariosController extends AbstractActionController {

    private $usuariosService;

    public function __construct() {
        $this->usuariosService = SM::get('usuarios.service.usuarios');
        $this->_usuario = SM::getCliente();
    }

    public function indexAction() {

        $usuarios = null;
        $form = SM::get('usuarios.form.usuario_search');
        $emPesquisa = $this->emPesquisa();
        if ($emPesquisa) {
            $form->setData($this->params()->fromQuery());
            if ($form->isValid()) {
                $usuarios = $this->usuariosService->collection($form->getData(), $this->params()->fromRoute('pagina', 1));
            }
        } else {
            $usuarios = $this->usuariosService->collection();
        }
        
        return array(
            'emPesquisa' => $emPesquisa,
            'tituloGrid' => 'Lista de usuários',
            'quantidade' => $this->usuariosService->count(),
            'form' => $form,
            'usuarios' => $usuarios,
            'permiteAlterar' => $this->_usuario->permissao->alterar,
        );
    }

    public function formAction() {
        if ($this->request->isGet()) {
            $id = (int) $this->params('id');
        } else {
            $id = (int) $this->request->getPost()->usuario['id'];
        }
        $usuario = null;
        if ($id) {
            $usuario = $this->usuariosService->get($id);
        }
        if (!$usuario) {
            $usuario = new Usuario();
            $title = 'Novo usuário';
        } else {
            $title = "Editando {$usuario->getNome()}";
        }
        $form = SM::get('usuarios.form.usuario');
        $form->bind($usuario);
        if ($this->request->isPost()) {
            $retorno = array();
            $post = $this->request->getPost();
            $form->setData($post);
            if ($form->isValid()) {
                $this->usuariosService->save($usuario);
                $this->flash()->success('Operação realizada com sucesso.');
                $this->highlight("tr#usuario_{$usuario->getId()}");
                $retorno['code'] = 'OK';
            } else {
                $retorno['code'] = 'ERROR';
                $retorno['errors'] = $form->getMessages();
                $retorno['flashError'] = 'Um ou mais erros impedem a gravação dos dados.';
            }
            return new JsonModel($retorno);
        }
        $form->prepare();
        return array(
            'title' => $title,
            'form' => $form,
            'usuarioPrototype' => new UsuarioFieldset(),
            'usuario' => $usuario,
            'inserindo' => (!$usuario->getId()),
            'permiteAlterar' => $this->_usuario->permissao->alterar,
        );
    }

    public function visivelAction() {

        $id = (int) $this->params('id');
        $usuario = $this->usuariosService->get($id, array('perfil' => 'super'));
        
        if(!$usuario || !$this->_usuario->permissao->alterar){
            $this->flash()->error('Registro não encontrado ou não é possível alterá-lo!');
            return $this->redirect()->toRoute('usuarios');
        }
                
        if($usuario->getPerfil() != 'super'){
            $this->flash()->error('Registro não pode ser alterado!');
            return $this->redirect()->toRoute('usuarios');
        }
        
        // verifica se está ativo
        if ($usuario->isVisivel() == 1) {
            $usuario->setVisivel(0);
        } else {
            $usuario->setVisivel(1);
        }

        $this->usuariosService->save($usuario);
        $this->flash()->success('Operação realizada com sucesso.');

        return $this->redirect()->toRoute('usuarios');
    }
    
    public function excluirAction() {

        $id = (int) $this->params('id');
        $usuario = $this->usuariosService->get($id, array('perfil' => 'super'));
        
        if(!$usuario || !$this->_usuario->permissao->alterar){
            $this->flash()->error('Registro não encontrado ou não é possível removê-lo!');
            return $this->redirect()->toRoute('usuarios');
        }
        
        $this->usuariosService->remove($usuario);
        $this->flash()->success('Registro removido com sucesso.');

        return $this->redirect()->toRoute('usuarios');
    }

    private function emPesquisa() {
        foreach ($this->params()->fromQuery() as $key => $value) {
            if ($value != '') {
                return true;
            }
        }
        return false;
    }
}
