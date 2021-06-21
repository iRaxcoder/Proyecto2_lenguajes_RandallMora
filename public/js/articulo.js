const PROMOCION = 2;
const ARTICULO = 1;


function mostrar_articulos(opcion) {
    var parametros = {
        "e": "eo"
    };
    $.ajax({
        data: parametros,
        url: '?controlador=articulo&accion=obtener_articulos',
        dataType: "json",
        type: 'post',
        beforeSend: function () {

        },
        success: function (response) {
            var titulo = document.querySelector(".ofrecimiento");
            var contenido = document.getElementById("rowArticulos");

            if (opcion == ARTICULO) {

                titulo.innerHTML = "<p>Articulos</p";
                contenido.innerHTML="";
                //
                $.each(response['articulos'], function (key, value) {

                    contenido.innerHTML+=
                        " <div class='card col-md-1 offset-md-2' style='width: 18rem; margin-bottom: 1em;'>" +
                        " <img class='card-img-top' height='200px' width='200' src='/public/img/" + value['NOMBRE_IMAGEN'] + "'" + " alt='" + value['NOMBRE_IMAGEN'] + "'>" +
                        "<div class='card-body'>" +
                        "<h5 class='card-title'>" + value['NOMBRE_ARTICULO'] + "</h5>" +
                        " <p class='card-text'>" + value['DESCRIPCION'] + "</p>" +
                        "<p>Precio: $" + value['PRECIO'] + "</p>" +
                        "<a href='#' style='margin: 1em;' class='btn btn-primary'>" +
                        "<img height='25px' src='/public/img/carrito.png' alt='carrito'>" +
                        "</a>" +
                        "<a href='#' class='btn btn-primary'>" +
                        "<img height='25px' src='/public/img/comprar.png' alt='carrito'>" +
                        "</a>" +
                        " </div>" +
                        "</div>";
                });

            } else if (opcion == PROMOCION) {
                titulo.innerHTML = "<p>Promociones</p";
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
        }

    });
    return false;
}