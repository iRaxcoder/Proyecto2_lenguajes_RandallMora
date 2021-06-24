let carrito;
let total;
let DOMtotal;
let DOMcarrito;
let usuario;

function principal() {
    carrito = [];
    total = 0.00;
    DOMtotal = document.querySelector('#total');
    DOMcarrito = document.querySelector('#carritoC');
    usuario = document.getElementById("n_usuario").textContent;
}

function create_articulo(id, nombre, precio, cantidad) {
    this.id = id;
    this.nombre = nombre;
    this.precio = precio;
    this.cantidad = cantidad;
}

function agregar_al_carrito(boton) {

    id_articulo = boton.id;
    nodoAux = boton;
    //buscar cantidad

    while (nodoAux.tagName != 'INPUT') {
        nodoAux = nodoAux.previousSibling;
    }
    var cantidad = nodoAux.value;
    var precio = "";
    //buscar precio

    while (nodoAux.id != 'precio') {
        nodoAux = nodoAux.previousSibling
    }
    var hijos = nodoAux.childNodes;
    var i = 0;
    while (hijos[i].tagName != 'SPAN') {
        i++;
    }
    precio = hijos[i].nextSibling.textContent;

    //buscar nombre

    while (nodoAux.id != "nombre_articulo") {
        nodoAux = nodoAux.previousSibling;
    }
    var nombre = nodoAux.textContent;

    alert(id_articulo+" "+nombre+ " "+precio+" "+cantidad);

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
    DOMtotal.textContent = "total: $" + total.toFixed(5);
}

function agregar_articulo() {
    DOMcarrito.textContent = '';

    carrito.forEach((item) => {
        const miNodo = document.createElement('li');
        miNodo.classList.add('list-group-item', 'text-right', 'mx-2');
        miNodo.textContent = `${item.cantidad} x ${item.nombre} - ${item.precio}$`;
        //
        const miBoton = document.createElement('button');
        miBoton.classList.add('btn', 'btn-danger', 'mx-5');
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