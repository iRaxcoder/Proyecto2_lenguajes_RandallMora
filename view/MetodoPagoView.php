<?php
include_once './public/header.php';
?>

<div class="row">

    <h2 style="margin-bottom: 2em; margin-left:1em">
        <a href="?controlador=User&accion=mostrar_principal_ventas"><img width="50px" src="/public/img/volver.png" alt="volver"></a>
        Método de pago</h1>

        <div class="col col-md-3 offset-md-1">
            <h4 class="text-center" style="border-bottom: #F57333 3px solid">Registrar método</h4>
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Número de tarjeta</label>
                    <input type="number" min="1" class="form-control" id="numero_tarjeta" aria-describedby="numero_t">
                    <small id="numero_t" class="form-text text-muted">No vamos a compartir esta información.</small>
                </div>
                <div class="form-group">
                    <label for="fecha_vencimiento">Fecha de vencimiento</label>
                    <input type="date" class="form-control" id="fecha_vencimiento">
                </div>
                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="number" min="1" class="form-control" id="cvv">
                </div>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </form>

        </div>

        <div class="col col-md-3 offset-md-4">

            <ul class="list-group">

                <h4 class="text-center" style="border-bottom: #F57333 3px solid">Métodos de pago registrados</h4>

                <li class="list-group-item text-left mx-2" style="margin-bottom: 1em;">Numero tarjeta cvv fechaven
                    <a href=""><img src="/public/img/borrar.png" width="25px" alt="quitar"></a>
                </li>
                <li style="margin-bottom: 1em;" class="list-group-item text-left mx-2">jajaja</li>
            </ul>

        </div>


</div>



<div class="row text-center">





</div>

















<?php
include_once './public/footer.php';
?>