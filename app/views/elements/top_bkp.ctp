  <div id="header">
   
	 <?php echo $this->Html->link($this->Html->image(Configure::read('Site.logo'),
   array("alt"=>Configure::read('Site.nome')." - ".Configure::read('Site.slogan'))),'/',
   array('escape'=>false)); ?>
    <div class="busca">
     <?php echo $this->Form->Create('busca',array('url'=>'/resultado_busca','inputDefaults' => array('label' => false,'div' => false))); ?>
       <?php echo $this->Form->input('keyword',array('value'=>'Busca rápida','class'=>'custom clear')); ?>
       <?php echo $this->Form->submit('',array('div'=>false)); ?>
     </form>
   </div>
   <div class="top_banner">Espaço reservado para Banner</div> 
   <div class='mnu_top'>
    <ul>
     <li><?php echo $this->Html->link('Cadastre-se','/cadastrese'); ?></li>
     <li><?php echo $this->Html->link('Catálogo','/catalogo'); ?></li>
     <li><?php echo $this->Html->link('Contato','/contato'); ?></li>
    </ul>
   </div>
 
	</div>
