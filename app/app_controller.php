<?php
/* SVN FILE: $Id$ */
/**
 * Short description for file.
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * Short description for class.
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */

class AppController extends Controller {
   var $helpers = array('Html','Form','Javascript','Session');
   var $components = array('Email','Session','Cookie','RequestHandler');
   var $uses = array('Cidade','Categoria','Subcategoria');
   var $qtde =array('10','20','30','50','100');

   function beforeRender(){
      

      $status = array('0'=>'Todos','S'=>'Ativo','N'=>'Inativo');

      $qtde = $this->qtde;
      
      $cidades = $this->Cidade->find('list',array(
        'fields'=>'name','name'));
      array_unshift($cidades,'Todas');

      $categorias_mnu = $this->Categoria->find('list');
      $subcategorias_mnu = $this->Subcategoria->find('all',array('recursive' => 0,'order'=>'Subcategoria.name'));
      $new_item_mo = array("Subcategoria" => array("id"=>0,"categoria_id" => 1,"name"  => "Mão de Obra")); 
      $new_item_ps = array("Subcategoria" => array("id"=>0,"categoria_id" => 2,"name"  => "Prestação de  Serviços")); 
       
      array_unshift($subcategorias_mnu,$new_item_mo,$new_item_ps);
      $this->set(compact('status','qtde','cidades','categorias_mnu','subcategorias_mnu'));

      $cookie_menu = $this->Cookie->read('menu');
      $this->set(compact('cookie_menu'));
   }

   function __estados_br(){
     $arraEstados = array("AC"=>"Acre","AL"=>"Alagoas","AM"=>"Amazonas","AP"=>"Amapá",
     "BA"=>"Bahia","CE"=>"Ceará","DF"=>"Distrito Federal","ES"=>"Espirito Santo","GO"=>"Goiás",
     "MA"=>"Maranhão","MG"=>"Minas Gerais","MG"=>"Mato Grosso do Sul","MT"=>"Mato Grosso","PA"=>"Pará",
     "PB"=>"Paraíba","PE"=>"Pernambuco","PI"=>"Piauí","PR"=>"Paraná","RJ"=>"Rio de Janeiro",
    "RN"=>"Rio Grande Norte","RO"=>"Rondônia","RR"=>"Roraima","RS"=>"Rio Grande do Sul",
    "SC"=>"Santa Catarina","SP"=>"São Paulo","SE"=>"Sergipe","TO"=>"Tocantins");
    asort($arraEstados);
    array_unshift($arraEstados,"Selecione");
    return $arraEstados;
   }

/*--------------------------------------------------------------------------------'
'   													Função conversora de Data														'
'   1 =  AAAA-MM-DD para DD/MM/AAAA                   														'
'   2 =  DD/MM/AAAA para AAAA-MM-DD                  														  '
'   3 = DD/MM/AAAA 00:00:00 para AAAA-MM-DD 00:00:00  														'
'   4 = AAAA-MM-DD 00:00:00 para DD/MM/AAAA 00:00:00  														'
---------------------------------------------------------------------------------*/
   function format_date($date,$cod_format){
    $date = str_replace("'","",$date);
    switch($cod_format){
      case 1:
        $conv1 = explode("-",$date);
        $out = implode("/",array_reverse($conv1));
        break;
      case 2:
        $conv1 = explode("/",$date);
        $out = implode("-",array_reverse($conv1));
        break;
      case 3:
        $convHora = explode(" ",$date);
        $ConvData = explode("/",$convHora[0]);
        $out = implode("-",array_reverse($ConvData))." ".$convHora[1];
        break;
      case 4:
        $convHora = explode(" ",$date);
        $ConvData = explode("-",$convHora[0]);
        $out = implode("/",array_reverse($ConvData))." ".$convHora[1];
        break;
      }
      return $out;
   }

   function convert_number_to_en_format($valor){

     $out = str_replace('.','',$valor);
     $out = str_replace(',','.',$out);

     return $out;
   }

   function convert_number_to_br_format($value = null){

   }

    /*----- ADMIN -----*/
   function checkAdminSession(){
    if(!$this->Session->check('usuario')){
      //Set flash message and redirect
      $this->Session->setFlash(__('Por favor, faça seu login ',true));
      $this->redirect('/admin/login');
    }
   }

    function beforeFilter(){
      $exceptions = array('admin_esqueci_senha','admin_cadastrar_nova_senha','admin_nova_senha_cadastrada');

      if((isset($this->params['admin']) or $this->params['controller'] == 'admin')
       and !in_array($this->params['action'],$exceptions)){
        $this->checkAdminSession();
      }
    }

}
?>