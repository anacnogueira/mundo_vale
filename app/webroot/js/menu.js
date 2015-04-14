$(document).ready(function(){
  //Carregar Dados selecionados anteriormene

  //1. Cidade
  $("#profissionaisCidadeId option").each(function(){
    
    if($("#profissionaisCidadeName").val() != "" && 
    $("#profissionaisCidadeName").val() == $(this).text())
      $(this).attr("selected",true);    
  });

  //2. Subcategoria
  $("select[id *= subcategoria] option").each(function(){
    if($("#profissionaisSubcategoria").val() != "" && 
      $("#profissionaisSubcategoria").val() == $(this).text())
      $(this).attr("selected",true); 
  });
  
 //Carregar dados no form da cidade e profissão escolhida
 $("select[id *= subcategoria]").change(function(e){
    e.preventDefault();
    if($(this).val() == "Mão de Obra" || $(this).val() ==  "Prestação de  Serviços"){
      return false;
    }
    
    var form = $("#profissionaisForm");
    form.get(0).setAttribute('action', "/mundo_vale/profissional/lista/" + $(this).val());
    //form.get(0).setAttribute('action', "/site_teste/profissional/lista/" + $(this).val());
    $("#profissionaisSubcategoria").val($(this).val());
    if($('#profissionaisCidadeId option:selected').val() != 0)
      $("#profissionaisCidadeName").val($('#profissionaisCidadeId option:selected').text());

    form.submit();

  });
});