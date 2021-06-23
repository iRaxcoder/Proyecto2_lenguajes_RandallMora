let carrito = []

function agregar_al_carrito(boton) {
    id_articulo = boton.id;
    nodoAux = boton;
    //buscar cantidad

    while (nodoAux.tagName != 'INPUT') {
        nodoAux = nodoAux.previousSibling;
    }
    cantidad_articulos = nodoAux.value;
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


    //alert(nodoAux.previousSibling.previousSibling.previousSibling.previousSibling.childNodes[2].nextSibling.nextSibling.textContent);
    //alert(precio);



}