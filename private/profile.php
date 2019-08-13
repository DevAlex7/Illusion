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
        ImportGlobal::ImportFileCss('requests');
        ImportGlobal::ImportFont();
    ?> 
</head>
<body>
    <header>
    <?php AdminSideNav::SideNav(); ?>
    </header>
    <main>

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
    ImportGlobal::ImportControllerJs('ProfileController');
?>
</body>
</html>