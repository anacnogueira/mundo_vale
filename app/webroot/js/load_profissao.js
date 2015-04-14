$(document).ready(function() {
   get_profissoes($("input[name='data[Cadastro][categoria]']"),$("#CadastroSubcategoriaId"),"s");
   outra_profissao($("#CadastroSubcategoriaId").val());

   $("#CadastroSubcategoriaId").change(function(){
    outra_profissao($(this).val());
   });
});

function empty(valor){
    if(valor == "" || valor == 0 || valor == null || valor == undefined)
      return true;
    else
      return false;
  }

function outra_profissao(valor){
    //alert(valor);
   if(valor == -1) //Outra profissão
       $("div.outra_profissao").show();
     else{
       $("input[name='data[Cadastro][outra_profissao]']").val('');
       $("div.outra_profissao").hide();
     }
}
function get_profissoes(campo_categoria,campo_profissao,outra_profissao){

  //Carregar profissões a partir da categoria escolhida
   campo_categoria.click(function(){
    var categoria_sel = $(this).val();
    var dropdownSet = campo_profissao;

    if(empty(categoria_sel)){
      dropdownSet.attr("disabled",true);
      $(dropdownSet).emptySelect();
    }
    else {
      $.ajax({
        type: "GET",
        url: "http://localhost/mundo_vale/cadastros/get_profissao",
        //url: "http://www.mundovale.com.br/site_teste/cadastros/get_profissao",
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        data: {categoria_id: categoria_sel,outra_profissao: outra_profissao},
        beforeSend: function(){
         //add the spinner
         $('<div></div>')
          .attr('class','spinner')
          .html('Aguarde...')
          .hide()
          .insertAfter(dropdownSet)
          .fadeTo('slow',0.6)
        },
        complete: function(){
          //remove the spinner
          $('div.spinner').fadeOut('slow',function(){
             $(this).remove();
          });
        },
        success: function(json) {
          $(dropdownSet).loadSelect(json);
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert("Erro: " + XMLHttpRequest.responseText);
        }
      });

    }
  });
}