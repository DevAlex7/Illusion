<?php 
require_once('../Helpers/Dashboard.php'); 
require_once('../Imports/Global/Global.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Inicio </title>
    <?php 
     ImportGlobal::ImportMaterializeCss();
     ImportGlobal::ImportMaterialIcons(); 
     ImportGlobal::ImportFileCss('home'); 
     ImportGlobal::ImportIco();
     ImportGlobal::ImportFont();
    ?>
</head>
<body>

    <header>
        <?php  AdminSideNav::SideNav(); ?>
    </header>
    <main>
        <div class="row" id="PresentationCard">
           <div class="card col s12 m5 offset-m3">
                <div class="card-content">
                    <span class="card-title center">¡Bienvenido!</span>
                    <span class="card-title center"> <?php print $_SESSION['UsernameActive']. ': ' .$_SESSION['NameUser']. ' '.$_SESSION['LastnameUser']   ?> </span>
                </div>
           </div>
        </div>
    </main>
<footer class="red">
    <?php ImportGlobal::ImportFooter();?>
</footer>
<?php

    ImportGlobal::ImportJQuery();
    ImportGlobal::ImportMaterializeJS();
    ImportGlobal::ImportJSFunctions();
    ImportGlobal::ImportControllerJs('MainController')

?>
</body>
</html>