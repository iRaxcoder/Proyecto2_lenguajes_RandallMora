function modificar_articulo(accion) {
    var nombre = document.getElementById('nombreArticulo');
    var precio = document.getElementById('precio');
    var descripcion = document.getElementById('descripcion');
    var categoria = document.getElementById('seleccionDefecto');
    var nombreImagen = document.getElementById('imagenAct');
    var form = document.getElementById('row_modificar');
    form.style.display = 'block';
    //
    var fila = accion.parentNode.parentNode;
    nombreFila = fila.cells[1].innerText;
    precioFila = fila.cells[3].innerText;
    descripcionFila = fila.cells[4].innerText;
    categoriaFila = fila.cells[5].innerText;
    imagenFila = fila.cells[2].firstChild.innerText;

    nombre.setAttribute("value", nombreFila);
    precio.setAttribute("value", precioFila);
    descripcion.textContent = descripcionFila;
    categoria.textContent = categoriaFila;
    nombreImagen.setAttribute("value",imagenFila);
}