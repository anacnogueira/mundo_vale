<?php
  $arquivo = 'cadastros-'.date('d-m-Y').'.xls';
  // Configurações header para forçar o download
  header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
  header ("Cache-Control: no-cache, must-revalidate");
  header ("Pragma: no-cache");
  header ("Content-type: application/x-msexcel");
  header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
  header ("Content-Description: PHP Generated Data" );

  if($cadastros):
?>
<table border="1" align="center">
  <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Pessoa</th>
    <th>CPF</th>
    <th>RG</th>
    <th>Escolaridade</th>   
    <th>CNPJ</th>
    <th>CEP</th>
    <th>Logradouro</th>
    <th>Bairro</th>
    <th>Cidade</th>
    <th>Estado</th>
    <th>Telefone Fixo</th>
    <th>Celular</th>
    <th>E-mail</th>
    <th>Categoria</th>
    <th>Profissão</th>
    <th>Referências</th>
    <th>Histórico Profissional</th>
    <th>Status</th>  
  </tr>
  <?php foreach($cadastros as $cadastro): ?>
  <tr>
    <td><?php echo $cadastro['Cadastro']['id']; ?></td>
    <td><?php echo $cadastro['Cadastro']['nome']; ?></td>
    <td><?php echo $cadastro['Cadastro']['pessoa']; ?></td>
    <td><?php echo $cadastro['Cadastro']['cpf']; ?></td>
    <td><?php echo $cadastro['Cadastro']['rg']; ?></td>
    <td><?php echo ife(!empty($cadastro['Cadastro']['escolaridade']),$cadastro['Cadastro']['escolaridade'],""); ?></td>   
    <td><?php echo $cadastro['Cadastro']['cnpj']; ?></td>
    <td><?php echo $cadastro['Cadastro']['cep']; ?></td>
    <td><?php echo $cadastro['Cadastro']['endereco']; ?>, <?php echo $cadastro['Cadastro']['numero']; ?></td>
    <td><?php echo $cadastro['Cadastro']['bairro']; ?></td>
    <td><?php echo $cadastro['Cadastro']['cidade']; ?></td>
    <td><?php echo $cadastro['Cadastro']['estado']; ?></td>
    <td><?php echo $cadastro['Cadastro']['telefone']; ?></td>
    <td><?php echo $cadastro['Cadastro']['celular']; ?></td>
    <td><?php echo $cadastro['Cadastro']['email']; ?></td>
    <td><?php echo $cadastro['Categoria']['name']; ?></td>
    <td><?php echo $cadastro['Subcategoria']['name']; ?></td>
    <td><?php echo $cadastro['Cadastro']['referencias']; ?></td>
    <td><?php echo $cadastro['Cadastro']['historico_profissional']; ?></td>
    <td><?php echo ife($cadastro['Cadastro']['ativo']=='S','Ativo','Inativo'); ?></td>  
  </tr>
  <?php endforeach; ?>
</table>
<?php endif; ?>

<?//php echo $this->element('sql_dump'); ?>