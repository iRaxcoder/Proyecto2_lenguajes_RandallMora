<?php
include_once 'headerAdminView.php';
?>


<div class="row" style="margin-top: 1em;">

    <div class="col-md-5">

        <div class="row">

            <div class="col col-md-5">

                <form method="post" action="?controlador=Articulo&accion=insertar_categoria">

                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" name="nombre_categoria" id="nombre_categoria" required>
                    </div>
                    <!-- boton registrar -->
                    <div class="form-group">
                        <button class="btn btn-primary">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row ">
    <div class="col-md-5 offset-md-4">

        <table id="tablaInforme" class="table table-hover table-responsive">

            <thead>
                <tr>
                    <th scope="col">ID_venta</th>
                    <th scope="col">Articulo</th>

                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($vars['categorias'])) {
                    foreach ($vars['categorias'] as $item) {
                ?>
                        <tr>
                            <th scope="row"><?php echo $item['id_categoria'] ?></th>
                            <td><?php echo $item['nombre_categoria'] ?></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>

    </div>

</div>