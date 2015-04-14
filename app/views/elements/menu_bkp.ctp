<div class="menu">
  <?php echo $form->create('profissionais',array('id'=>'profissionaisForm')); ?>
     <label for="">Cidade:</label>
     <?php echo $form->input('cidade_id',array('label'=>false,'type'=>'select')); ?>
     <?php echo $form->input('cidade_name',array('type'=>'hidden')); ?>
     <?php echo $form->input('subcategoria',array('type'=>'hidden')); ?>
     <ul id="slide">
     <?php foreach($categorias_mnu as $key=>$categoria): ?>
      <li><a href="#"><span>+</span> <?php echo $categoria; ?></a>
        <ul>
         <?php foreach($subcategorias_mnu as $subcategoria): ?>
          <?php if($subcategoria['Subcategoria']['categoria_id'] == $key): ?>
          <li>
          <?php echo $html->link($subcategoria['Subcategoria']['name'],
           '/profissional/lista/'.$subcategoria['Subcategoria']['name'],
           array('class'=>'profissional')); ?></li>
          <?php endif; ?>
         <?php endforeach; ?>
        </ul>
      </li>
     <?php endforeach; ?>
     </ul>
  </form>
  <div class="mnu_contato vcard">
    <h4>Contato</h4>
     <p class="fn org">Mundo Vale</p> 
     <p class="email">contato@mundovale.com.br</p>
     <p class="tel">(12) 3308-2847</p>
  </div>
</div>
