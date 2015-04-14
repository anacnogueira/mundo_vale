jQuery(document).ready(function() {
//Carregar endereço ao inserir CEP
  jQuery(".cep").keyup(function(){
    var valida = false
    var campo =  $(this);
    if(campo.val().match(/^[0-9]{5}-[0-9]{3}$/))
      valida = true;

      if(valida){
        jQuery.ajax({
         type: "GET",
          url: "http://localhost/mundo_vale/cadastros/get_end",
          //url: "http://www.mundovale.com.br/site_teste/cadastros/get_end",
          contentType: "application/json; charset=utf-8",
          dataType: "json",
          data: "cep=" + $(this).val(),
          beforeSend: function(){
            //trava o campo
            campo
            .attr('readonly',true)
            .attr('disabled',true)
         //add the spinner
         $('<div></div>')
          .attr('class','spinner')
          .html('Aguarde...')
          .hide()
          .insertAfter("span.inscep")
          .fadeTo('slow',0.6)
        },
        complete: function(){
          //remove the spinner
          $('div.spinner').fadeOut('slow',function(){
             $(this).remove();
          });
          campo
           .removeAttr('readonly')
           .removeAttr('disabled');
        },
          success: function(json) {
            //$("div#end_completo").show();
            $("#endereco").val(json.tipo_logradouro + " " +(json.logradouro));
            $("#bairro").val(json.bairro);
            $("#cidade").val(json.cidade);
            $("#estado").val(json.uf);
          },
          error: function (XMLHttpRequest, textStatus, errorThrown) {
            $("#endereco").val('');
            $("#num").val('');
            $("#complemnto").val('');
            $("#bairro").val('');
            $("#cidade").val('');
            $("#estado").val('');
            alert(XMLHttpRequest.responseText);
          }
      }); //Fim Ajax
    } //Fim IF
    //else
     //$("div#end_completo").hide();
  });
});  //Fim documento
