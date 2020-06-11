$(document).ready(function() {
    $("#busc").keyup(buscar);
    $("#submit").click(mostrar_busqueda);
});
function buscar() {
    textoBusqueda = $("#busc").val();
    //alert(textoBusqueda);
    if (!!textoBusqueda) {
        $.ajax({
           type: "POST",
           url: "buscar.php",
           data: {
               'textoBusqueda':textoBusqueda
           },
           success: function(data) {
                $("#divresult").html(data);
            }
         });
    } else { 
        $("#divresult").html('fallo en el sistema');
	}//fin if
	
}//fin buscar

function mostrar_busqueda(){
  muestra = $("#busc").val();
  if (!!textoBusqueda) {
    $.ajax({
       type: "POST",
       url: "muestra.php",
       data: {
           'muestra':muestra
       },
       success: function(data) {
            $("#divresult").html(data);
        }
     });
} else { 
    $("#divresult").html('fallo en el sistema');
  }//fin if
}


