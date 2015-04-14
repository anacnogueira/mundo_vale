<?php
  class Cadastro extends AppModel{
    var $name = "Cadastro";
    var $belongsTo = array('Subcategoria');

    var $validate = array(
      'nome'=>array(
        'rule'=>'notEmpty',
        'required'=>true,
        'message'=>'Informe o nome completo'
      ),
      'pessoa'=>array(
        'rule'=>array('inList', array('fisica', 'juridica')),        
        'message'=>'Selecione o tipo de pessoa'
      ),
      'telefone'=>array(
        'rule'=>array('custom', '/^\([0-9]{2}\)[0-9]{4}\-[0-9]{4}$/'),
        'required'=>true,
        'message'=>'Informe o telefone no formato indicado'
      ),
      'cpf'=>array(
        'validCPF'=>array(
          'rule'=>array('isCPF','pessoa'),
          'message'=>'Formato de CPF vazio ou inválido',
          'required'=>false
        ),
        'isUniqueCPF'=>array(
          'rule'=>array('isUniqueCpfCnpj','fisica'),
          'message'=>'CPF já cadastrado',
          'on'=>'create'
        )
      ),
      'cnpj'=>array(
        'isUniqueCNPJ'=>array(
          'rule'=>array('isUniqueCpfCnpj','juridica'),
          'message'=>'CNPJ já cadastrado',
          'on'=>'create'
        ),
        'validCNPJ'=>array(
          'rule'=>array('isCNPJ','pessoa'),
          'message'=>'Formato de CNPJ vazio ou inválido'
        )
      ),
      'cep'=>array(
        'rule'=>array('custom', '/^[0-9]{5}\-[0-9]{3}$/'),
        'required'=>true,
        'message'=>'Informe o CEP no formato indicado'
      ),
      'endereco'=>array(
        'rule'=>'notEmpty',
        'required'=>true,
        'message'=>'Informe o endereço'
      ),
      'numero'=>array(
        'rule'=>'notEmpty',
        'required'=>true,
        'message'=>'Informe o número do endereço'
      ),
      'bairro'=>array(
        'rule'=>'notEmpty',
        'required'=>true,
        'message'=>'Informe o bairro'
      ),
      'cidade'=>array(
        'rule'=>'notEmpty',
        'required'=>true,
        'message'=>'Informe a cidade'
      ),
      'estado'=>array(
        'rule'=>'notEmpty',
        'required'=>true,
        'message'=>'Informe o estado'
      ),
      'categoria'=>array(
        'rule' => array('naoVazio'),
        'required'=>true,
        'message' => 'Selecione a categoria'
      ),
       'subcategoria_id'=>array(
        'rule' => array('naoVazio'),
        'required'=>true,
        'message' => 'Selecione a profissão'
      ),
      'referencias'=>array(
        'rule'=>'notEmpty',
        'required'=>true,
        'message'=>'Informe as referências'
      ),
      'historico_profissional'=>array(
        'rule'=>'notEmpty',
        'required'=>true,
        'message'=>'Informe o histórico profissional'
      ),
      'ativo'=>array(
        'rule'=>array('inList', array('S', 'N')),
        'message'=>'Informe o status do cadastro'
      )
    );

    //Funções
    function naoVazio($field=array()){

      foreach( $field as $key => $value ){
        if($key == 'categoria' or $key == 'subcategoria_id'){
          if(!empty($value))
            return true;

          return false;
        }
      }
    }

    function isCPF($data=array(),$pessoa){
      $pes = $this->data[$this->name][$pessoa];

      if($pes == 'fisica'){
        // Retira pontos e traços
        $data['cpf'] = str_replace("-","",(str_replace(".","",$data['cpf'])));

        //Verifica se o tamanho contem 11 caracteres (sem traço e ponto)
        if(strlen($data['cpf']) != 11){
          return false;
        }
        //Verifica se o CPF informado é um numero inteiro
        elseif(!is_numeric($data['cpf'])){
          return false;
        }
        //Verifica se o CPF é constituído de números repetidos de 11111111111 até 99999999999
        elseif(($data['cpf'] == '11111111111') || ($data['cpf'] == '22222222222') ||
          ($data['cpf'] == '33333333333')  ||  ($data['cpf'] == '44444444444') ||
          ($data['cpf'] == '55555555555') ||  ($data['cpf'] == '6666666666') ||
          ($data['cpf'] == '77777777777') ||  ($data['cpf'] == '88888888888') ||
          ($data['cpf'] == '99999999999') ||  ($data['cpf'] == '00000000000'))  {
          return false;
        }
        else {
          //Pega o digito verificador
          $dv_informado = substr($data['cpf'],9,2);

          for($i=0;$i<=8;$i++){
            $digito[$i] = substr($data['cpf'],$i,1);
          }

          //Calcula o valor do 10º digito de verificação
          $posicao = 10;
          $soma = 0;

          for($i=0;$i<=8;$i++){
            $soma = $soma + $digito[$i] * $posicao;
            $posicao--;
          }

          $digito[9] = $soma % 11;

          if($digito[9] < 2){
            $digito[9] = 0;
          }
          else{
            $digito[9] = 11 - $digito[9];
          }

          //Calcula o valor do 11º digito de verificação
          $posicao = 11;
          $soma = 0;

          for($i=0;$i<=9;$i++){
            $soma = $soma + $digito[$i] * $posicao;
            $posicao--;
          }

          $digito[10] = $soma %11;

          if($digito[10]<2){
            $digito[10] = 0;
          }
          else{
            $digito[10] = 11 - $digito[10];
          }

          //verifica se o dv calculado é igual ao informado
          $dv = $digito[9] * 10 + $digito[10];
          if($dv != $dv_informado){
           return false;
          }
          else {
            return true;
          }
        }
      }
      return true;
  }

    function isCNPJ($data=array(),$pessoa){
      $pes = $this->data[$this->name][$pessoa];
      if($pes == 'juridica'){
        if (strlen($data['cnpj']) <> 18) return 0;
        $soma1 = ($data['cnpj'][0] * 5) +
        ($data['cnpj'][1] * 4) +
        ($data['cnpj'][3] * 3) +
        ($data['cnpj'][4] * 2) +
        ($data['cnpj'][5] * 9) +
        ($data['cnpj'][7] * 8) +
        ($data['cnpj'][8] * 7) +
        ($data['cnpj'][9] * 6) +
        ($data['cnpj'][11] * 5) +
        ($data['cnpj'][12] * 4) +
        ($data['cnpj'][13] * 3) +
        ($data['cnpj'][14] * 2);
        $resto = $soma1 % 11;
        $digito1 = $resto < 2 ? 0 : 11 - $resto;
        $soma2 = ($data['cnpj'][0] * 6) +

        ($data['cnpj'][1] * 5) +
        ($data['cnpj'][3] * 4) +
        ($data['cnpj'][4] * 3) +
        ($data['cnpj'][5] * 2) +
        ($data['cnpj'][7] * 9) +
        ($data['cnpj'][8] * 8) +
        ($data['cnpj'][9] * 7) +
        ($data['cnpj'][11] * 6) +
        ($data['cnpj'][12] * 5) +
        ($data['cnpj'][13] * 4) +
        ($data['cnpj'][14] * 3) +
        ($data['cnpj'][16] * 2);
        $resto = $soma2 % 11;
        $digito2 = $resto < 2 ? 0 : 11 - $resto;
        if(($data['cnpj'][16] == $digito1) && ($data['cnpj'][17] == $digito2)){
          return true;
        }
        return false;
      }

      return true;
   }

   function isUniqueCpfCnpj($data=array(),$pessoa){

    $field = ($pessoa == 'fisica') ? 'cpf' : 'cnpj';
    $result = $this->find('all',array('conditions'=>array(
    'pessoa'=>$pessoa,$field=>'IS NOT NULL',$field=>$this->data[$this->name][$field])));

    if($result) return false;

    return true;
   }
    function beforeSave(){
      return true;
    }
  }
?>
