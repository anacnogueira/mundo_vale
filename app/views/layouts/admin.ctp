<?php echo $html->docType('xhtml-strict'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Mundo Vale - Admin - <?php echo $title_for_layout; ?></title>
  <?php echo $html->charset('UTF-8'); ?>
	<?php echo $html->css(array('backend'));?>
  <?php echo $javascript->link(array('jquery')); ?>
  <?php echo $scripts_for_layout; ?>
</head>
<body>
  <div id="container">
    <div id="content">
      <?php echo $this->element('top_admin'); ?>
      <?php
      if($this->Session->check('usuario')){
       echo $this->element('menu_login_admin');
       echo $this->element('menu_admin');
      }
      ?>
      <div id="main_content_container">
      <?php echo $session->flash(); ?>
      <?php echo $content_for_layout;?>

      <?//php echo $this->element('sql_dump'); ?>
      </div>
      <div id="empty">&nbsp;</div>
      <?php echo $this->element('footer_admin'); ?>
	  </div>
	</div>
</body>
</html>