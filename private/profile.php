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
                <div class="card z-depth-1-half" id="card-informationProfile">
                    <div class="card-content">
                        <span class="card-title" id="titlepersonal">Información personal</span>
                        <div id="informationProfile">
                            <div class="row">
                                <div class="left col s12 m12" id="name-div-info">
                                    <p class="grey-text">Nombre</p>
                                    <div id="userpart">
                                        <i class="material-icons left">person</i>
                                        <div id="user-div-name">
                                            <span id="name-user">Usuario</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="left col s12 m12" id="lastname-div-info">
                                    <p class="grey-text">Apellido</p>
                                    <div id="userpart">
                                        <i class="material-icons left">person</i>
                                        <div id="user-div-lastname">
                                            <span id="lastname-user">Usuario</span>
                                        </div>
                                    </div>
                                </div>  
                                <div class="left col s12 m12" id="email-div-info">
                                    <p class="grey-text">Email</p>
                                    <div id="userpart">
                                        <i class="material-icons left">person</i>
                                        <div id="user-div-email">
                                            <span id="email-user">Usuario</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="left col s12 m12" id="username-div-info">
                                    <p class="grey-text">Usuario</p>
                                    <div id="userpart">
                                        <i class="material-icons left">person</i>
                                        <div id="user-div-username">
                                            <span id="username-user">Usuario</span>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="row">
                                <div class="center">
                                    <a class="btn orange" id="editProfile"> <i class="material-icons left">edit</i> Editar </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card" id="card-statidisticsProfile">
                    <div class="card-content">
                        <span class="card-title" id="titlepersonal">Estadística</span>
                        <div id="informationStadistics">
                            
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
    ImportGlobal::ImportRoutesJs();
    ImportGlobal::ImportControllerJs('Profile');
?>
</body>
</html>