<?php
include_once './public/header.php';
?>



<div class=”row” style="margin: 1em; align-items: stretch; display:flex;">
    <div class="col-md-2">
        <nav class="navbar bg-light ">
            <ul class="nav navbar-nav">
                <form method="post" class="form-inline" style="justify-content: right;">
                    <input class="form-control mr-sm-2" style="justify-content: right;" type="search" placeholder="Articulo" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar articulo</button>
                </form>
                <h5>Categorias</h3>
                    <li class="nav-item">
                        <a class="nav-link" href="#"> Ver todos </a>
                    </li>
                    <?php
                    if (isset($vars['categorias'])) {
                        foreach ($vars['categorias'] as $item) {
                    ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> <?php echo $item['nombre_categoria']  ?> </a>
                            </li>

                    <?php
                        }
                    }
                    ?>
            </ul>
        </nav>
    </div>
    <div class=" text-center clear-fix col-md-8">
        <h2>Promociones</h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut, accusantium voluptatibus a quia veritatis delectus ipsam debitis, ratione, vel cumque pariatur ducimus aut? Porro dicta veritatis doloribus assumenda qui non?</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut, accusantium voluptatibus a quia veritatis delectus ipsam debitis, ratione, vel cumque pariatur ducimus aut? Porro dicta veritatis doloribus assumenda qui non?</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut, accusantium voluptatibus a quia veritatis delectus ipsam debitis, ratione, vel cumque pariatur ducimus aut? Porro dicta veritatis doloribus assumenda qui non?</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut, accusantium voluptatibus a quia veritatis delectus ipsam debitis, ratione, vel cumque pariatur ducimus aut? Porro dicta veritatis doloribus assumenda qui non?</p>
    </div>
    <div class="text-center clear-fix col-md-2">
        <h2>Carrito</h2>
    </div>
</div>