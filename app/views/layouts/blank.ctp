<?php echo $html->docType('xhtml-strict'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Mundo Vale - Admin - <?php echo $title_for_layout; ?></title>
  <?php echo $html->charset('UTF-8'); ?>
  <?php echo $javascript->link(array('jquery')); ?>
  <?php echo $scripts_for_layout; ?>
</head>
<body>
  <div id="container">
    <div id="content">
      <div id="main_content_container">
        <?php echo $content_for_layout;?>
      </div>

	  </div>
	</div>
</body>
</html>