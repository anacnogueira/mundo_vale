<div id="menu">
  <?php echo $form->create('profissionais',array('id'=>'profissionaisForm')); ?>
     Cidade:
     <?php echo $form->input('cidade_id',array('label'=>false,'type'=>'select')); ?>
     <?php echo $form->input('cidade_name',array('type'=>'hidden','value'=>$cookie_menu["cidade_name"])); ?>
     <?php echo $form->input('subcategoria',array('type'=>'hidden','value'=>$cookie_menu["subcategoria"])); ?>
     Você procura: 

      <?php foreach($categorias_mnu as $key=>$categoria): ?>
        
        <select name="data[profissionais][subcategorias]" id="subcategoria<?php echo $key ?>" style="width: 180px">
        <?php foreach($subcategorias_mnu as $subcategoria): ?>
           <?php if($subcategoria['Subcategoria']['categoria_id'] == $key): ?>
             <option value="<?php echo $subcategoria['Subcategoria']['name'] ?>"><?php echo $subcategoria['Subcategoria']['name'] ?></option>
           <?php endif; ?>
         <?php endforeach; ?>
         </select>
      <?php endforeach; ?>

  </form>
  <?php echo $this->element('footer'); ?>
</div>
