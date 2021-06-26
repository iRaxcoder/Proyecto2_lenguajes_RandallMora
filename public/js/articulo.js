const PROMOCION = 2;
const ARTICULO = 1;


function mostrar_articulos(opcion) {
    var parametros = {
        "e": "eo"
    };
    $.ajax({
        data: parametros,
        url: '?controlador=Articulo&accion=obtener_articulos',
        dataType: "json",
        type: 'post',
        beforeSend: function () {

        },
        success: function (response) {
            var titulo = document.querySelector(".ofrecimiento");
            var contenido = document.getElementById("rowArticulos");

            titulo.innerHTML = "<p>Articulos</p";
            contenido.innerHTML = "";
            //
            $.each(response['articulos'], function (key, value) {

                contenido.innerHTML +=
                    " <div class='card col-md-4 offset-md-2' style='width: 18rem; margin-bottom: 1em;'>" +
                    " <img class='card-img-top' height='200px' width='200px' src='/public/img/" + value['NOMBRE_IMAGEN'] + "'" + " alt='" + value['NOMBRE_IMAGEN'] + "'>" +
                    "<div class='card-body'>" +
                    "<h5 id='nombre_articulo' class='card-title'>" + value['NOMBRE_ARTICULO'] + "</h5>" +
                    " <p class='card-text'>" + value['DESCRIPCION'] + "</p>" +
                    "<p id='precio'><span>Precio: $</span>" + value['PRECIO'] + "</p>" +
                    "<a id='fav' href='javascript:;' onclick='agregar_favorito(this);'>Agregar/quitar fav</a>" +
                    "<input id='numero' type='number' min='1' style='width: 50px;' value='1'>" +
                    "<a id='agregar_carrito' href='javascript:;' onclick='agregar_al_carrito(this);' style='margin: 1em;' class='btn btn-primary'>" +
                    "<img height='25px' src='/public/img/carrito.png' alt='carrito'>" +
                    "</a>" +
                    "<a href='javascript:;' onclick='mostrar_compra_modal(this);' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalCompra'>" +
                    "<img height='25px' src='/public/img/comprar.png' alt='carrito'>" +
                    "</a>" +
                    " </div>" +
                    "</div>";
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
        }

    });
    return false;
}

function buscar_por_nombre(nombre) {
    var contador = 0;
    var parametros = {
        "nombre": nombre
    };
    $.ajax({
        data: parametros,
        url: '?controlador=Articulo&accion=obtener_articulos_nombre',
        dataType: "json",
        type: 'post',
        beforeSend: function () {

        },
        success: function (response) {
            var titulo = document.querySelector(".ofrecimiento");
            var contenido = document.getElementById("rowArticulos");
            contenido.innerHTML = "";
            //
            $.each(response['articulos'], function (key, value) {

                contenido.innerHTML +=
                    " <div class='card col-md-4 offset-md-2' style='width: 18rem; margin-bottom: 1em;'>" +
                    " <img class='card-img-top' height='200px' width='200' src='/public/img/" + value['NOMBRE_IMAGEN'] + "'" + " alt='" + value['NOMBRE_IMAGEN'] + "'>" +
                    "<div class='card-body'>" +
                    "<h5 id='nombre_articulo' class='card-title'>" + value['NOMBRE_ARTICULO'] + "</h5>" +
                    " <p class='card-text'>" + value['DESCRIPCION'] + "</p>" +
                    "<p id='precio'><span>Precio: $</span>" + value['PRECIO'] + "</p>" +
                    "<a id='fav' href='javascript:;' onclick='agregar_favorito(this);'>Agregar/quitar fav</a>" +
                    "<input id='numero' type='number' min='1' style='width: 50px;' value='1'>" +
                    "<a id='agregar_carrito' href='javascript:;' onclick='agregar_al_carrito(this);' style='margin: 1em;' class='btn btn-primary'" +
                    "data-id='" + value['ID_ARTICULO'] + "'" +
                    " data-nombre='" + value['NOMBRE_ARTICULO'] + "'" +
                    "data-precio='" + value['PRECIO'] + "'" +
                    ">" +
                    "<img height='25px' src='/public/img/carrito.png' alt='carrito'>" +
                    "</a>" +
                    "<a href='javascript:;' onclick='mostrar_compra_modal(this);' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalCompra'>" +
                    "<img height='25px' src='/public/img/comprar.png' alt='carrito'>" +
                    "</a>" +
                    " </div>" +
                    "</div>";
                contador += 1;
            });
            $.each(response['promos'], function (key, value) {

                contenido.innerHTML +=
                    " <div class='card col-md-4 offset-md-2' style='width: 18rem; margin-bottom: 1em;'>" +
                    " <img class='card-img-top' height='200px' width='200' src='/public/img/" + value['nombre_imagen'] + "'" + " alt='" + value['nombre_imagen'] + "'>" +
                    "<div class='card-body'>" +
                    "<h5 id='nombre_articulo' class='card-title'>" + value['nombre_articulo'] + "</h5>" +
                    " <p class='card-text'>" + value['descripcion'] + "</p>" +
                    "<p id='precio'>$<del>$" + value['precio_regular'] + "</del><span>$</span>" + value['PRECIO_REBAJA'] + "</p>" +
                    "<p>válido hasta el: " + value['fecha_final'] + " </p>" +
                    "<a id='fav' href='javascript:;' onclick='agregar_favorito(this);'>Agregar/quitar fav</a>" +
                    "<input id='numero' type='number' min='1' style='width: 50px;' value='1'>" +
                    "<a id='agregar_carrito' href='javascript:;' onclick='agregar_al_carrito(this);' style='margin: 1em;' class='btn btn-primary'" +
                    "data-id='" + value['id_articulo'] + "'" +
                    " data-nombre='" + value['nombre_articulo'] + "'" +
                    "data-precio='" + value['PRECIO_REBAJA'] + "'" +
                    ">" +
                    "<img height='25px' src='/public/img/carrito.png' alt='carrito'>" +
                    "</a>" +
                    "<a href='javascript:;' onclick='mostrar_compra_modal(this);' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalCompra'>" +
                    "<img height='25px' src='/public/img/comprar.png' alt='comprar directo'>" +
                    "</a>" +
                    " </div>" +
                    "</div>";
                contador += 1;
            });
            titulo.innerHTML = "<p>" + contador + " resultado(s) de búsqueda con " + '"' + nombre + '"' + "</p";

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
        }

    });
    return false;
}

function buscar_por_categoria(categoria) {
    var contador = 0;
    var categoria2 = categoria.dataset.value;
    var parametros = {
        "categoria": categoria2
    };
    $.ajax({
        data: parametros,
        url: '?controlador=Articulo&accion=obtener_articulos_categoria',
        dataType: "json",
        type: 'post',
        beforeSend: function () {

        },
        success: function (response) {
            var titulo = document.querySelector(".ofrecimiento");
            var contenido = document.getElementById("rowArticulos");
            contenido.innerHTML = "";
            //
            $.each(response['articulos'], function (key, value) {

                contenido.innerHTML +=
                    " <div class='card col-md-4 offset-md-2' style='width: 18rem; margin-bottom: 1em;'>" +
                    " <img class='card-img-top' height='200px' width='200' src='/public/img/" + value['NOMBRE_IMAGEN'] + "'" + " alt='" + value['NOMBRE_IMAGEN'] + "'>" +
                    "<div class='card-body'>" +
                    "<h5 id='nombre_articulo' class='card-title'>" + value['NOMBRE_ARTICULO'] + "</h5>" +
                    " <p class='card-text'>" + value['DESCRIPCION'] + "</p>" +
                    "<p id='precio'><span>Precio: $</span>" + value['PRECIO'] + "</p>" +
                    "<a id='fav' href='javascript:;' onclick='agregar_favorito(this);'>Agregar/quitar fav</a>" +
                    "<input id='numero' type='number' min='1' style='width: 50px;' value='1'>" +
                    "<a id='agregar_carrito' href='javascript:;' onclick='agregar_al_carrito(this);' style='margin: 1em;' class='btn btn-primary'" +
                    "data-id='" + value['ID_ARTICULO'] + "'" +
                    " data-nombre='" + value['NOMBRE_ARTICULO'] + "'" +
                    "data-precio='" + value['PRECIO'] + "'" +
                    ">" +
                    "<img height='25px' src='/public/img/carrito.png' alt='carrito'>" +
                    "</a>" +
                    "<a href='javascript:;' onclick='mostrar_compra_modal(this);' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalCompra'>" +
                    "<img height='25px' src='/public/img/comprar.png' alt='carrito'>" +
                    "</a>" +
                    " </div>" +
                    "</div>";
                contador += 1;
            });
            $.each(response['promos'], function (key, value) {

                contenido.innerHTML +=
                    " <div class='card col-md-4 offset-md-2' style='width: 18rem; margin-bottom: 1em;'>" +
                    " <img class='card-img-top' height='200px' width='200' src='/public/img/" + value['nombre_imagen'] + "'" + " alt='" + value['nombre_imagen'] + "'>" +
                    "<div class='card-body'>" +
                    "<h5 id='nombre_articulo' class='card-title'>" + value['nombre_articulo'] + "</h5>" +
                    " <p class='card-text'>" + value['descripcion'] + "</p>" +
                    "<p id='precio'>$<del>$" + value['precio_regular'] + "</del><span>$</span>" + value['PRECIO_REBAJA'] + "</p>" +
                    "<p>válido hasta el: " + value['fecha_final'] + " </p>" +
                    "<a id='fav' href='javascript:;' onclick='agregar_favorito(this);'>Agregar/quitar fav</a>" +
                    "<input id='numero' type='number' min='1' style='width: 50px;' value='1'>" +
                    "<a id='agregar_carrito' href='javascript:;' onclick='agregar_al_carrito(this);' style='margin: 1em;' class='btn btn-primary'" +

                    "data-id='" + value['id_articulo'] + "'" +
                    " data-nombre='" + value['nombre_articulo'] + "'" +
                    "data-precio='" + value['PRECIO_REBAJA'] + "'" +
                    ">" +
                    "<img height='25px' src='/public/img/carrito.png' alt='carrito'>" +
                    "</a>" +
                    "<a href='javascript:;' onclick='mostrar_compra_modal(this);' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalCompra'>" +
                    "<img height='25px' src='/public/img/comprar.png' alt='comprar directo'>" +
                    "</a>" +
                    " </div>" +
                    "</div>";
                contador += 1;
            });
            titulo.innerHTML = "<p>" + contador + " resultado(s) de búsqueda por categoría " + '"' + categoria2 + '"' + "</p";
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
        }

    });
    return false;
}

function mostrar_favoritos() {
    var parametros = {
        "usuario": usuario
    };
    $.ajax({
        data: parametros,
        url: '?controlador=Articulo&accion=mostrar_favoritos',
        dataType: "json",
        type: 'post',
        beforeSend: function () {

        },
        success: function (response) {
            var titulo = document.querySelector(".ofrecimiento");
            var contenido = document.getElementById("rowArticulos");

            titulo.innerHTML = "<p>Favoritos de " + usuario + "</p";
            contenido.innerHTML = "";
            //
            $.each(response['favoritos'], function (key, value) {

                contenido.innerHTML +=
                    " <div class='card col-md-4 offset-md-2' style='width: 18rem; margin-bottom: 1em;'>" +
                    " <img class='card-img-top' height='200px' width='200' src='/public/img/" + value['NOMBRE_IMAGEN'] + "'" + " alt='" + value['NOMBRE_IMAGEN'] + "'>" +
                    "<div class='card-body'>" +
                    "<h5 id='nombre_articulo' class='card-title'>" + value['NOMBRE_ARTICULO'] + "</h5>" +
                    " <p class='card-text'>" + value['DESCRIPCION'] + "</p>" +
                    "<p id='precio'><span>Precio: $</span>" + value['PRECIO'] + "</p>" +
                    "<a id='fav' href='?controlador=User&accion=mostrar_principal_ventas' onclick='agregar_favorito(this);'>Agregar/quitar fav</a>" +
                    "<input id='numero' type='number' min='1' style='width: 50px;' value='1'>" +
                    "<a id='agregar_carrito' href='javascript:;' onclick='agregar_al_carrito(this);' style='margin: 1em;' class='btn btn-primary'" +
                    "data-id='" + value['ID_ARTICULO'] + "'" +
                    " data-nombre='" + value['NOMBRE_ARTICULO'] + "'" +
                    "data-precio='" + value['PRECIO'] + "'" +
                    ">" +
                    "<img height='25px' src='/public/img/carrito.png' alt='carrito'>" +
                    "</a>" +
                    "<a href='javascript:;' onclick='mostrar_compra_modal(this);' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalCompra'>" +
                    "<img height='25px' src='/public/img/comprar.png' alt='carrito'>" +
                    "</a>" +
                    " </div>" +
                    "</div>";
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
        }

    });
    return false;
}

function mostrar_promos() {
    parametros = {
        "e": "e"
    }
    $.ajax({
        data: parametros,
        url: '?controlador=Articulo&accion=obtener_promos',
        dataType: "json",
        type: 'post',
        beforeSend: function () {

        },
        success: function (response) {
            var titulo = document.querySelector(".ofrecimiento");
            var contenido = document.getElementById("rowArticulos");
            contenido.innerHTML = "";
            titulo.innerHTML = "Promociones";
            $.each(response['promos'], function (key, value) {

                contenido.innerHTML +=
                    " <div class='card col-md-4 offset-md-2' style='width: 18rem; margin-bottom: 1em;'>" +
                    " <img class='card-img-top' height='200px' width='200' src='/public/img/" + value['nombre_imagen'] + "'" + " alt='" + value['nombre_imagen'] + "'>" +
                    "<div class='card-body'>" +
                    "<h5 id='nombre_articulo' class='card-title'>" + value['nombre_articulo'] + "</h5>" +
                    " <p class='card-text'>" + value['descripcion'] + "</p>" +
                    "<p id='precio'>$<del>$" + value['precio_regular'] + "</del><span>$</span>" + value['PRECIO_REBAJA'] + "</p>" +
                    "<p>válido hasta el: " + value['fecha_final'] + " </p>" +
                    "<a id='fav' href='javascript:;' onclick='agregar_favorito(this);'>Agregar/quitar fav</a>" +
                    "<input id='numero' type='number' min='1' style='width: 50px;' value='1'>" +
                    "<a id='agregar_carrito' href='javascript:;' onclick='agregar_al_carrito(this);' style='margin: 1em;' class='btn btn-primary'" +

                    "data-id='" + value['id_articulo'] + "'" +
                    " data-nombre='" + value['nombre_articulo'] + "'" +
                    "data-precio='" + value['PRECIO_REBAJA'] + "'" +
                    ">" +
                    "<img height='25px' src='/public/img/carrito.png' alt='carrito'>" +
                    "</a>" +
                    "<a href='javascript:;' onclick='mostrar_compra_modal(this);' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalCompra'>" +
                    "<img height='25px' src='/public/img/comprar.png' alt='comprar directo'>" +
                    "</a>" +
                    " </div>" +
                    "</div>";
                contador += 1;
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
        }

    });
    return false;
}