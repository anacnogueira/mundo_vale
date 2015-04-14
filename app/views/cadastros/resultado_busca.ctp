<h1>Resultado Busca</h1>
<?php if($profissionais): ?>
<p><?php echo $total; ?></p>
<?php echo $this->element('list_profissionais'); ?>
<?php else: ?>
<div class='noResults'>Nenhum resultado encontrado para essa busca</div>
<?php endif; ?>