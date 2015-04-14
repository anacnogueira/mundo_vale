<?php
class Subcategoria extends AppModel {

	var $name = 'Subcategoria';
  var $hasMany = array('Cadastro');
  var $belongsTo = array('Categoria');


  var $validate = array(
    'name'=>array(
      'rule'=>'notEmpty',
      'required'=>true,
      'message'=>'Informe o nome da profissão'
    ),
    'categoria_id'=>array(
     'rule'=>array('naoVazio'),
     'required'=>true,
     'message'=>'Selecione a categoria'
    ));

  function naoVazio($field=array()){
    foreach( $field as $key => $value ){

      if($key == 'categoria_id'){

        if(!empty($value))
          return true;

        return false;
      }
    }
  }
}
?>