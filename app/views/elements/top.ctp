  <div id="header">
    <div class="cadastro">
     <?php echo $this->Html->image('msg_topo.jpg',array(
      'title'=>'Você é prestador de serviço? Você é prestador de mão de obra?',
      'alt'=>'Você é prestador de serviço? Você é prestador de mão de obra?'));
     ?>
     <?php echo $this->Html->link('Cadastre-se Aqui!','/cadastrese'); ?>
    </div>
    <div class="logo">
    <?php
      echo $this->Html->link($this->Html->image(Configure::read('Site.logo'), array(
        "alt"=>Configure::read('Site.name')." - ".Configure::read('Site.slogan'),
        "title"=>Configure::read('Site.name')." - ".Configure::read('Site.slogan')   )),
      '/',array('escape'=>false));
    ?>
    </div>
 
	</div>
