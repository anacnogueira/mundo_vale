$(document).ready(function(){
 //Abrir/fechar menu
 $( '#slide > li > ul' )
	.hide()
	.click(function( e ){
		e.stopPropagation();
	});
  $('#slide > li').toggle(function(){
     $(this).find('span').text('-');
     $(this).find('ul').slideDown();
  }, function(){
  	$(this).find('span').text('+');
    $(this).find('ul').slideUp();
  });

 //Carregar dados no form da cidade e profissão escolhida
 $("a.profissional").click(function(e){
    e.preventDefault();
    var form = $("#profissionaisForm");
    form.get(0).setAttribute('action', $(this).attr("href"));
    $("#profissionaisSubcategoria").val($(this).text());
    if($('#profissionaisCidadeId option:selected').val() != 0)
      $("#profissionaisCidadeName").val($('#profissionaisCidadeId option:selected').text());

    form.submit();

  });
});