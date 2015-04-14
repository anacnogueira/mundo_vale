<?php
  $script = $javascript->link(array('jquery.maskedinput','mascara_campo','jquery.selects'));
  $script .= $javascript->link(array('load_end','load_profissao','jquery.numeric','cadastro'))."\n";
  echo $this->addScript('scripts_for_layout',$script);
  //pr($this->validationErrors);
 ?>
 <div class="cadastros form">
 <?php echo $titulo; ?>
  <?php echo $form->create('Cadastro'); ?>
  <p>Os campos com * são obrigatórios</p>

  <fieldset>
    <legend>Dados Pessoais</legend>
  <?php echo $form->input('nome',array('label'=>'Nome*:'))."\n"; ?>

  <label>Pessoa*:</label>
  <?php echo $form->radio('pessoa',array(
    'fisica'=>'Física',
    'juridica'=>'Jurídica'),array('legend'=>false,'label'=>false)); ?>
<?php echo $form->error('pessoa'); ?>
 <div id="pf">
    <?php echo $form->input('cpf',array('label'=>'CPF*:','class'=>'cpf',
'after'=>"<span class='instrucoes'> 999.999.999-99</span>"))."\n"; ?>
  <?php echo $form->input('rg',array('label'=>'RG:','class'=>'onlyNumbers',
  'after'=>"<span class='instrucoes'>Somente números</span>"))."\n"; ?>
  <?php echo $form->input('escolaridade',array('type'=>'select','label'=>'Escolaridade:','options'=>$escolaridade))."\n"; ?>
</div>
<div id="pj">
    <?php echo $form->input('cnpj',array('label'=>'CNPJ*:','class'=>'cnpj',
'after'=>"<span class='instrucoes'> 99.999.999/9999-99</span>"))."\n"; ?>
</div> 
  
</fieldset>

<fieldset>
  <legend>Endereço</legend>
  <?php echo $form->input('cep',array('label'=>'CEP*:','class'=>'cep',
  'after'=>"<span class='instrucoes inscep'>99999-999</span>"))."\n"; ?>
  <div class="div_end">
    <?php echo $form->input('endereco',array('label'=>'Endereço*:','id'=>'endereco'))."\n"; ?>
    <?php echo $form->input('numero',array('label'=>'Nº*:','id'=>'num','size'=>'5','maxlength'=>'20'))."\n" ?>
    <?php echo $form->input('complemento',array('label'=>'Complemento:','id'=>'complemento'))."\n"; ?>
    <?php echo $form->input('bairro',array('label'=>'Bairro*:','id'=>'bairro'))."\n"; ?>
    <?php echo $form->input('cidade',array('type'=>'text','label'=>'Cidade*:','id'=>'cidade'))."\n"; ?>
    <?php echo $form->input('estado',array('label'=>'Estado*:','class'=>'custom','size'=>'2','id'=>'estado'))."\n"; ?>
  </div>  
</fieldset>

<fieldset>
  <legend>Contato</legend>
  <?php echo $form->input('telefone',array('label'=>'Telefone Fixo*:','class'=>'telefone',
  'after'=>"<span class='instrucoes'>(99)9999-9999</span>"))."\n"; ?>
   <?php echo $form->input('celular',array('label'=>'Celular:','class'=>'telefone',
  'after'=>"<span class='instrucoes'>(99)9999-9999</span>"))."\n"; ?>
  <?php echo $form->input('email',array('label'=>'E-mail:'))."\n"; ?>
</fieldset>
<fieldset>
  <legend>Profissão</legend>
  <div>
  <label>Categoria*:</label> 
    <?php echo $form->radio('categoria',array(
      '1'=>'Mão de Obra',
      '2'=>'Prestação de Serviços'),array('legend'=>false,'label'=>false)); ?>

    </div>
    <?php echo $form->input('subcategoria_id',array('label'=>'Profissão*:'))."\n"; ?>
    <div class="outra_profissao">
       <?php echo $form->input('outra_profissao',array('label'=>'Outra profissão*:'))."\n"; ?>
    </div>
    <?php echo $form->input('referencias',array('label'=>'Referências*:'))."\n"; ?>
  <?php echo $form->input('historico_profissional',array('label'=>'Histórico Profissional*:'))."\n"; ?>
</fieldset>
<?php if(array_key_exists("admin",$this->params)): ?>
<fieldset>
  <legend>Outros</legend>
  <?php echo $form->radio('ativo',array(
    'N'=>'Não',
    'S'=>'Sim'),array('legend'=>false,'label'=>false)); ?>
    <label>Ativo*:</label>
  <?php echo $form->error('ativo'); ?>
</fieldset>
<?php else: ?>
 <?php echo $form->hidden('ativo',array('value'=>'N')); ?>
<?php endif; ?>
<?php echo $form->input('id'); ?>
  <?php echo $form->end('Enviar'); ?>
 <?php if(!array_key_exists("admin",$this->params)): ?>
  <p><b><i>Cadastro sujeito a aprovação em até 48 horas</i></b></p>
  <p>&reg; <?php echo date('Y') ?> - Privacidade</p>
  <?php endif; ?>
 </div>
