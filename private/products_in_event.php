<?php 
require_once('../Helpers/Dashboard.php'); 
require_once('../Imports/Global/Global.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos | Eventos</title>
    <?php 
        ImportGlobal::ImportMaterializeCss();
        ImportGlobal::ImportMaterialIcons();
        ImportGlobal::ImportSidenavCss('sidenav');
        ImportGlobal::ImportFileCss('productsEvents');
    ?>
</head>
<body>
    <header>
    <?php AdminSideNav::SideNav(); ?>
    </header>
    <main>
        <div class="row">
            <div class="col s12 m12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title white-text">Eventos</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row"id="eventRead">
           
        </div>
    </main>
    <footer>

    </footer>
    <?php 
    ImportGlobal::ImportJQuery();
    ImportGlobal::ImportMaterializeJS();
    ImportGlobal::ImportJSFunctions();
    ImportGlobal::ImportChart();
    ImportGlobal::ImportChartHelpers('HelperChart');
    ImportGlobal::ImportControllerJs('ProductsEventsController');
    ?>
</body>
</html>