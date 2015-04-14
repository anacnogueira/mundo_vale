<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-GB">
<head>
	<title><?php echo Configure::read('Site.name') ?> - <?php echo $title_for_layout; ?></title>
	<?php echo $html->charset('UTF-8'); ?>
	<?php echo $html->meta('description',Configure::read('Site.slogan'))."\n";?>
  <?php echo $html->meta('keywords','mão de obra, prestação de serviços,serviços, Vale do Paraíba, São José dos Campos')."\n";?>
	<meta name="robots" content="index, follow" />
  <meta name="author" content="Ana Claudia Nogueira - www.anaclaudia.com.br" />
	<?php echo $javascript->link(array('jquery','busca','menu')); ?>
	<?php echo $this->Html->css('geral'); ?>

  <?php echo $scripts_for_layout; ?>
  <!-- Code Google Analytics -->
  <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-27994513-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
  <div id="container">
    <div id="col_left">
      <?php echo $this->element('top'); ?>
      <?php echo $this->element('menu'); ?>
      <div id="content">
        <?php echo $this->Session->flash(); ?>
        <?php echo $content_for_layout; ?>
        <?//php echo $this->element('sql_dump'); ?>
      </div>
    </div>
    <div id="col_right">
      <?php echo $this->element('banner'); ?>
    </div>
  </div>
</body>
</html>
