<?php
  $script = $html->css(array('base_print'),'stylesheet')."\n";
  $script .= $html->css(array('print'),'stylesheet', array('media' => 'print'))."\n";
  $script .= $javascript->link(array('print'))."\n";
  echo $this->addScript('scripts_for_layout',$script);
 ?>
<div class="print">
 <div id="header">
   <h1>Mundo Vale&reg;</h1>
    <h2>Catálogo Eletrônico de Prestação de Serviço e de Mão de Obra</h2>
 </div>

 <table cellpadding="0" cellspacing="0">
  <tr>
    <td class="label">Nome*:</td>
    <td colspan="3"></td>
  </tr>
    <tr>
    <td class="label">Pessoa*:</td>
    <td colspan="3">
      <span>&nbsp;</span> Física &nbsp;&nbsp;
      <span>&nbsp;</span> Juridica
    </td>
  </tr>
  <tr>
    <td class="label">CPF/CNPJ*:</td>
    <td colspan="3"></td>
  </tr>
  <tr>
    <td class="label">RG:</td>
    <td colspan="3"></td>
  </tr>
  <tr>
    <td class="label">Escolaridade:</td>
    <td colspan="3"></td>
  </tr>
  <tr>
    <td colspan="4"><h3>Endereço</h3></td>
  </tr>
  <tr>
   <td class="label">Endereço*:</td>
   <td></td>
   <td class="label">Bairro*:</td>
   <td></td>
  </tr>
  <tr>
   <td class="label">Complemento:</td>
   <td></td>
   <td class="label">CEP*:</td>
   <td></td>
  </tr>
  <tr>
   <td class="label">Cidade*:</td>
   <td></td>
   <td class="label">UF:</td>
   <td></td>
  </tr>
  <tr>
    <td colspan="4"><h3>Contato</h3></td>
  </tr>
  <tr>
    <td class="label">Telefone Fixo*:</td>
    <td colspan="3">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
  </tr>
  <tr>
    <td class="label">Celular:</td>
    <td colspan="3">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
  </tr>
  <tr>
    <td class="label">E-mail:</td>
    <td colspan="3"></td>
  </tr>
  <tr>
    <td colspan="4"><h3>Profissão</h3></td>
  </tr>
  <tr>
    <td colspan="3" class="title">
     <h4>Prestação de serviço</h4>
     <table cellpadding="0" cellspacing="0" >
     <?php
       $cols=4;
       $cont=1;
     ?>
      <?php foreach($servicos as $servico): ?>
      <?php if($cont==1): ?>
        <tr>
      <?php endif; ?>
          <td class="box">&nbsp;</td>
          <td width:"50%"><?php echo $servico; ?></td>
       <?php if($cont == $cols): ?>
        </tr>
        <?php $cont=0; ?>
       <?php endif; ?>
       <?php $cont++; ?>
      <?php endforeach; ?>
      <tr>
           <td class="box">&nbsp;</td>
           <td colspan="3">Outros:</td>
          </tr>
     </table>
    </td>
    <td>
      <h4>Mão de Obra</h4>
      <table cellpadding="0" cellspacing="0">
        <?php foreach($mao_obras as $mao_obra): ?>
          <tr>
            <td class="box">&nbsp;</td>
            <td><?php echo $mao_obra; ?></td>
          </tr>
        <?php endforeach; ?>
        <tr>
           <td class="box">&nbsp;</td>
           <td>Outros:</td>
          </tr>
      </table>
    </td>
  </tr>
  <tr><td colspan="4">&nbsp;</td></tr>
  <tr>
    <td colspan="2" class="title">
      <h4>Histórico Profissional*</h4>
      <table>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
      </table>
      </td>
      <td colspan="2">
       <h4>Referência* Nome*</h4>
       <table>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Nome*:</td></tr>
        <tr><td>Telefone*: (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td></tr>
        <tr><td>Nome:</td></tr>
        <tr><td>Telefone: (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td></tr>
        <tr><td>Nome:</td></tr>
        <tr><td>Telefone: (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td></tr>
        <tr><td>Nome:</td></tr>
        <tr><td>Telefone: (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td></tr>
      </table>
      </td>
  </tr>
 </table>
</div>
<div class="actions">
   <?php echo $html->link('Voltar',array('controller'=>'cadastros','action'=>'index','admin')); ?>
   &nbsp;<a href="#" class='imprimir'>Imprimir</a>
 </div>