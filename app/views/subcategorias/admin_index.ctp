<div class="bairros index">
<h2><?php __('Profissões');?></h2>
<div class="filtro">
     <?php echo $form->create(array('inputDefaults' => array(
                                                        'label' => false,
                                                        'div' => false))); ?>
     <table class="none">
    <tr>
      <td>Nome:</td>
      <td><?php echo $form->input('name'); ?></td>
      <td>Categoria:</td>
      <td><?php echo $form->input('categoria_id'); ?></td>
      <td>Exibir:</td>
      <td>
        <?php echo $form->input('qtde',array('type'=>'select','options'=>$qtde,'default'=>1)); ?>
         <?php echo $form->submit('Pesquisar',array('div'=>false)); ?>
      </td>
    </tr>
  </table>
  </form>
  </div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Nova Profissão', true), array('action' => 'admin_add')); ?></li>
	</ul>
</div>  
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('ID','id');?></th>
	<th><?php echo $paginator->sort('NOME','name');?></th>
	<th><?php echo $paginator->sort('CATEGORIA','Categoria.name');?></th>
	<th class="actions"><?php __('Ações');?></th>
</tr>
<?php
foreach ($subcategorias as $subcategoria):

?>
	<tr>
		<td><?php echo $subcategoria['Subcategoria']['id']; ?></td>
		<td><?php echo $subcategoria['Subcategoria']['name']; ?></td>
		<td><?php echo $subcategoria['Categoria']['name']; ?></td>

		<td class="actions">
			<?php echo $html->link(__('Visualizar', true), array('action' => 'admin_view', $subcategoria['Subcategoria']['id'])); ?>
			<?php echo $html->link(__('Editar', true), array('action' => 'admin_edit', $subcategoria['Subcategoria']['id'])); ?>
			<?php echo $html->link(__('Excluir', true), array('action' => 'admin_delete', $subcategoria['Subcategoria']['id']), null, sprintf(__('Tem certeza que deseja excluir o registro # %s?', true), $subcategoria['Subcategoria']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('Anterior', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('Próximo', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>