<?php 
 require_once('Imports/Global/Global.php');
?>
<!DOCTYPE html>
<!-- IDIOMA DE LA PÁGINA -->
<html lang="es">
    <head>
        <!-- BEGIN: Head -->
        <!-- CARACTERES ESPECIALES -->
        <meta charset="UTF-8">
        <!-- TÍTULO DE LA VENTANA -->
        <title>Distribuidora Illussion | Inicio</title>
        <!-- IMPORTACIONES -->
        <?php
            ImportGlobal::publicIco();
            ImportGlobal::ImportPublicMaterializeCss();
            ImportGlobal::ImportPublicMaterialIcons();
            ImportGlobal::publicStyle();
        ?>
        <!-- END: Head-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <!-- BEGIN: Navbar -->
        <header>
            <nav class="black">
                <div class="brand-sidebar black">
                    <a class="brand-logo center">
                        <img src="Imports/resources/pics/utilities/ico.png" alt="ico-illusion" height="25">
                        <span class="white-text">Illussion Party Supplies</span>
                    </a>
                </div>
            </nav>
        </header>
    <!-- END: Navbar -->

    <body>
        <!-- BEGIN: Carousel -->
        <div class="slider">
            <ul class="slides">
                <li>
                    <img src="Imports/resources/pics/carousel/O1.png">
                    <div class="caption center-align">
                    </div>
                </li>
                <li>
                    <img src="Imports/resources/pics/carousel/slider-1.jpg">
                    <div class="caption center-align">
                        <h3 class="white-text text-lighten-5">Bienvenido a la página oficial de</h3>
                        <h5 class="light grey-text text-lighten-3">Illussion Party Supplies</h5>
                    </div>
                </li>
                <li>
                    <img src="Imports/resources/pics/carousel/slider-2.jpg">
                    <div class="caption left-align">
                        <h3 class="white-text text-lighten-5">Para todo tipo de</h3>
                        <h5 class="light grey-text text-lighten-3">celebraciones</h5>
                    </div>
                </li>
                <li>
                    <img src="Imports/resources/pics/carousel/slider-3.jpg">
                    <div class="caption right-align">
                        <h3 class="black-text text-lighten-5">La mejor calidad en</h3>
                        <h5 class="black-text text-lighten-3">todos nuestros productos</h5>
                    </div>
                </li>
                <li>
                    <img src="Imports/resources/pics/carousel/slider-4.jpg">
                    <div class="caption center-align">
                        <h3 class="white-text text-lighten-5">Con la mejor atención y eficacia</h3>
                        <h5 class="light grey-text text-lighten-3">para complacer a nuestros clientes</h5>
                    </div>
                </li>
                <li>
                    <img src="Imports/resources/pics/carousel/O3.png">
                    <div class="caption center-align">
                    </div>
                </li>
                <li>
                    <img src="Imports/resources/pics/carousel/O2.png">
                    <div class="caption center-align">
                    </div>
                </li>
            </ul>
        </div>
        <!-- END: Carousel -->

        <h4 class="center">Distribuidora Illussion</h4>

        <!-- BEGIN: Acerca de -->
        <div class="row">
            <div class="col s12">
                <div class="card amber lighten-4">
                    <div class="card-content black-text">
                        <span class="card-title">Quiénes somos.</span>
                        <p>Somos una empresa que se dedica a la distribución de productos para fiestas infantiles, temáticas, cumpleaños, entre otros.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <div class="card amber lighten-4">
                    <div class="card-content black-text">
                        <span class="card-title">Nuestra visión.</span>
                        <p>Ser la distribuidora selecta salvadoreña preferida globalmente por su calidad y generación de bienestar a su entorno.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Acerca de -->

        <!-- BUTTON: Solicitud de evento. -->
        <h5 class="center">Algunos de nuestros productos</h5>
       
        <div class="row">
            <div class="center">
                <a href="requests.php" class="btn waves-effect waves-light black ">Solicitar reservación</a>
            </div>
        </div>

        <!-- BEGIN: Productos -->
        <div class="carousel">
            <a class="carousel-item" href="#one!"><img src="Imports/resources/pics/files/01.jpg"></a>
                <a class="carousel-item" href="#two!"><img src="Imports/resources/pics/files/02.jpg"></a>
                    <a class="carousel-item" href="#three!"><img src="Imports/resources/pics/files/03.jpg"></a>
                        <a class="carousel-item" href="#four!"><img src="Imports/resources/pics/files/04.jpg"></a>
                            <a class="carousel-item" href="#five!"><img src="Imports/resources/pics/files/05.jpg"></a>
                        <a class="carousel-item" href="#six!"><img src="Imports/resources/pics/files/06.jpg"></a>
                    <a class="carousel-item" href="#seven!"><img src="Imports/resources/pics/files/07.jpg"></a>
                <a class="carousel-item" href="#eight!"><img src="Imports/resources/pics/files/08.jpg"></a>
            <a class="carousel-item" href="#nine!"><img src="Imports/resources/pics/files/09.jpg"></a>
        </div>
        <!-- END: Productos -->

        <!-- BEGIN: Footer -->
            <footer class="page-footer grey darken-4">
                <div class="container">
                    <div class="row">
                        <div class="col 16 s12">
                            <h5 class="white-text">Distribuidora Illussion</h5>
                            <p class="grey-text text-lighten-4">Todo tipo de decoración y accesorios para fiestas y eventos.</p>
                        </div>
                        <div class="col l4 offset-l2 s12">
                            <h5 class="white-text">¡Contáctanos!</h5>
                            <ul>
                                <li><a class="grey-text text-lighten-3" href="https://www.facebook.com/distribuidora.illussion">Facebook</a></li>
                                <li><a class="grey-text text-lighten-3" href="https://www.instagram.com/">Instagram</a></li>
                                <li><a class="grey-text text-lighten-3" href="https://www.twitter.com/">Twitter</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-copyright black">
                    <div class="container">
                    © 2014 Copyright Illussion Party Supplies
                    <a class="grey-text text-lighten-4 right">Todos los derechos reservados</a>
                    </div>
                </div>
            </footer>
        <!-- END: Footer -->

        <!-- SCRIPTS -->
        <?php
            ImportGlobal::ImportPublicJQuery();
            ImportGlobal::ImportPublicMaterializeJS();
            ImportGlobal::ImportPublicInits();
        ?>
    </body>
</html>