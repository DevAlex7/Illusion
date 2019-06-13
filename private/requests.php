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
        ImportGlobal::ImportFileCss('requests')
    ?> 
</head>
<body>
    <header>
    <?php AdminSideNav::SideNav(); ?>
    </header>
    <main>
        <nav class="red">
            <div class="nav-wrapper">
                 <a href="#" class="center brand-logo">Solicitudes</a>
            </div>
        </nav>
       <div class="row">
           <div class="col s12 m12">
            <div class="card">
                    <div class="card-content">
                        <div class="row" id="RequestsList">
                           
                        </div> 
                    </div>
                </div>
           </div>
       </div>
    </main>
    <footer class="red">
        <?php ImportGlobal::ImportFooter(); ?>
    </footer>
<?php
    ImportGlobal::ImportJQuery();
    ImportGlobal::ImportMaterializeJS();
    ImportGlobal::ImportJSFunctions();
    ImportGlobal::ImportMomentJS();
    ImportGlobal::ImportControllerJs('RequestController');
?>
</body>
</html>