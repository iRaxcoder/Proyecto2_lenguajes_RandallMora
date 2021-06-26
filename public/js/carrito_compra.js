var carrito = [];
var total;
var DOMtotal;
var DOMcarrito;
var DOMfavorito;
var usuario;
var articulo_compra;
var totalDirecto;
var id_venta;
var tarjeta_id;

function principal() {
    carrito = [];
    total = 0.00;
    id_venta = 0;
    totalDirecto = 0.00;
    DOMtotal = document.querySelector('#total');
    DOMcarrito = document.querySelector('#carritoC');
    usuario = document.getElementById("n_usuario").textContent;
    DOMfavorito = document.getElementById("fav");
    //
    llenar_carrito_bd();
}

function create_articulo(id, nombre, precio, cantidad) {

    this.id = id;
    this.nombre = nombre;
    this.precio = precio;
    this.cantidad = cantidad;
    this.subtotal = (parseFloat(precio) * parseFloat(cantidad)).toFixed(5);
}

function agregar_al_carrito(boton) {

    nodoAux = boton;
    //buscar cantidad

    while (nodoAux.tagName != 'INPUT') {
        nodoAux = nodoAux.previousSibling;
    }
    var cantidad = nodoAux.value;
    var precio = boton.dataset.precio;
    var id_articulo = boton.dataset.id;
    var nombre = boton.dataset.nombre;



    //crea el objeto y hace push
    var articulo = new create_articulo(id_articulo, nombre, precio, cantidad);

    if (verificar_duplicado(articulo) == false) {
        //push al local sin duplicar
        carrito.push(articulo);
        //indice
    }
    //despues en la base de datos
    agregar_carrito_bd(articulo);
    sumar_total();
    agregar_articulo();
}

function sumar_total() { //funciona
    total = 0.00;
    // recorre el carrito y vuelve a calcular el total
    carrito.forEach((item) => {
        // De cada elemento obtenemos su precio
        total = total + (parseFloat(item.precio) * parseFloat(item.cantidad));
    });
    // muestra con HTML
    DOMtotal.textContent = "Total: $" + total.toFixed(5);
}

function agregar_articulo() {
    DOMcarrito.textContent = '';

    carrito.forEach((item) => {
        const miNodo = document.createElement('li');
        miNodo.classList.add('list-group-item', 'text-left', 'mx-1');
        miNodo.textContent = `${item.cantidad} x ${item.nombre} - ${parseFloat(item.precio).toFixed(2)}$`;
        miNodo.style.marginbottom = '1em';
        //
        const miBoton = document.createElement('button');
        miBoton.classList.add('btn', 'btn-danger', 'mx-4');
        miBoton.textContent = 'X';
        miBoton.width = 2;
        miBoton.height = 2;
        miBoton.style.marginLeft = '1rem';
        miBoton.dataset.item = item.id;
        miBoton.addEventListener('click', quitar_articulo);
        //
        miNodo.appendChild(miBoton);
        DOMcarrito.appendChild(miNodo);
    });
}

function quitar_articulo(evento) {
    const id = evento.target.dataset.item;
    // Borra el del id
    carrito = carrito.filter((item) => {
        return item.id !== id;
    });
    //borra en bd
    quitar_del_carrito_bd(id);
    // vuelve a cargar
    agregar_articulo();
    // Calcula total
    sumar_total();
}

function verificar_duplicado(articulo) {
    var bool_result = false;
    carrito.forEach((item) => {
        if (item.id == articulo.id) {
            item.cantidad = (parseInt(item.cantidad) + parseInt(articulo.cantidad));
            bool_result = true;
        }
    });
    return bool_result;
}

function vaciar_carrito() {
    //local
    carrito = [];
    //bd
    vaciar_carrito_bd();
    //
    agregar_articulo();
    sumar_total();
}


function agregar_carrito_bd(articulo) {
    var parametros = {
        "nombre_usuario": usuario,
        "id_articulo": articulo.id,
        "cantidad": articulo.cantidad
    };
    $.ajax({
        data: parametros,
        url: '?controlador=Articulo&accion=agregar_al_carrito',
        dataType: "text",
        type: 'post',
        beforeSend: function () {

        },
        success: function (response) {

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
        }

    });
    return false;
}

function quitar_del_carrito_bd(id) {
    var parametros = {
        "nombre_usuario": usuario,
        "id_articulo": id,
    };
    $.ajax({
        data: parametros,
        url: '?controlador=Articulo&accion=quitar_del_carrito',
        dataType: "text",
        type: 'post',
        beforeSend: function () {

        },
        success: function (response) {

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
        }

    });
    return false;
}

function vaciar_carrito_bd() {
    var parametros = {
        "nombre_usuario": usuario,
    };
    $.ajax({
        data: parametros,
        url: '?controlador=Articulo&accion=vaciar_carrito',
        dataType: "text",
        type: 'post',
        beforeSend: function () {

        },
        success: function (response) {

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
        }

    });
    return false;
}


function llenar_carrito_bd() {
    var parametros = {
        "nombre_usuario": usuario,
    };
    $.ajax({
        data: parametros,
        url: '?controlador=Articulo&accion=mostrar_carrito',
        dataType: "json",
        type: 'post',
        beforeSend: function () {

        },
        success: function (response) {
            $.each(response['carrito'], function (key, value) {
                var articuloAux = {
                    id: value['id_articulo'],
                    nombre: value['nombre_articulo'],
                    precio: value['precio'],
                    cantidad: value['cantidad'],
                    subtotal: (parseFloat(value['precio']) * parseFloat(value['cantidad'])).toFixed(5)
                };
                carrito.push(articuloAux);
            });
            sumar_total();
            agregar_articulo();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
        }

    });

    return false;
}


