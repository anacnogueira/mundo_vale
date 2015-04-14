<?php
/*------ EXCLUIR -----*/
class AdminController extends AppController {
	var $name = 'Admin';
	var $uses = array('Cadastro');
  
  function index(){
   $this->set("title_for_layout","Home");
   $this->layout = 'admin';

  }
}
?>