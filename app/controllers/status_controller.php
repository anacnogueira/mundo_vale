<?php
  class StatusController extends AppController {
    var $name = 'Status';
    var $uses = array('Usuario','Cadastro');

    function admin_change() {
      $table = $this->passedArgs["table"];
      $field = $this->passedArgs["field"];
      $status = $this->passedArgs["status"];
      $id = $this->passedArgs["id"];
      $this->autoRender = false;
      if(!empty($table) and !empty($field) and !empty($status) and !empty($id)){
        $type = substr(ucfirst($table),0,strlen($table)-1);
        $fields[$field] = "'".$status."'";

        //Gravar data de ativação
        if($type == 'Cadastro' and $status == 'S')
          $fields['activated'] = "NOW()";

        $this->$type->UpdateAll($fields, array($type.'.id'=>$id));

        $this->redirect($this->referer());
      }
    }
  }
?>