function iniciar_sesion(usuario,contrasennia) {
    
    var parametros = {
        "usuario": usuario,
        "contrasennia":contrasennia
    };
    $.ajax({
        data: parametros,
        url: '?controlador=User&accion=iniciar_sesion',
        dataType: "json",
        type: 'post',
        beforeSend: function () {
            
        },
        success: function (response) {
            div = document.querySelector(".mensaje");
            var html_text= "<div class='alert alert-success' role='alert'>Success</div>";
            div.innerHTML=html_text;
        }
    });
    return false;
}