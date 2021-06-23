function modificar_articulo(accion) {
    var nombre = document.getElementById('nombreArticulo');
    var precio = document.getElementById('precio');
    var descripcion = document.getElementById('descripcion');
    var categoria = document.getElementById('seleccionDefecto');
    var nombreImagen = document.getElementById('ImagenAct');
    var form = document.getElementById('row_modificar');
    var id = document.getElementById('id_articulo');
    form.style.display = 'block';
    //
    var fila = accion.parentNode.parentNode;
    id_articulo = fila.cells[0].innerText;
    nombreFila = fila.cells[1].innerText;
    precioFila = fila.cells[3].innerText;
    descripcionFila = fila.cells[4].innerText;
    categoriaFila = fila.cells[5].innerText;
    imagenFila = fila.cells[2].childNodes;

    nombre.setAttribute("value", nombreFila);
    precio.setAttribute("value", precioFila);
    descripcion.textContent = descripcionFila;
    categoria.textContent = categoriaFila;
    id.setAttribute("value", id_articulo);
    nombreImagen.setAttribute("value", imagenFila[1].innerText);
}

function borrar_articulo(accion) {
    var fila = accion.parentNode.parentNode;
    id_articulo = fila.cells[0].innerText;
    var tablaArt = $('#tablaArt');


    var parametros = {
        "id": id_articulo
    };
    $.ajax({
        data: parametros,
        url: '?controlador=Admin&accion=borrar_articulo',
        dataType: "json",
        type: 'post',
        beforeSend: function () {

        },
        success: function (response) {

            $("#tablaArt > tbody").empty();
            $.each(response['articulos'], function (key, value) {
                tablaArt.append(
                    "<tr> <th scope='row'>" + value['ID_ARTICULO'] + "</th>" +
                    "<td>" + value['NOMBRE_ARTICULO'] + " </td>" +
                    "<td><p id='nombreImagen' style='display: none;'></p>" +
                    "<img width='30px' src='/public/img/" + value['NOMBRE_IMAGEN'] + "' alt='imagenArticulo'></img></td>" +
                    "<td>" + value['PRECIO'] + "</td>" +
                    "<td>" + value['DESCRIPCION'] + "</td>" +
                    "<td>" + value['nombre_categoria'] + "</td>" +
                    "<td>" +
                    "<a href='javascript:;' onclick='modificar_articulo(this);return false;'" +
                    "class='text-primary'><img width='30px' src='/public/img/editar.png' alt='editar'></a> |" +
                    "<a href='javascript:;' onclick='borrar_articulo(this); return false;'" +
                    "class='text-danger'><img width='30px' src='/public/img/borrar.png' alt='borrar'></a>" +
                    "</tr>"
                );
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {

            alert(textStatus);
        }
    });
    return false;
}

function buscar_por_filtro(buscar) {
    var filtro = buscar.split("-");
    var tablaArt = $('#tablaArt');
    var url_temp = "?controlador=Admin&accion=obtener_articulo_por_nombre";

    switch (filtro[0]) {
        case 'c':
            url_temp = "?controlador=Admin&accion=obtener_articulo_por_categoria";
            break;

        case 'i':
            url_temp = "?controlador=Admin&accion=obtener_articulo_por_id";
            break;

        case 'n':
            url_temp = "?controlador=Admin&accion=obtener_articulo_por_nombre";
            break;
    }

    var parametros = {
        "tipo": filtro[1]
    };
    $.ajax({
        data: parametros,
        url: url_temp,
        dataType: "json",
        type: 'post',
        beforeSend: function () {

        },
        success: function (response) {

            $("#tablaArt > tbody").empty();
            $.each(response['resultado'], function (key, value) {
                tablaArt.append(
                    "<tr> <th scope='row'>" + value['ID_ARTICULO'] + "</th>" +
                    "<td>" + value['NOMBRE_ARTICULO'] + " </td>" +
                    "<td><p id='nombreImagen' style='display: none;'></p>" +
                    "<img width='30px' src='/public/img/" + value['NOMBRE_IMAGEN'] + "' alt='imagenArticulo'></img></td>" +
                    "<td>" + value['PRECIO'] + "</td>" +
                    "<td>" + value['DESCRIPCION'] + "</td>" +
                    "<td>" + value['nombre_categoria'] + "</td>" +
                    "<td>" +
                    "<a href='javascript:;' onclick='modificar_articulo(this);return false;'" +
                    "class='text-primary'><img width='30px' src='/public/img/editar.png' alt='editar'></a> |" +
                    "<a href='javascript:;' onclick='borrar_articulo(this); return false;'" +
                    "class='text-danger'><img width='30px' src='/public/img/borrar.png' alt='borrar'></a>" +
                    "</tr>"
                );
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {

            alert(textStatus);
        }
    });
    return false;
}