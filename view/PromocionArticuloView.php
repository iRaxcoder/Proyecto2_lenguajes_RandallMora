<?php
include_once '../public/headerAdmin.php';
?>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            <th scope="col">Descripcion</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
        </tr>
    </tbody>
</table>

<div class="row text-center">

    <div class="col-md-12">

        <form method="post">

            <div class="row">
                <div class=" col-md-12 register-form-header">
                    <p class="register-form-font-header">Promocion de articulos <span>ArtiMax</span>
                    </p>
                </div>
            </div>
            <!-- fecha inicio -->
            <div class="row">
                <div class="col-md-12">
                <label for="inicio">Fecha inicial</label>
                    <input type="date" name="fecha inicial">
                </div>
            </div>
             <!-- fecha final -->
             <div class="row">
                <div class="col-md-12">
                <label for="final">Fecha final</label>
                    <input type="date" name="fecha final">
                </div>
            </div>
            <!-- id -->
            <div class="row">
                <div class="col-md-12">
                    <input type="id" id="id" name="id" placeholder="id articulo" required>
                </div>
            </div>
            <!-- precio promo -->
            <div class="row">
                <div class="col-md-12">
                    <input type="precio" id="precio" name="precio" placeholder="precio promo" required>
                </div>
            </div>
            
            <!-- boton registrar -->
            <div class="row">
                <div class="col-md-12 register-row">
                    <button onclick="registrar_usuario($('#usuario2').val(),2,$('#edad').val(),
                $('#direccion').val(),$('#genero').val(),$('#contrasenniaR').val()); return false;" class="btn btn-primary">Aplicar</button>
                </div>
            </div>
        </form>
    </div>


</div>