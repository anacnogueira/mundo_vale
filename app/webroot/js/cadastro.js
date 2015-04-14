$(document).ready(function(){
  $("div#pf,div#pj").hide();
  
  var pessoa = $("input[name='data[Cadastro][pessoa]']");
  
  pessoa.click(function(){
    show_div_pessoa($(this).val()); 
  });
  
  pessoa.each(function(){
   if($(this).is(":checked")) 
   show_div_pessoa($(this).val());
  });
});

function show_div_pessoa(pessoa){
  //alert(pessoa);
  if(pessoa == "fisica"){
    $("div#pj").hide();
    $("div#pf").show();
  }
  else if(pessoa == "juridica"){
    $("div#pf").hide();
    $("div#pj").show();
  }
}