let carrito;
let total;
let DOMtotal;
let DOMcarrito;
let ultimo_articulo;

function principal() {
    carrito = [];
    total = 0.00;
    ultimo_articulo = -1;
    DOMtotal = document.querySelector('#total');
    DOMcarrito = document.querySelector('#carritoC');
}

function create_articulo(id, precio, cantidad) {
    this.id = id;
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

    //crea el objeto y hace push
    var articulo = new create_articulo(id_articulo, precio, cantidad);

    if (verificar_duplicado(articulo) == false) {
        carrito.push(articulo);
        ultimo_articulo++;
        alert("ingresa");
    }
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
    DOMtotal.textContent = "total: $" + total.toFixed(3);
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
    // Borramos todos los productos
    carrito = carrito.filter((item) => {
        return item.id !== id;
    });
    // volvemos a renderizar
    agregar_articulo();
    // Calculamos de nuevo el precio
    sumar_total();
}

function verificar_duplicado(articulo) {
    var bool_result = false;
    carrito.forEach((item) => {
        if (item.id == articulo.id) {
            item.cantidad = (parseInt(item.cantidad) + parseInt(articulo.cantidad));
            alert("entra");
            bool_result = true;
        }
    });
    return bool_result;
}