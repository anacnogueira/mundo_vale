<?php
  class CadastrosController extends AppController{
    var $name = "cadastros";
    var $helpers = array('Statuso');
    var $uses = array('Cadastro','Cidade','Categoria');
   
    function beforeRender(){
      parent::beforeRender();

      $escolaridade = array(
        '0'=>'Selecione',
        "Ensino Fundamental Incompleto"=>"Ensino Fundamental Incompleto",
        "Ensino Fundamental Completo"=>"Ensino Fundamental Completo",
        "Ensino Médio Incompleto"=>"Ensino Médio Incompleto",
        "Ensino Médio Completo"=>"Ensino Médio Completo",
        "Ensino Superior Incompleto"=>"Ensino Superior Incompleto",
        "Ensino Superior Completo"=>"Ensino Superior Completo",
        "Pós Graduação Incompleto"=>"Pós Graduação Incompleto",
        "Pós Graduação Completo"=>"Pós Graduação Completo");
        
        $this->set(compact('escolaridade'));
    }
    
    /*------- START FRONT-END -------*/       
    function cadastrese(){
       $this->set("title_for_layout","Cadastre-se");
       $this->set("titulo","<h1>Cadastre-se</h1>");
       $this->__cadastrar('confirmacao_cadastro');
    } 

    function confirmacao_cadastro(){
      $this->set("title_for_layout","Confirmação de cadastro");
    }
     
    function resultado_busca(){
      $this->set("title_for_layout","Resultado de busca");
      if(!$this->data)
        $this->Session->setFlash('Nenhum dado fornecido para a busca');
      else{
        $conditions['Cadastro.nome LIKE'] = '%'.$this->data['busca']['keyword'].'%';
        $conditions['Cadastro.cidade LIKE'] = '%'.$this->data['busca']['keyword'].'%';
        $conditions['Categoria.name LIKE'] = '%'.$this->data['busca']['keyword'].'%';
        $conditions['Subcategoria.name LIKE'] = '%'.$this->data['busca']['keyword'].'%';

        $this->Cadastro->recursive = -1;
        $this->paginate = array(
          'fields'=>array('cadastro.id','Cadastro.nome','Cadastro.cidade','Cadastro.telefone','Categoria.name','Subcategoria.name'),
          'conditions'=>array('ativo'=>'S','OR'=>$conditions),
          "limit"=>15,
          'joins' => array(
                    array(
                      'table' => 'subcategorias',
                      'type' => 'INNER',
                      'alias' => 'Subcategoria',
                     'conditions' => array('Subcategoria.id = Cadastro.subcategoria_id')),
                    array(
                      'table' => 'categorias',
                      'type' => 'INNER',
                      'alias' => 'Categoria',
                     'conditions' => array('Categoria.id = Subcategoria.categoria_id'))
                 ));

        $profissionais = $this->paginate('Cadastro');
        if($profissionais){
          $plural = ife(count($profissionais) > 1,'s','');

          $total = "Encontrado".$plural." ".count($profissionais)." registro".$plural.
          " com <strong>".$this->data['busca']['keyword']."</strong>";
        }
        $this->set(compact('profissionais','total'));
      }
    }
    
    function profissionais($name=null){
     if(!$this->data){
       $this->Session->setFlash(__('Profissão Inválida', true));
       $this->redirect('/');
      }

      $conditions = array();

      $conditions['ativo']= 'S';
      if(!empty($this->data['profissionais']['cidade_name']))
        $conditions['cidade'] = $this->data['profissionais']['cidade_name'];
      if(!empty($this->data['profissionais']['subcategoria']))
        $conditions['Subcategoria.name'] = $this->data['profissionais']['subcategoria'];

      $titulo = $this->Cadastro->Subcategoria->find('first',array(
      'fields'=>array('Subcategoria.name','Categoria.name'),
      'conditions'=>array('Subcategoria.name'=>$this->data['profissionais']['subcategoria'])));

      $this->set("title_for_layout",$titulo['Categoria']['name'].' &raquo; '.$titulo['Subcategoria']['name']);
      
      $this->paginate = array(
        'fields'=>array('Cadastro.id','Cadastro.nome','Cadastro.cidade','Cadastro.telefone'),
        'conditions'=>$conditions,
        'limit'=>6);

      $profissionais = $this->paginate('Cadastro');
      $this->set(compact('titulo','profissionais'));

      //Setar cookies
      $this->Cookie->write('menu', $this->data["profissionais"], true);   

    }

    function detalhes($id = null){
      $this->set("title_for_layout","Profissional &raquo; Detalhes");
      if(!$id)
        $this->Session->setFlash(__('Profissional Inválido', true), array('action'=>'index'));

      $profissional = $this->Cadastro->read(null,$id);
      $this->set(compact('profissional'));
    }
    
    /* START TEMP */
     function index(){
      $this->layout="default_tmp";
      $this->set("title_for_layout","Ficha Cadastral");
      $this->set("titulo","<h2>Ficha Cadastro</h2>");
      $this->__cadastrar('cadastrado');
    }
    
    function cadastrado(){
       $this->layout="default_tmp";
       $this->set("title_for_layout","Confirmação de cadastro");
    }     
     /* END TEMP */
    
    /*------- END FRONT-END -------*/  
    
    /*------- START ADMIN -------*/
    function admin_index(){
      $this->set("title_for_layout","Cadastros");
	    $this->layout = 'admin';

      $this->Cadastro->recursive = 1;
    
      if(empty($this->data))
       $index_qtde = 1;
      else
       $index_qtde = $this->data['Cadastro']['qtde'];
      
      //filtrar condições
      $conditions = $this->__filter($this->data['Cadastro']);

      $this->paginate['Cadastro'] = array(
        'limit' => $this->qtde[$index_qtde],
        'conditions'=>array($conditions),
        'fields'=>array('Cadastro.*,Subcategoria.*'));

      $categorias    = $this->Categoria->find('list');
      array_unshift($categorias,'Todas');
      $subcategorias = $this->Cadastro->Subcategoria->find('list',array('order'=>'name'));
      array_unshift($subcategorias,'Todas');
      $cidades = $this->Cidade->find('list');
      array_unshift($cidades,'Todas');
      $cadastros = $this->paginate('Cadastro');
      $this->set(compact('categorias','subcategorias','cidades','cadastros'));

    }
    
    function admin_view($id = null){
      $this->set("title_for_layout","Cadastros &raquo; Imprimir");
	    $this->layout = 'blank';

      if (!$id) {
			  $this->Session->setFlash(__('Cadastro Inválido', true));
        $this->redirect(array('controller'=>'cadastros','action'=>'admin_index'));
		  }

       $this->Cadastro->bindModel(array('belongsTo'=>array(
                    'Categoria'=>array(
                        'foreignKey'=>false,
                        'conditions'=>array('Categoria.id = Subcategoria.categoria_id')),
                    )));

      $cadastro =  $this->Cadastro->read(null, $id);
      $cadastro['Cadastro']['created'] = parent::format_date($cadastro['Cadastro']['created'],4);
      $cadastro['Cadastro']['modified'] = parent::format_date($cadastro['Cadastro']['modified'],4);
		  $this->set(compact('cadastro'));
    }

    function admin_add() {
      $this->set("title_for_layout","Cadastros &raquo; Novo Cadastro");
      $this->set("titulo","<h2>Adicionar Cadastro</h2>");
	  $this->layout = 'admin';
      $this->__cadastrar('admin_index');
      
    }
    
    function admin_edit($id = null) {
      $this->set("title_for_layout","Cadastros &raquo; Editar Cadastro");
      $this->set("titulo","<h2>Alterar Cadastro</h1>");
	    $this->layout = 'admin';

      if (!$id && empty($this->data)) {
        $this->Session->setFlash(__('Cadastro Inválido', true));
        $this->redirect(array("action" => "admin_index"));
		  }
		  if (!empty($this->data)) {

          //Verifica se a profissão escolhida foi outra
          if(!empty($this->data['Cadastro']['outra_profissao'])){
            $this->data['Subcategoria']['categoria_id'] = $this->data['Cadastro']['categoria'];
            $this->data['Subcategoria']['name'] = $this->data['Cadastro']['outra_profissao'];

            $this->Cadastro->Subcategoria->save($this->data['Subcategoria']);
            $this->data['Cadastro']['subcategoria_id'] = $this->Cadastro->Subcategoria->id;
          }

          //Cadastrar data de ativação
          if($this->data['Cadastro']['ativo'] == 'S')
            $this->data['Cadastro']['activated'] = date('Y-m-d H:i:s');

            $this->Cadastro->create(false);
          if ($this->Cadastro->save($this->data)) {
				    $this->Session->setFlash(__('O cadastro foi salvo.', true));
            $this->redirect(array('controller'=>'cadastros','action'=>'admin_index'));
			    } else {
            $this->Session->setFlash(__('Não foi possível editar cadastro.', true));
            $this->redirect(array('controller'=>'cadastros','action'=>'admin_index'));
			    }


		  }
      if (empty($this->data)) {
        $this->Cadastro->recursive = 0;
		    $this->Cadastro->bindModel(array('belongsTo'=>array(
                    'Categoria'=>array(
                        'foreignKey'=>false,
                        'conditions'=>array('Categoria.id = Subcategoria.categoria_id')),
                    )));
        $this->data = $this->Cadastro->find('first',array('conditions'=>array(
       'Cadastro.id'=>$id,)));
		  }
      //Recupera Categoria e profissão
      $this->data['Cadastro']['categoria']  = isset($this->data['Categoria']['id']) ? $this->data['Categoria']['id'] : $this->data['Cadastro']['categoria'];
      if(empty($this->data['Cadastro']['categoria']))
        $subcategorias[]  = "Selecione a categoria";
      else{
        $subcategorias = $this->Cadastro->Subcategoria->find('list',array(
        'conditions'=>array('categoria_id'=>$this->data['Cadastro']['categoria']),
        'order'=>'Subcategoria.name'));
        $subcategorias[-1] = 'Outra profissão';
      }
      $this->set(compact('subcategorias'));
    }

    function admin_delete($id = null) {
      if (!$id) {
			  $this->Session->setFlash(__('Cadastro Invalido', true));
        $this->redirect(array("action" => "admin_index"));
		  }
		  if ($this->Cadastro->delete($id)) {
			  $this->flash(__('Cadastro excluído', true), array('action'=>'admin_index'));
        $this->redirect(array("action" => "admin_index"));
		  }
    }

    function admin_print_form(){
      $this->set("title_for_layout","Cadastros &raquo; Formulário");
	    $this->layout = 'blank';

      $servicos =$this->Cadastro->Subcategoria->find('list', array(
       'conditions' => array('Subcategoria.categoria_id' => 2),
       'recursive' => 1,
       'fields' => array('Subcategoria.name'),
       'order' => array('Subcategoria.name')));
       //$servicos[] = "Outros:";

       $mao_obras =$this->Cadastro->Subcategoria->find('list', array(
       'conditions' => array('Subcategoria.categoria_id' => 1),
       'recursive' => 1,
       'fields' => array('Subcategoria.name'),
       'order' => array('Subcategoria.name')));
       //$mao_obras[] = "Outros:";

       $this->set(compact('servicos','mao_obras'));
    }
    
    function admin_export_xls(){
      $this->layout = 'blank';
      $this->Cadastro->bindModel(array('belongsTo'=>array(
                    'Categoria'=>array(
                        'foreignKey'=>false,
                        'conditions'=>array('Categoria.id = Subcategoria.categoria_id')),
                    )));
      $conditions = $this->__filter($this->data['Cadastro']);
      
      $cadastros = $this->Cadastro->find('all', array(
      array('conditions'=>$conditions)));
      $this->set(compact('cadastros'));
    }
    /*------- END ADMIN -------*/

   /*------- START ADITIONAL FUNCTIONS -------*/
   function get_end(){
     $this->autoRender = false;
     $cep = $this->params['url']['cep'];
      if(!empty($cep)) {
        $resultado = @file_get_contents('http://republicavirtual.com.br/web_cep.php?cep='.$cep.'&formato=json');

        if(!$resultado){
          echo 'Erro: CEP não encontrado';
          exit;
	      }

        $arra_end = json_decode($resultado,true);


        //verifica se o CEP existe
        if($arra_end["resultado"] == 0){
         echo "Erro: CEP não encontrado.";
         exit;
        }

        //verifica se a cidade esta cadastrada
        $cidades = $this->Cidade->find('list',array(
         'conditions'=>array('name'=>$arra_end['cidade'])));
         if(count($cidades) == 0){
            echo 'Erro: Cidade não permitda para cadastro';
            exit;
         }

         echo json_encode($arra_end);  
      }
      else
        echo "Erro: Campo CEP vazio";

    }

    function get_profissao(){
      $this->autoRender = false;
      $categoria_id   = $this->params['url']['categoria_id'];
      $outra_profissao = $this->params['url']['outra_profissao'];

      if(!empty($categoria_id)){
        $subcategorias = $this->Cadastro->Subcategoria->find('all', array(
       'conditions' => array('Subcategoria.categoria_id' => $categoria_id),
       'recursive' => 1,
       'order' => array('Subcategoria.name')));
       if(!$subcategorias)
        echo "Erro: Nenhuma profissão encontrada para esta categoria";
       else{
         foreach($subcategorias as $key=>$subcategoria){
          $out[$key]['value'] = $subcategoria['Subcategoria']['id'];
          $out[$key]['caption'] = $subcategoria['Subcategoria']['name'];
        }
        if($outra_profissao != "n"){
          //Outra profissão
        $out[$key]['value'] = -1;
        $out[$key]['caption'] = 'Outra Profissão';
        }


        return json_encode($out);
       }
      }
      else
       echo "Erro: Categoria inválida ou vazia";
    }
    /*------- END ADITIONAL FUNCTIONS -------*/

    /*------ START INTERN FUNCTIONS ------*/
    function __cadastrar($action) {
      

      if(!empty($this->data)){
        //echo $this->data['Cadastro']['subcategoria_id'];
          $this->Cadastro->create();
        //Verifica se o cadastro foi feito como ativo
        if($this->data['Cadastro']['ativo'] == 'S')
            $this->data['Cadastro']['activated'] = date('Y-m-d H:i:s');

        //Verifica se a profissão escolhida foi outra
        if(!empty($this->data['Cadastro']['outra_profissao'])){
          $this->data['Subcategoria']['categoria_id'] = $this->data['Cadastro']['categoria'];
          $this->data['Subcategoria']['name'] = $this->data['Cadastro']['outra_profissao'];

          $this->Cadastro->Subcategoria->save($this->data['Subcategoria']);
          $this->data['Cadastro']['subcategoria_id'] = $this->Cadastro->Subcategoria->id;
        }
        if($this->Cadastro->save($this->data)){
            $cadastro_id = $this->Cadastro->id;
            $this->Session->setFlash(__('Cadastro criado com sucesso.',true));

            $profissao = $this->Cadastro->Subcategoria->find('first',array(
              'fields'     => array('Subcategoria.name'),
              'conditions' => array('Subcategoria.id'=>$this->data['Cadastro']['subcategoria_id'])));

            if($this->data['Cadastro']['ativo'] == 'N'){
              //Enviar e-mail infomando novo cadastro
              $this->Email->smtpOptions = Configure::read("Site.smtp_config");
              $this->Email->to       = Configure::read('Site.email_alt1');
              $this->Email->bcc       =  Configure::read('Site.email_dev');
              $this->Email->subject  = '['.Configure::read('Site.name').'] Cadastro Pendente';
              $this->Email->from     = Configure::read('Site.email');
              $this->Email->template = 'default';
              $msg  = '<p>Cadastro efetuado - Autorização Pendente</p>';
              $msg .= '<p>ID: '.$cadastro_id.'</p>';
              $msg .= '<p>Nome: '.$this->data['Cadastro']['nome'].'</p>';
              $msg .= '<p>Profissão: '.$profissao['Subcategoria']['name'].'</p>';
              $this->Email->sendAs = 'html';

              //Envia e-mail via SMTP
              $this->Email->delivery = 'smtp';
              $this->Email->send($msg);
            }


            $this->redirect(array('action'=>$action));
          } else {
            //Erro ao realizar cadastro
            //$this->Session->setFlash(__('Por favor,corrija os erros abaixo:'),true);

          }
        }

      $categoria_id  = isset($this->data['Categoria']['id']) ? $this->data['Categoria']['id'] : $this->data['Cadastro']['categoria'];
      if(empty($categoria_id))
        $subcategorias[]  = "Selecione a categoria";
      else{
        $subcategorias = $this->Cadastro->Subcategoria->find('list',array('conditions'=>array('categoria_id'=>$categoria_id)));
        $subcategorias[-1] = 'Outra profissão';
      }


      $this->set(compact('subcategorias'));
    }
    
    function __filter($dados = array()){
      $conditions = array();
      
      if(!empty($dados['nome'])){
        $conditions['nome LIKE'] = '%'.$dados['nome'].'%';
      }

      if(!empty($dados['categoria'])){
        $conditions['categoria_id'] = $dados['categoria'];
      }

      if(!empty($dados['subcategoria_id'])){
        $conditions['subcategoria_id'] = $dados['subcategoria_id'];
      }

      if(!empty($dados['cidade'])){
        $cidade = $this->Cidade->find('first',array(
         'fields'=>array('name'),
         'conditions'=>array('Cidade.id'=>$dados['cidade'])
        ));
        $conditions['cidade'] = $cidade['Cidade']['name'];
      }
      
      if(!empty($dados['ativo'])){
        $conditions['ativo'] = $dados['ativo'];
      }
      
      return $conditions;
    }  
    /*------ END INTERN FUNCTIONS ------*/
    
    /*------ START CRON FUNCTION ------*/
    function desactive(){
       /* Irá rodar todo dia no Cron a 00:00 */
      $this->autoRender = false;
      $ativos = $this->Cadastro->find('all',array(
      'conditions'=>array(
      "ativo = 'S'",
      "DATEDIFF(CURDATE(),activated)>= 30")));

      if($ativos){
        //pr($ativos);
        //Enviar por e-mail os registro que foram desativados
        $this->Email->smtpOptions = Configure::read("Site.smtp_config");
        $this->Email->to       =  Configure::read('Site.email_alt1');
        $this->Email->bcc      =  Configure::read('Site.email_dev');
        $this->Email->subject  = '['.Configure::read('Site.name').'] Cadastros desativados pelo sistema';
        $this->Email->from     = Configure::read('Site.email');
        $this->Email->template = 'default';
        $msg   = "<p>Os seguintes registros estavam ativos mais de 30 dias e foram desativados automaticamente:</p>";
        $msg  .= "<table border='1' width='100%' align='center'>";
        $msg .= " <tr><th>ID</th><th>Nome</th><th>Profissão</th></tr>";
        foreach($ativos as $ativo){
        $this->Cadastro->UpdateAll(array(
           "ativo"=>"'N'",
           "activated"=>NULL,
           "modified"=>'NOW()'),
           array('Cadastro.id'=>$ativo['Cadastro']['id']));

          $msg .= "<tr align='center'>";
          $msg .= " <td>".$ativo['Cadastro']['id']."</td>";
          $msg .= " <td>".$ativo['Cadastro']['nome']."</td>";
          $msg .= " <td>".$ativo['Subcategoria']['name']."</td>";
          $msg .= "</tr>";

        }
        $msg .= "</table>";
        $this->Email->sendAs = 'html';
        $this->Email->delivery = 'smtp';
        $this->Email->send($msg);
        $this->set('smtp_errors', $this->Email->smtpError);
     }
   }
   /*------ END CRON FUNCTION ------*/
   
   /*----- START TEST FUNCTION ------*/
   function teste_email(){
    $this->Email->smtpOptions = Configure::read("Site.smtp_config");
    $this->Email->to       =  "contato@anacnogueira.eti.br";
    $this->Email->subject  = '['.Configure::read('Site.name').'] Teste de Envio de e-mail';
    $this->Email->from     = Configure::read('Site.email');
    $this->Email->template = 'default';
    $msg = '<p>Outro teste de envio de e-mail com smtp</p>';
    $this->Email->sendAs = 'html';
    $this->Email->delivery = 'smtp';
    $this->Email->send($msg);
    $this->set('smtp_errors', $this->Email->smtpError);
    pr($this->Session->read('Message.email'));
   }
  /*------ END TEST FUNCTION ------*/ 
 }
?>