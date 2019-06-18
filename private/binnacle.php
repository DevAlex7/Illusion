<?php 
require_once('../Helpers/Dashboard.php'); 
require_once('../Imports/Global/Global.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashoard | Bitacora</title>
    <?php 
        ImportGlobal::ImportMaterializeCss();
        ImportGlobal::ImportMaterialIcons(); 
        ImportGlobal::ImportFileCss('binnacle'); 
        ImportGlobal::ImportIco();
    ?>
</head>
<body>
<header>
        <?php AdminSideNav::SideNav(); ?>
    </header>
    <main>
        <div class="page">
            <div class="page__demo">
                <div class="main-container page__container" id="Timeline">
                  
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
    ImportGlobal::ImportMomentJS();
    ImportGlobal::ImportControllerJs('Binnacle');
?>
</body>
</html>