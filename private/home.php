<?php 
require_once('../Helpers/Dashboard.php'); 
require_once('../Imports/Global/Global.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DashBoard | Inicio </title>
    <?php 
     ImportGlobal::ImportMaterializeCss();
     ImportGlobal::ImportMaterialIcons(); 
     ImportGlobal::ImportFileCss('home'); 
     ImportGlobal::ImportIco();
    ?>
</head>
<body>

    <header>
        <?php AdminSideNav::SideNav(); ?>
    </header>
    <main>
    <nav class="green accent-4">

    </nav>
    <div class="row">

    </div>
</main>
<footer class="page-footer" id="FooterPart">
</footer>
<?php
    ImportGlobal::ImportJQuery();
    ImportGlobal::ImportMaterializeJS();
    ImportGlobal::ImportJSFunctions();
?>
</body>
</html>