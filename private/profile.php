<?php
require_once('../Imports/Global/Global.php');
require_once('../Helpers/Dashboard.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Illusion | Solicitudes </title>
    <?php
    ImportGlobal::ImportMaterializeCss();
    ImportGlobal::ImportMaterialIcons();
    ImportGlobal::ImportIco();
    ImportGlobal::ImportSidenavCss('sidenav');
    ImportGlobal::ImportFileCss('profile');
    ImportGlobal::ImportFont();
    ?>
</head>

<body>
    <header>
        <?php AdminSideNav::SideNav(); ?>
    </header>
    <main>
        <div class="row">
            <div class="col s12 m6">
                <div class="card" id="card-informationProfile">
                    <div class="card-content">
                        <span class="card-title" id="titlepersonal">Información personal</span>
                        <div id="informationProfile">
                            <div class="row">
                                <div class="left col s12 m12" id="name-div-info">
                                    <p class="white-text"><b>Nombre</b></p>
                                    <div id="userpart">
                                        <i class="material-icons left">person</i>
                                        <div id="user-div-name">
                                        </div>
                                    </div>
                                </div>
                                <div class="left col s12 m12" id="lastname-div-info">
                                    <p class="white-text"><b>Apellido</b></p>
                                    <div id="userpart">
                                        <i class="material-icons left">person</i>
                                        <div id="user-div-lastname">
                                        </div>
                                    </div>
                                </div>
                                <div class="left col s12 m12" id="email-div-info">
                                    <p class="white-text"><b>Email</b></p>
                                    <div id="userpart">
                                        <i class="material-icons left">mail</i>
                                        <div id="user-div-email">
                                            <span id="email-user">Usuario</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="left col s12 m12" id="username-div-info">
                                    <p class="white-text"><b>Usuario</b></p>
                                    <div id="userpart">
                                        <i class="material-icons left">verified_user</i>
                                        <div id="user-div-username">
                                            <span id="username-user">Usuario</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="center" id="buttonsControl">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card" id="card-informationProfile">
                    <div class="card-content">
                        <span class="card-title" id="titlepersonal">Cambiar mi contraseña</span>
                        <div id="informationProfile">
                            <div class="row">
                                <div class="left col s12 m12" id="actpass-div-info">
                                    <p class="white-text"><b>Contraseña actual</b></p>
                                    <div id="userpart">
                                        <i class="material-icons left">lock</i>
                                        <div id="user-div-actpass">
                                        </div>
                                    </div>
                                </div>
                                <div class="left col s12 m12" id="repeatone-div-info">
                                    <p class="white-text"><b>Repetir la contraseña actual</b></p>
                                    <div id="userpart">
                                        <i class="material-icons left">refresh</i>
                                        <div id="user-div-repeatone">
                                        </div>
                                    </div>
                                </div>
                                <div class="left col s12 m12" id="newpass-div-info">
                                    <p class="white-text"><b>Nueva contraseña</b></p>
                                    <div id="userpart">
                                        <i class="material-icons left">lock_outline</i>
                                        <div id="user-div-newpass">
                                        </div>
                                    </div>
                                </div>
                                <div class="left col s12 m12" id="repeattwo-div-info">
                                    <p class="white-text"><b>Repetir la nueva contraseña</b></p>
                                    <div id="userpart">
                                        <i class="material-icons left">done</i>
                                        <div id="user-div-repeattwo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="center" id="btns">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m6">
                <div class="card" id="card-statidisticsProfile">
                    <div class="card-content">
                        <span class="card-title" id="titlepersonal">Estadística</span>
                        <div id="informationStadistics">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 ">
                <div class="card" id="card-statidisticEvents">
                    <div class="card-content">
                        <span class="card-title" id="titlepersonal">Actividad de creación de eventos</span>
                        <div id="canvasEvent">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card" id="card-statidisticEvents">
                    <div class="card-content">
                        <span class="card-title" id="titlepersonal">Productos agregados en eventos</span>
                        <div id="canvasProducts">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card" id="card-statidisticEvents">
                    <div class="card-content">
                        <span class="card-title" id="titlepersonal">Cantidad de tipos de eventos</span>
                        <div id="canvasTypeEvents">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- <footer class="red">
        <?php ImportGlobal::ImportFooter(); ?>
    </footer>
-->
    <?php
    ImportGlobal::ImportJQuery();
    ImportGlobal::ImportMaterializeJS();
    ImportGlobal::ImportJSFunctions();
    ImportGlobal::ImportMomentJS();
    ImportGlobal::ImportChart();
    ImportGlobal::ImportChartHelpers('HelperChart');
    ImportGlobal::ImportControllerJs('Profile');
    ?>
</body>

</html>