function agregar_favorito(ref) {
    //buscar nombre_articulo

    nodoAux = ref.nextSibling;

    while (nodoAux.id != 'agregar_carrito') {
        nodoAux = nodoAux.nextSibling;
    }

    var nombre_d_articulo = nodoAux.dataset.nombre;

    var parametros = {
        "nombre_usuario": usuario,
        "n_articulo": nombre_d_articulo
    };
    $.ajax({
        data: parametros,
        url: '?controlador=Articulo&accion=agregar_favorito',
        dataType: "text",
        type: 'post',
        beforeSend: function () {

        },
        success: function (response) {},
        error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
        }

    });
    return false;


}

function mostrar_carrito_modal() {
    if (carrito.length != 0) {
        var DOMcarritoModal = document.getElementById('carritoModal');
        var DOMTotal = document.getElementById('totalModal');
        DOMTotal.textContent = "Total: $" + total.toFixed(5)

        DOMcarritoModal.textContent = '';
        DOMcarritoModal.dataset.seleccion = 'carrito';

        carrito.forEach((item) => {
            const miNodo = document.createElement('li');
            miNodo.classList.add('list-group-item', 'text-left', 'mx-1');
            miNodo.textContent = `${item.cantidad} x ${item.nombre} - ${parseFloat(item.precio).toFixed(2)}$`;
            miNodo.style.marginbottom = '1em';
            //
            DOMcarritoModal.appendChild(miNodo);
        });
        abrir_modal();
    } else {
        alert("No hay artículos que verificar");
    }
}

function mostrar_compra_modal(elemento) {

    nodoAux = elemento;
    //buscar info del articulo

    while (nodoAux.id != 'agregar_carrito') {
        nodoAux = nodoAux.previousSibling;
    }

    var precio = nodoAux.dataset.precio;
    var nombre = nodoAux.dataset.nombre;
    var id = nodoAux.dataset.id;


    while (nodoAux.tagName != 'INPUT') {
        nodoAux = nodoAux.previousSibling;
    }
    var cantidad = nodoAux.value;
    var totalArt = (parseFloat(precio) * parseFloat(cantidad)).toFixed(2);
    totalDirecto = totalArt;
    //configura el carrito

    var DOMcarritoModal = document.getElementById('carritoModal');
    DOMcarritoModal.textContent = '';
    DOMcarritoModal.dataset.seleccion = 'directa';

    //actualiza el articulo actual a comprar

    articulo_compra = {
        "id": id,
        "cantidad": cantidad,
        "subtotal": totalArt
    }

    // construye y agrega nodo

    const miNodo = document.createElement('li');
    miNodo.classList.add('list-group-item', 'text-left', 'mx-1');
    miNodo.textContent = `${cantidad} x ${nombre} - ${parseFloat(precio).toFixed(2)}$`;
    miNodo.style.marginbottom = '1em';
    //
    DOMcarritoModal.appendChild(miNodo);

    var DOMTotal = document.getElementById('totalModal');
    DOMTotal.textContent = "Total: $" + totalArt;
}

function realizar_pago_directo(select) {
    var DOMcarritoModal = document.getElementById('carritoModal');
    tarjeta_id = select;
    id_venta = registrar_venta();
    if (DOMcarritoModal.dataset.seleccion == 'carrito') {

        carrito.forEach((item) => {
            registrar_compra_articulo(item);
        });

        vaciar_carrito();

    } else if (DOMcarritoModal.dataset.seleccion == 'directa') {
        //se registra la venta y se obtiene el id de la venta.
        registrar_compra_articulo(articulo_compra);
        //registrar compra del articulo

        //alert(articulo_compra.cantidad);
    }
    alert("ARTIMAX dice \n\n Gracias por apoyarnos con su compra.")
    cerrar_modal();
}



function registrar_venta() {
    var total_t = 0.00;
    var id_venta_aux;
    if (totalDirecto == 0.00) {
        total_t = total;
    } else {
        total_t = totalDirecto;
    }

    var parametros = {
        "total": total_t
    };
    $.ajax({
        data: parametros,
        url: '?controlador=Venta&accion=registrar_venta',
        dataType: "text",
        type: 'post',
        async: false,
        beforeSend: function () {

        },
        success: function (response) {
            id_venta_aux = parseInt(response);
            //reinicia total compra individual
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
        }
    });
    return id_venta_aux;
}

function registrar_compra_articulo(articuloCompra) {
    var parametros = {
        "id_articulo": articuloCompra.id,
        "id_venta": id_venta,
        "id_tarjeta": tarjeta_id,
        "cantidad": articuloCompra.cantidad,
        "subtotal": articuloCompra.subtotal
    };

    $.ajax({
        data: parametros,
        url: '?controlador=Venta&accion=registrar_compra_articulo',
        dataType: "text",
        type: 'post',
        beforeSend: function () {

        },
        success: function (response) {

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
        }

    });
    return false;
}

function abrir_modal() {
    $("#modalCompra").modal("show");
}

function cerrar_modal() {
    $("#modalCompra").modal('hide');
    $('body').removeClass('modal-open');
    $('.modal-backdrop').remove();
}

