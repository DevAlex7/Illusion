
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
    <title>Configuraciones</title>
    <?php 
      ImportGlobal::ImportMaterializeCss();
      ImportGlobal::ImportMaterialIcons(); 
      ImportGlobal::ImportFileCss('settings'); 
      ImportGlobal::ImportSidenavCss('sidenav');
      ImportGlobal::ImportIco();
      ImportGlobal::ImportFont();   
    ?>
</head>
<body>
    <header>
        <?php  AdminSideNav::SideNav(); ?>
    </header>
    <main>
        <div class="row">
            <div class="col s12 m6">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Verificación de dos pasos</span>
                        <span class="grey-text">La verificación de dos pasos consistira en darte un codigo por medio de google Authenticator.</span>
                        <div class="row">
                            <div class="switch">
                                <label>
                                Off
                                <input type="checkbox" id="switch">
                                <span class="lever"></span>
                                On
                                </label>
                            </div>         
                        </div>
                        <div class="row">
                            <a id="authButton" href="javascript:configure()" class="btn">Configurar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>

    </footer>
    <?php

ImportGlobal::ImportJQuery();
ImportGlobal::ImportMaterializeJS();
ImportGlobal::ImportJSFunctions();
ImportGlobal::ImportControllerJs('Authenticator');
?>
</body>
</html>