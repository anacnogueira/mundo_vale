<?php if($profissional): ?>
  <div class="personal vcard">
    <h1><?php echo $profissional['Cadastro']['nome']; ?></h1>
    <?php if(!empty($profissional['Cadastro']['telefone'])): ?>
    <p>Tel: <?php echo $profissional['Cadastro']['telefone']; ?></p>
    <?php endif; ?>

    <?php if(!empty($profissional['Cadastro']['celular'])): ?>
    <p>Cel: <?php echo $profissional['Cadastro']['celular']; ?></p>
    <?php endif; ?>

    <?php if(!empty($profissional['Cadastro']['email'])): ?>
    <p>E-mail: <?php echo $profissional['Cadastro']['email']; ?></p>
    <?php endif; ?>
  </div>

  <div class="end">
    <p><?php echo $profissional['Cadastro']['endereco']; ?>
		  &nbsp;Nº  <?php echo $profissional['Cadastro']['numero']; ?>
      <?php if(!empty($profissional['Cadastro']['complemento'])): ?>
      - <?php echo $profissional['Cadastro']['complemento']; ?>
     <?php endif; ?>
    </p>
   <p><?php echo $profissional['Cadastro']['bairro']; ?>
     - <?php echo $profissional['Cadastro']['cidade']; ?>
     - <?php echo $profissional['Cadastro']['estado']; ?>
    </p>
  </div>
  <?php if(!empty($profissional['Cadastro']['referencias'])): ?>
  <div class="ref">
    <h2>Referências</h2>
    <?php echo $profissional['Cadastro']['referencias']; ?>
  </div>
  <?php endif; ?>

  <?php if(!empty($profissional['Cadastro']['historico_profissional'])): ?>
  <div class="historico">
    <h2>Histórico profissional</h2>
    <?php echo $profissional['Cadastro']['historico_profissional']; ?>
  </div>
  <?php endif; ?>
<?php endif; ?>