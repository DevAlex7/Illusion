<?php 
require_once('../Helpers/Dashboard.php'); 
require_once('../Imports/Global/Global.php')?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notifications</title>
    <?php 
        ImportGlobal::ImportMaterializeCss();
        ImportGlobal::ImportMaterialIcons(); 
        ImportGlobal::ImportFileCss('notifications'); 
        ImportGlobal::ImportSidenavCss('sidenav');   
        ImportGlobal::ImportIco();
        ImportGlobal::ImportFont();
    ?>
</head>
<body>
<header>
    <?php AdminSideNav::SideNav(); ?>
</header>
<main>
    <div class="row">
        <div class="col s12 m12">
            <span id="titleNotification" class="indigo-text">Bloqueos</span>
        </div>
    </div>
    <div class="row" id="results">
        
    </div>
</main>
<?php
    ImportGlobal::ImportJQuery();
    ImportGlobal::ImportMaterializeJS();
    ImportGlobal::ImportJSFunctions();
    ImportGlobal::ImportMomentJS();
    ImportGlobal::ImportControllerJs('Notifications');
?>
</body>
</html>