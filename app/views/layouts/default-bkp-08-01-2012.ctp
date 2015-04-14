<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo Configure::read('Site.name') ?> - <?php echo $title_for_layout; ?></title>
  <?php echo $html->meta('description',Configure::read('Site.slogan'))."\n";?>
  <?php echo $html->meta('keywords','mão de obra, prestação de serviços,serviços, Vale do Paraíba, São José dos Campos')."\n";?>
  <meta name="robots" content="index, follow" />
  <meta name="author" content="Ana Claudia Nogueira - www.anaclaudia.com.br" />
  <?php echo $html->charset('UTF-8'); ?>
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
	<?php echo $this->element('top'); ?>
  <div class="container">
  <div class="colmask threecol">
    <div class="colmid">
        <div class="colleft">
            <div class="col1wrap">
                <div class="content">
                  <?php echo $this->Session->flash(); ?>
                  <?php echo $content_for_layout; ?>
                  <?//php echo $this->element('sql_dump'); ?>
                </div>
            </div>
            <?php echo $this->element('menu'); ?>
            <?php echo $this->element('banner'); ?>
        </div>
    </div>
  </div>
  </div>
  <?php echo $this->element('footer'); ?>
</body>
</html>