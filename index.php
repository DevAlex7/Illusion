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
        <div class="col s12 m6 offset-m3">
            <div class="card">
                <div class="card-image">
                    <img src="Imports/resources/pics/carousel/O1.png" alt="" srcset="" class="animated fadeIn">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m4">
            <div class="card" id="test">
                <div class="card-content">
                    <div class="center">
                        <span class="card-title">¿Quienes somos?</span>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="card" id="test">
                <div class="card-content">
                    <div class="center">
                        <span class="card-title">¿Quienes somos?</span>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="card" id="test">
                <div class="card-content">
                    <div class="center">
                        <span class="card-title">¿Quienes somos?</span>
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