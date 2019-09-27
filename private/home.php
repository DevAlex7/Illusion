<?php 
require_once('../Helpers/Dashboard.php'); 
require_once('../Imports/Global/Global.php')
?>
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
        ImportGlobal::ImportSidenavCss('sidenav');
        ImportGlobal::ImportFont();
    ?>
</head>
<body>
    <header>
        <?php  AdminSideNav::SideNav(); ?>
    </header>
    <main>
        <div class="row" id="PresentationCard">
           <div class="card col s12 m5 offset-m3 red">
                <div class="card-content white-text">
                    <div class="row">
                        <div class="col s12 m3">
                            <i class="material-icons" id="iconHome">near_me</i>
                        </div>
                        <div class="col s12 m9">
                            <span id="titleHome" >Bienvenido</span>
                            <h6> <?php print $_SESSION['NameUser'].' '.$_SESSION['LastnameUser']  ?> </h6>
                            <h6> <?php print $_SESSION['UsernameActive']  ?> </h6>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </main>
<?php

    ImportGlobal::ImportJQuery();
    ImportGlobal::ImportMaterializeJS();
    ImportGlobal::ImportJSFunctions();
    //ImportGlobal::ImportInactivity();
    ImportGlobal::ImportControllerJs('MainController');

?>
</body>
</html>