<?php
$script = $javascript->link(array('jquery.selects','load_profissao2','export_xls'))."\n";
echo $this->addScript('scripts_for_layout',$script);
?>

<div class="cadastros index">
  <h2><?php __('Cadastros'); ?></h2>
  <div class="filtro">
    <?php echo $form->create(array('inputDefaults'=>array(
                                                    'label'=>false,
                                                    'div'=>false)));
    ?>
      <table class="none">
        <tr>
          <td>Nome:</td>
          <td><?php echo $form->input('nome'); ?></td>
          <td>Categoria:</td>
          <td><?php echo $form->input('categoria'); ?></td>
          <td>Profissão</td>
          <td><?php echo $form->input('subcategoria_id'); ?></td>
        </tr>
        <tr>
          <td>Cidade:</td>
          <td><?php echo $form->input('cidade'); ?></td>
          <td>Status:</td>
          <td><?php echo $form->input('ativo',array('type'=>'select','options'=>$status)); ?></td>
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
      <li><?php echo $html->link(__('Novo cadastro', true), array('action' => 'admin_add')); ?></li>
      <li><?php echo $html->link(__('Exportar dados para planilha',true),array('action'=>'admin_export_xls'),array('class'=>'export','target'=>'_blank')); ?></li>
      <li><?php echo $html->link(__('Imprimir formulário',true),array('action'=>'admin_print_form')); ?></li>

    </ul>
  </div>
  <table cellpadding="0" cellspacing="0">
    <tr>
      <th><?php echo $paginator->sort('ID','id');?></th>
	    <th><?php echo $paginator->sort('NOME','nome');?></th>
	    <th><?php echo $paginator->sort('PROFISSÃO','subcategoria_id');?></th>
      <th>STATUS</th>
	    <th class="actions"><?php __('Ações');?></th>
    </tr>
    <?php foreach($cadastros as $cadastro): ?>
    <tr>
      <td><?php echo $cadastro['Cadastro']['id']; ?></td>
      <td><?php echo $cadastro['Cadastro']['nome']; ?></td>
      <td><?php echo $cadastro['Subcategoria']['name']; ?></td>
      <td><?php echo $statuso->showCurrentStatus('cadastros','ativo',$cadastro['Cadastro']['ativo'],$cadastro['Cadastro']['id']); ?></td>
      <td class="actions">
			<?php echo $html->link(__('Imprimir', true), array('action' => 'admin_view', $cadastro['Cadastro']['id'])); ?>
			<?php echo $html->link(__('Editar', true), array('action' => 'admin_edit', $cadastro['Cadastro']['id'])); ?>
			<?php echo $html->link(__('Excluir', true), array('action' => 'admin_delete', $cadastro['Cadastro']['id']), null, sprintf(__('Tem certeza que deseja excluir o registro # %s?', true), $cadastro['Cadastro']['id'])); ?>
		</td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>
