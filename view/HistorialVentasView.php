<?php
include_once './public/header.php';
?>

<a href="?controlador=User&accion=mostrar_principal_ventas"><img width="50px" src="/public/img/volver.png" alt="volver"></a>
<h3 id="titulo" class="text-center" style="margin-top: 1em; margin-left: 4em;">Compras realizadas</h3>

<div class="row ">
    <div class="col-md-5 offset-md-4" >

        <table id="tablaInforme" class="table table-hover table-responsive" >

            <thead>
                <tr>
                    <th scope="col">ID_venta</th>
                    <th scope="col">Articulo</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Subtotal</th>

                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($vars['ventas'])) {
                    foreach ($vars['ventas'] as $item) {
                ?>
                        <tr>
                            <th scope="row"><?php echo $item['ID_VENTA'] ?></th>
                            <td><?php echo $item['nombre_articulo'] ?></td>
                            <td><?php echo $item['CANTIDAD'] ?></td>
                            <td>$<?php echo $item['precio'] ?></td>
                            <td><?php echo $item['fecha_venta'] ?></td>
                            <td><?php echo $item['SUB_TOTAL'] ?></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>

    </div>

</div>


<?php
include_once './public/footer.php';
?>