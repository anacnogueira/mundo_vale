<?
  $script  = $html->css(array('backend'),'stylesheet')."\n";
  $script .= $html->css(array('print'),'stylesheet', array('media' => 'print'))."\n";
  $script .= $javascript->link(array('print'))."\n";
  echo $this->addScript('scripts_for_layout',$script);
?>
<div class="print">
<h2><?php  __('Cadastro');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ID:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cadastro['Cadastro']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cadastro['Cadastro']['nome']; ?>
			&nbsp;
		</dd>
    <?php if($cadastro['Cadastro']['pessoa'] == 'fisica'): ?>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('CPF:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cadastro['Cadastro']['cpf']; ?>
			&nbsp;
		</dd>
   <?php if(!empty($cadastro['Cadastro']['rg'])): ?>
   <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('RG:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cadastro['Cadastro']['rg']; ?>
			&nbsp;
		</dd>
    <?php endif; ?>

    <?php if(!empty($cadastro['Cadastro']['escolaridade'])): ?>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Escolaridade:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cadastro['Cadastro']['escolaridade']; ?>
			&nbsp;
		</dd>
    <?php endif; ?>
    <?php elseif($cadastro['Cadastro']['pessoa'] == 'juridica'): ?>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('CNPJ:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cadastro['Cadastro']['cnpj']; ?>
			&nbsp;
		</dd>
    <?php endif; ?>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('CEP:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cadastro['Cadastro']['cep']; ?>
			&nbsp;
		</dd>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Logradouro:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cadastro['Cadastro']['endereco']; ?>
			&nbsp;Nº  <?php echo $cadastro['Cadastro']['numero']; ?>
		</dd>
    <?php if(!empty($cadastro['Cadastro']['complemento'])): ?>
    	<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Complemento:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cadastro['Cadastro']['complemento']; ?>
			&nbsp;
		</dd>
   <?php endif; ?>
    	<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Bairro:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cadastro['Cadastro']['bairro']; ?>
			&nbsp;
		</dd>
    	<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cidade:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cadastro['Cadastro']['cidade']; ?>
			&nbsp;
		</dd>
    	<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Estado:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cadastro['Cadastro']['estado']; ?>
			&nbsp;
		</dd>
   <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Telefone Fixo:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cadastro['Cadastro']['telefone']; ?>
			&nbsp;
		</dd>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Celular:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cadastro['Cadastro']['celular']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cadastro['Cadastro']['email']; ?>
			&nbsp;
		</dd>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Categoria:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cadastro['Categoria']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Profissão:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cadastro['Subcategoria']['name']; ?>
			&nbsp;
		</dd>
   	<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Referências:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cadastro['Cadastro']['referencias']; ?>
			&nbsp;
		</dd>
    	<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Histórico Profissional:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cadastro['Cadastro']['historico_profissional']; ?>
			&nbsp;
		</dd>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo ife($cadastro['Cadastro']['ativo']=='S','Ativo','Inativo'); ?>
			&nbsp;
		</dd>
    	<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Criado em:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cadastro['Cadastro']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modificado em:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cadastro['Cadastro']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
   <?php echo $html->link('Voltar',array('controller'=>'cadastros','action'=>'index','admin')); ?>
   &nbsp;<a href="#" class='imprimir'>Imprimir</a>
</div>
