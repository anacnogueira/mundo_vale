<div class="subcategorias view">
<h2><?php  __('Profissão');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subcategoria['Subcategoria']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subcategoria['Subcategoria']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Categoria:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subcategoria['Categoria']['name']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Editar Profissão', true), array('action' => 'admin_edit', $subcategoria['Subcategoria']['id'])); ?> </li>
		<li><?php echo $html->link(__('Excluir Profissão', true), array('action' => 'admin_delete', $subcategoria['Subcategoria']['id']), null, sprintf(__('Tem certeza que deseja excluir o registro # %s?', true), $subcategoria['Subcategoria']['id'])); ?> </li>
		<li><?php echo $html->link(__('Listar Profissões', true), array('action' => 'admin_index')); ?> </li>
		<li><?php echo $html->link(__('Novo Profissão', true), array('action' => 'admin_add')); ?> </li>
	</ul>
</div>
