<div class="subcategorias form">
<h2>Editar Profissão</h2>
<p>Os campos com * são obrigatórios</p>
<?php echo $form->create('Subcategoria');?>
	<fieldset>
 		<legend><?php __('Informações');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name',array('label'=>'Nome*:'));
		echo $form->input('categoria_id',array('label'=>'Categoria*:'));
	?>
	</fieldset>
<?php echo $form->end('Enviar');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Excluir', true), array('action' => 'admin_delete', $form->value('Subcategoria.id')), null, sprintf(__('Tem certeza que deseja excluir o registro # %s?', true), $form->value('Subcategoria.id'))); ?></li>
		<li><?php echo $html->link(__('Listar Profissões', true), array('action' => 'admin_index'));?></li>
	</ul>
</div>
