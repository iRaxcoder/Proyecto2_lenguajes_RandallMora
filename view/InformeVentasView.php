<?php
include_once 'headerAdminView.php';
?>



<div class="row" style="margin-top: 1em;">

    <div class="col-md-5" style="border-style: dotted; border-color: red; margin-left:1em">

        <div class="row">

            <div class="col col-md-5">

                <label for="desde">Desde</label>
                <input type="date" class="form-control" name="desde" id="desde" required>

            </div>

            <div class="col col-md-5">
                <label for="hasta">Hasta</label>
                <input type="date" class="form-control" name="hasta" id="hasta" required>
            </div>

            <div class="col col-md-2" style="position: relative; top:1.5em;">
                <button id="btnfiltro1" type="summit" onclick="buscar_venta_rango();" class="form-control btn-success">Buscar</button>
            </div>
        </div>

    </div>

    <div class="col-md-4" style="border-style: dotted; border-color: red; margin-left:1em">

        <div class="row">
            <div class="col col-md-4">

                <label for="inicio">Mes</label>
                <input type="number" class="form-control" min="1" name="mes" id="mes" placeholder="MM" required>

            </div>

            <div class="col col-md-4">

                <label for="final">Año</label>
                <input type="number" min="1" class="form-control" name="annio" id="annio" placeholder="YYYY" required>
            </div>

            <div class="col col-md-3" style="position: relative; top:1.5em;">
                <button id="btnFiltro2" type="summit" onclick="buscar_venta_mes_annio();" class="form-control btn-success">Buscar</button>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <a onclick="cargar_ventas()" href="javascript:;"> <img src="/public/img/actualizar.png" width="50px" alt="actualizar"></a>
    </div>
</div>
<!-- boton buscar -->
</form>
</div>


</div>



<table id="tablaInforme" class="table table-hover table-responsive">
    <h3 id="titulo" class="text-center" style="margin-top: 1em">Ventas</h3>
    <thead>
        <tr>
            <th scope="col">ID_venta</th>
            <th scope="col">Usuario</th>
            <th scope="col">Fecha</th>
            <th scope="col">Monto total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($vars['ventas'])) {
            foreach ($vars['ventas'] as $item) {
        ?>
                <tr>
                    <th scope="row"><?php echo $item['id_venta'] ?></th>
                    <td><?php echo $item['nombre_usuario'] ?></td>
                    <td><?php echo $item['fecha_venta'] ?></td>
                    <td>$<?php echo $item['total_venta'] ?></td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>

<script src="/public/js/admin.js"></script>