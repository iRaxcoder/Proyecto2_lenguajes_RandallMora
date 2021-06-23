

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

