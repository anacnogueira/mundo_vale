<?php
  class SubcategoriasController extends AppController {

    var $name = 'Subcategorias';
    var $helpers = array('Statuso');
  
  /*------ START FRONTEND ------*/
    function catalogo(){
      $categorias = $this->Categoria->find('list');     
      $subcategorias = $this->Subcategoria->find('all',array('recursive' => -1,'order'=>'Subcategoria.name'));
    
      $this->set(compact('categorias','subcategorias'));
    }
  /*------ END FRONTEND ------*/
  
  /*------ START ADMIN ------*/
    function admin_index() {
      $this->set("title_for_layout","Profissões");
      $this->layout = 'admin';
      $this->Subcategoria->recursive = 2;
      //Filtrar condições
      $conditions = array();
      if(empty($this->data))
        $index_qtde = 1;
      else
        $index_qtde  = $this->data['Subcategoria']['qtde'];

      if(!empty($this->data['Subcategoria']['name'])){
        $conditions['Subcategoria.name LIKE'] = '%'.$this->data['Subcategoria']['name'].'%';
      }
      if(!empty($this->data['Subcategoria']['categoria_id'])){
        $conditions['categoria_id'] = $this->data['Subcategoria']['categoria_id'];
      }

      $this->paginate['Subcategoria'] = array(
        'limit'=>$this->qtde[$index_qtde],
        'conditions' => array($conditions),
        'fields' => array('Subcategoria.*'));

      $categorias = $this->Subcategoria->Categoria->find('list');
      $subcategorias = $this->paginate('Subcategoria');
      $this->set(compact('categorias','subcategorias'));
    }

    function admin_view($id = null) {
      $this->set("title_for_layout","Profissões &raquo; Ver");
      $this->layout = 'admin';
      if (!$id) {
        $this->Session->setFlash(__('Profissão Inválida', true));
        $this->redirect(array('controller'=>'subcategorias','action'=>'index'));
      }
      $this->set('subcategoria', $this->Subcategoria->read(null, $id));
    }

    function admin_add() {
      $this->set("title_for_layout","Profissões &raquo; Nova Profissão");
      $this->layout = 'admin';
      if (!empty($this->data)) {
        $this->Subcategoria->create();
        if ($this->Subcategoria->save($this->data)) {
          $this->Session->setFlash(__('Subcategoria salva.', true));
          $this->redirect(array("action" => "index"));
        }  else {
        }
      }
      $categorias = $this->Subcategoria->Categoria->find('list');
      $this->set(compact('categorias'));
    }

    function admin_edit($id = null) {
      $this->set("title_for_layout","Profissões &raquo; Editar Profissão");
      $this->layout = 'admin';
      if (!$id && empty($this->data)) {
        $this->flash(__('Profissão Inválida', true), array('action'=>'index'));
        $this->redirect(array("action" => "index"));
      }
      if (!empty($this->data)) {
        if ($this->Subcategoria->save($this->data)) {
          $this->Session->setFlash(__('A profissão foi salva.', true));
          $this->redirect(array("action" => "index"));
        } else {
        }
      }
      if (empty($this->data)) {
        $this->data = $this->Subcategoria->read(null, $id);
      }
      $categorias = $this->Subcategoria->Categoria->find('list');
      $this->set(compact('categorias'));
    }

    function admin_delete($id = null) {
      if (!$id) {
        $this->Session->setFlash(__('Profissão Inválida', true), array('action'=>'index'));
      }
      if ($this->Subcategoria->delete($id)) {
        $this->Session->setFlash(__('Profissão excluída', true));
        $this->redirect(array("action" => "index"));   
      }
    }
  /*------ END ADMIN ------*/  
}
?>