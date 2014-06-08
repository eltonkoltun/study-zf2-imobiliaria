<?php

namespace Cms\Controller;

use Shift\SM;
use Cms\Entity\Cms;
use Cms\Form\CmsFieldset;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class CmsController extends AbstractActionController {

    private $cmsService;

    public function __construct() {
        $this->cmsService = SM::get('cms.service.cms');
        $this->_usuario = SM::getCliente();
    }

    public function indexAction() {

        $registros = null;
        $form = SM::get('cms.form.cms_search');
        $emPesquisa = $this->emPesquisa();
        
        if ($emPesquisa) {
            $form->setData($this->params()->fromQuery());
            if ($form->isValid()) {
                $registros = $this->cmsService->collection($form->getData(), $this->params()->fromRoute('pagina', 1));
            }
        } else {
            $registros = $this->cmsService->collection();
        }
                
        return array(
            'emPesquisa' => $emPesquisa,
            'tituloGrid' => 'Lista de páginas editáveis',
            'quantidade' => $this->cmsService->count(),
            'form' => $form,
            'registros' => $registros,
            'permiteAlterar' => $this->_usuario->permissao->alterar,
        );
    }

    public function formAction() {
        if ($this->request->isGet()) {
            $id = (int) $this->params('id');
        } else {
            $id = (int) $this->request->getPost()->cms['id'];
        }
        $cms = null;
        if ($id) {
            $cms = $this->cmsService->get($id);
        }
        if (!$cms) {
            $cms = new Cms();
            $title = 'Nova página editável';
        } else {
            $title = "Editando {$cms->getTitulo()}";
        }
        $form = SM::get('cms.form.cms');
        $form->bind($cms);
        if ($this->request->isPost()) {
            $retorno = array();
            $post = $this->request->getPost();
            $form->setData($post);
            if ($form->isValid()) {
                $this->cmsService->save($cms);
                $this->flash()->success('Operação realizada com sucesso.');
                $this->highlight("tr#cms_{$cms->getId()}");
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
            'cmsPrototype' => new CmsFieldset(),
            'cms' => $cms,
            'permiteAlterar' => $this->_usuario->permissao->alterar,
        );
    }

    public function visivelAction() {

        $id = (int) $this->params('id');
        $cms = $this->cmsService->get($id, array('fixa' => '0'));
        
        if(!$cms || !$this->_usuario->permissao->alterar){
            $this->flash()->error('Registro não encontrado ou não é possível alterá-lo!');
            return $this->redirect()->toRoute('cms');
        }
        
        // verifica se está ativo
        if ($cms->isVisivel() == 1) {
            $cms->setVisivel(0);
        } else {
            $cms->setVisivel(1);
        }

        $this->cmsService->save($cms);
        $this->flash()->success('Status de registro alterado com sucesso.');

        return $this->redirect()->toRoute('cms');
    }
    
    public function excluirAction() {

        $id = (int) $this->params('id');
        $cms = $this->cmsService->get($id, array('fixa' => '0'));
        
        if(!$cms || !$this->_usuario->permissao->alterar){
            $this->flash()->error('Registro não encontrado ou não é possível removê-lo!');
            return $this->redirect()->toRoute('cms');
        }
        
        $this->cmsService->remove($cms);
        $this->flash()->success('Registro removido com sucesso.');

        return $this->redirect()->toRoute('cms');
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
