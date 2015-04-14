$(document).ready(function(){
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