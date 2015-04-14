$(document).ready(function(){
  $("input[name=btn_voltar]").click(function(){
    window.location = "../cadastros/";
  });

  $(".imprimir").click(function(){
    window.print();
  })
})
