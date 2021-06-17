function registrar_articulo(nombre, precio, descripcion, categoria,imagen) {
    var parametros = {
        "nombreProducto": nombre,
        "precio": precio,
        "descripcion": descripcion,
        "categoria": categoria
    };
    $.ajax({
        data: parametros,
        url: '?controlador=&accion=',
        dataType: "json",
        type: 'post',
        beforeSend: function () {

        },
        success: function (response) {
            mensaje = "Se ha registrado con éxito";
            if (response == "0") {
                mensaje = "Ha ocurrido un error, o ya existe el articulo.";
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