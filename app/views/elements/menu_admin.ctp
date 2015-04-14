<div class="menu">
 <ul>
  <li><?php echo $html->link('Cadastros',array('controller'=>'cadastros','action'=>'index','admin'=>true),array('title'=>'Gerenciamento de cadastros')); ?></li>
  <li><?php echo $html->link('Profissões',array('controller'=>'profissoes','action'=>'index/','admin'=>true), array('title'=>'Cadastro de profissões')); ?></li>
  <li><?php echo $html->link('Cidades',array('controller'=>'cidades','action'=>'index','admin'=>true), array('title'=>'Cadastro de cidades')); ?></li>
  <li><?php echo $html->link('Usuários sistema',array('controller'=>'usuarios','action'=>'index','admin'=>true), array('title'=>'Gerenciamento de usuários do sistema')); ?></li>
 </ul>
</div>
