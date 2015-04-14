<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo Configure::read('Site.name') ?> - <?php echo $title_for_layout; ?></title>
  <?php echo $html->meta('description',Configure::read('Site.slogan'))."\n";?>
  <?php echo $html->meta('keywords','mão de obra, prestação de serviços,serviços, Vale do Paraíba, São José dos Campos')."\n";?>
  <meta name="author" content="Ana Claudia Nogueira - www.anaclaudia.com.br" />
  <?php echo $html->charset('UTF-8'); ?>
  <?php echo $javascript->link(array('jquery')); ?>
	<?php echo $this->Html->css('geral'); ?>
  <?php echo $scripts_for_layout; ?>
</head>
<body>
	<div id="container">
		<?php echo $this->element('top'); ?>
    <?php echo $this->element('menu'); ?>
		<div id="content">
      <?php echo $this->Session->flash(); ?>
      <?php echo $content_for_layout; ?>
		</div>
   <?php echo $this->element('banner'); ?>
   <?php echo $this->element('footer'); ?>
   <?//php echo $this->element('sql_dump'); ?>  
	</div>
</body>
</html>