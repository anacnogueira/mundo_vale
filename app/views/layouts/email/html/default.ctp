<?php echo $html->docType('xhtml-strict'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Mundo Vale - Catálogo eletronico de prestação de serviços e mão de obra</title>
  <?php echo $html->charset('UTF-8'); ?>
  <style type='text/css'>
    body{
      font-family: verdana;
      background: #999;
       }

    div#container{
      width: 650px;
      margin: 0 auto;
      background: #efefef;
      padding: 10px;
    }

   h1{
    font-size: 16px;
    color: #c60;
    font-weight: bold;
    margin-bottom: 10px;
  }

  h2{ font-size: 16px;  }

  </style>
</head>

<body>
  <div id="container">
    <div id="header">
      <?php echo $html->image('http://www.mundovale.com.br/site_teste/img/logo_mini.jpg',array('alt'=>Configure::read('Site.name'))); ?>
    </div>
    <div id="conteudo">
       <?php echo $content_for_layout;?>
    </div>
  </div>
</body>
</html>