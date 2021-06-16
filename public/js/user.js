function iniciar_sesion(usuario, contrasennia) {

    var parametros = {
        "usuario": usuario,
        "contrasennia": contrasennia
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
            var html_text = "<div class='alert alert-success' role='alert'>" + response + "</div>";
            div.innerHTML = html_text;
        }
    });
    return false;
}

function registrar_usuario(usuario, edad, direccion, genero, contrasennia) {
    alert(usuario+edad+direccion+genero+contrasennia);
    var parametros = {
        "usuario2": usuario,
        "edad": edad,
        "direccion": direccion,
        "genero": genero,
        "contrasennia2": contrasennia
    };
    $.ajax({
        data: parametros,
        url: '?controlador=User&accion=registrar_usuario',
        dataType: "json",
        type: 'post',
        beforeSend: function () {

        },
        success: function (response) {
            div = document.querySelector(".mensaje");
            var html_text = "<div class='alert alert-success' role='alert'>" + response + "</div>";
            div.innerHTML = html_text;
        }
    });
    return false;
}