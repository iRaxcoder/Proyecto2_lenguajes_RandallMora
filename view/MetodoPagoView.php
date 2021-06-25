<?php
include_once './public/header.php';
?>

<script src="/public/js/user.js"></script>

<div class="row">

    <h2 style="margin-bottom: 2em; margin-left:1em">
        <a href="?controlador=User&accion=mostrar_principal_ventas"><img width="50px" src="/public/img/volver.png" alt="volver"></a>
        Método de pago</h1>
        <div class="col col-md-3 offset-md-1">
            <h4 class="text-center" style="border-bottom: #F57333 3px solid">Registrar método</h4>
            <form action="?controlador=user&accion=registrar_metodo_pago" method="post">
                <div class="form-group">
                    <label for="propietario">Nombre completo asociado (propietario)</label>
                    <input name="propietario" type="text" class="form-control" id="propietario" aria-describedby="nombre_p" required>
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input name="direccion" type="text" class="form-control" id="direccion" aria-describedby="direccion" required>
                </div>
                <div class="form-group">
                    <label for="numero_tarjeta">Número de tarjeta</label>
                    <input name="numero_tarjeta" type="number" min="1" class="form-control" id="numero_tarjeta" aria-describedby="numero_t" required>
                    <small id="numero_t" class="form-text text-muted">No vamos a compartir esta información.</small>
                </div>
                <div class="form-group">
                    <label for="fecha_vencimiento">Fecha de vencimiento</label>
                    <input name="fecha_vencimiento" type="date" class="form-control" id="fecha_vencimiento" required>
                </div>
                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input name="cvv" type="number" min="1" class="form-control" id="cvv" required>
                </div>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </form>
        </div>

        <div class="col col-md-3 offset-md-4">

            <ul class="list-group">

                <h4 class="text-center" style="border-bottom: #F57333 3px solid">Métodos de pago registrados</h4>

                <?php
                if (isset($vars['metodos'])) {
                    foreach ($vars['metodos'] as $item) {
                ?>
                        <li class="list-group-item text-left mx-2" style="margin-bottom: 1em;">
                            <p>Propietario: <?php echo $item['propietario_tarjeta'] ?></p>
                            <p>NÚMERO: <?php echo $item['numero_tarjeta'] ?></p>
                            <p>F.VENCIMIENTO: <?php echo $item['fecha_vencimiento'] ?></p>
                            <p>DIRECCIÓN: <?php echo $item['direccion'] ?></p>
                            <a data-id="<?php echo $item['id_tarjeta_credito'] ?>" href="?controlador=User&accion=mostrar_metodos_pago_view" onclick="borrar_metodo(this)">
                            <img src="/public/img/borrar.png" width="25px" alt="quitar"></a>
                        </li>
                <?php
                    }
                }
                ?>

            </ul>

        </div>


</div>



<div class="row text-center">





</div>

















<?php
include_once './public/footer.php';
?>