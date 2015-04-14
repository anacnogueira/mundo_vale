$(document).ready(function(){
  $("a.export").click(function(e){
    e.preventDefault();
    var form = $("#CadastroAdminIndexForm");
    form.get(0).setAttribute('action', $(this).attr("href"));
    form.attr('target',$(this).attr("target"));
    form.submit();
    location.reload(true);
  });
});