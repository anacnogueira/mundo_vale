<h1><?php echo $titulo['Categoria']['name']; ?> &raquo; <?php echo $titulo['Subcategoria']['name']; ?></h1>
<?php if($profissionais): ?>
<?php echo $this->element('list_profissionais'); ?>
<?php else: ?>
<div class='noResults'>Nenhum resultado encontrado para essa busca</div>
<?php endif; ?>

 