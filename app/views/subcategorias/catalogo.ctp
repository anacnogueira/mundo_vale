<h1>Catálogo</h1>
  <ul>
    <?php foreach($categorias as $key=>$categoria): ?>
      <li><?php echo $categoria; ?>
        <ul>
         <?php foreach($subcategorias as $subcategoria): ?>
          <?php if($subcategoria['Subcategoria']['categoria_id'] == $key): ?>
          <li><?php echo $html->link($subcategoria['Subcategoria']['name'],
           '/profissional/lista/'.$subcategoria['Subcategoria']['name']); ?></li>
          <?php endif; ?>
         <?php endforeach; ?>
        </ul>
      </li>
    <?php endforeach; ?>
  </ul>