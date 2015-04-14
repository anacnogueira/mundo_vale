<?php
  $script = $javascript->link(array('jquery.mousewheel','jquery.fancybox','config.fancybox'))."\n";
  $script .= $this->Html->css(array('jquery.fancybox'));
  echo $this->addScript('scripts_for_layout',$script);
?>

<?php if(isset($profissionais) and is_array($profissionais)): ?>
<?php foreach($profissionais as $profissional): ?>
 <div class="box">
  <p class="desc"><?php echo $profissional['Cadastro']['nome']; ?></p>
  <?php if($this->params['action'] == 'resultado_busca'): ?>
   <p><?php echo $profissional['Categoria']['name']." &raquo; ".$profissional['Subcategoria']['name'];  ?></p>
  <?php endif; ?>
  <p><?php echo $profissional['Cadastro']['cidade']; ?></p>
  <p><?php echo $profissional['Cadastro']['telefone']; ?></p>
  <p><?php echo $html->link('+ informações','/detalhes/'.$profissional['Cadastro']['id'],
  array("class"=>"html fancybox.ajax")); ?></p>
</div>
<?php endforeach; ?>
<div class="paging">
  <?php echo $paginator->prev('« Anterior ', null, null); ?>
  <?php echo $paginator->numbers(); ?>
  <?php echo $paginator->prev('Próximo » ', null, null); ?>
</div>
<?php endif; ?>
