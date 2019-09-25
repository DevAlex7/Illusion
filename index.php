<?php 
 require_once('Imports/Global/Global.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Illussion Party Supplies </title>
    <?php
        
        ImportGlobal::ImportFont();
        ImportGlobal::ImportPublicMaterializeCss();
        ImportGlobal::ImportPublicMaterialIcons();
        ImportGlobal::ImportAnimateCSS();
        ImportGlobal::ImportPublicFileCss('public-site');
    ?>
</head>
<body>
    <nav class="transparent">
        <div class="nav-wrapper">
            <ul>
                <li>
                    <a href="" class="middle black-text"> <i class="material-icons left">near_me</i> Iniciar sesión</a>
                </li>
                <li>
                    <a href="" class="middle black-text"> <i class="material-icons left">supervisor_account</i> Registrarme</a>
                </li>
                <li>
                    <a href="" class="middle black-text"> <i class="material-icons left">call</i> Contactanos</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="row" id="image-principal">
        <div class="col s12 m6">
            <div class="center">
                <span class="website-title">¡Bienvenido!</span>
                <p>Estamos para hacer que tus eventos sean los mejores. ¡Unete a nosotros!</p>
            </div>
        </div>
        <div class="col s12 m5">
            <div class="center">
                <div class="card">
                    <div class="card-image">
                        <img src="Imports/resources/pics/carousel/O1.png" alt="" srcset="" class="animated fadeIn">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="slider">
            <ul class="slides">
            <li>
                <img src="Imports/resources/pics/utilities/ballons3.jpg"> 
                <div class="caption center-align">
                <h3 class="black-text">Somos Illusion party</h3>
                <h5 class="light black-text text-lighten-3"> <div class="chip white-text" id="chip-slider1">Organiza tus eventos con nosotros</div> </h5>
                </div>
            </li>
            <li>
                <img src="Imports/resources/pics/utilities/ballons5.jpg"> <!-- random image -->
                <div class="caption right-align">
                <h3 class="black-text">Clientes felices</h3>
                <h5 class="black-text text-lighten-3"> <div class="chip white">Nuestra prioridad es la comodidad de tus invitados</div> </h5>
                </div>
            </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="center">
            <span class="website-service">Nuestra empresa </span>
        </div>
        <div class="row">
            <div class="col s12 m6" id="content-information">
                <div class="center">
                    <span> <div class="chip white-text" id="chip-information">Compromiso</div> </span>
                </div>
                <div class="row" id="objectives">
                    <div class="col s12 m6 offset-m3">
                        <div class="card">
                            <div class="card-content">
                                <div class="center">
                                    <i class="material-icons">done_all</i>
                                </div>             
                                <span class="black-text"> Nuestro equipo es comprometido en tus eventos, bastantes serviciales y puntuales </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m6" id="content-information">
                <div class="center">
                <span> <div class="chip white-text" id="chip-information">Accesibles</div> </span>
                    <div class="row" id="objectives">
                        <div class="col s12 m6 offset-m3">
                            <div class="card">
                                <div class="card-content">
                                    <div class="center">
                                        <i class="material-icons">emoji_people</i>
                                    </div>
                                    <span class="black-text">Si tu solicitas un producto, nosotros nos encargaremos de buscarlo por ti y agregarlo a tu evento</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m6" id="content-information">
                <div class="center">
                <span> <div class="chip white-text" id="chip-information"> Cercanos </div> </span>
                    <div class="row" id="objectives">
                        <div class="col s12 m6 offset-m3">
                            <div class="card">
                                <div class="card-content">
                                    <div class="center">
                                        <i class="material-icons">supervised_user_circle</i>
                                    </div>
                                    <span class="black-text">Hemos adquirido la manera de que puedas solicitar tu evento de la manera más facil y sencilla con nuestra plataforma</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m6" id="content-information">
                <div class="center">
                <span> <div class="chip white-text" id="chip-information"> Organizacion </div> </span>
                    <div class="row" id="objectives">
                        <div class="col s12 m6 offset-m3">
                            <div class="card">
                                <div class="card-content">
                                    <div class="center">
                                        <i class="material-icons">post_add</i>
                                    </div>
                                    <span>Nosotros como empresa sabemos que los eventos pueden ser grandes y robustos, pero hemos mejorado en ser detallistas con nuestros clientes.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        ImportGlobal::ImportPublicJQuery();
        ImportGlobal::ImportPublicMaterializeJS();
        ImportGlobal::ImportPublicControllerJs('Home');
    ?>
</body>
</html>