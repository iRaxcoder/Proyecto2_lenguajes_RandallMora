function iniciar_sesion(usuario, contrasennia) {
    alert(usuario + contrasennia)
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

            if (response == "0") {
                div = document.querySelector(".mensaje");
                var html_text = "<div class='alert alert-danger' role='alert'>Ha ocurrido un error</div>";
                div.innerHTML = html_text;
            }
            if (response == "1") {
                mostrar_modulo_admin();
            }
            if (response == "2") {

            }


            // div = document.querySelector(".mensaje");
            // var html_text = "<div class='alert alert-success' role='alert'>" + response + "</div>";
            // div.innerHTML = html_text;

        },
        error: function (jqXHR, textStatus, errorThrown) {

            div = document.querySelector(".mensaje");
            var html_text = "<div class='alert alert-danger' role='alert'>" + "Ha ocurrido un error" + "</div>";
            div.innerHTML = html_text;
        }
    });
    return false;
}

function registrar_usuario(usuario, role, edad, direccion, genero, contrasennia) {
    alert(usuario + role + edad + direccion + genero + contrasennia);
    var parametros = {
        "usuario2": usuario,
        "edad": edad,
        "direccion": direccion,
        "genero": genero,
        "contrasennia2": contrasennia,
        "role": role
    };
    $.ajax({
        data: parametros,
        url: '?controlador=User&accion=registrar_usuario',
        dataType: "json",
        type: 'post',
        beforeSend: function () {

        },
        success: function (response) {
            mensaje = "Se ha registrado con éxito";
            if (response == "0") {
                mensaje = "Ha ocurrido un error, o ya existe el usuario.";
            }
            div = document.querySelector(".mensaje");
            var html_text = "<div class='alert alert-success' role='alert'>" + mensaje + "</div>";
            div.innerHTML = html_text;
        },
        error: function (jqXHR, textStatus, errorThrown) {

            alert(textStatus);
        }

    });
    return false;


}