<?php 
    require('../Helpers/Dashboard.php');
    require('../Imports/Global/Global.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Costos </title>
</head>
<body>

    <?php 
        ImportGlobal::ImportMaterializeCss();
        ImportGlobal::ImportMaterialIcons();
        ImportGlobal::ImportIco();
        ImportGlobal::ImportFileCss('eventcosts');
        ImportGlobal::ImportSidenavCss('sidenav');
    ?>
    <header>
        <?php AdminSideNav::SideNav(); ?>
    </header>
    <main>
            
            <!-- NavBar -->
            <div class="navbar-fixed">
                <nav id="Bar">
                    <div class="nav-wrapper">
                    <ul class="left hide-on-med-and-down">
                        <li><a href="/Illusion/private/events.php"> <i class="material-icons left">view_agenda</i> Ver eventos</a></li>
                    </ul>
                    </div>
                </nav>
            </div>
            <div class="row" id="Information">
                <div class="col s12 m12">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Total invertido en eventos:</span>
                            <span class=" card-title red-text" id="TitleCost"></span>
                            <span class=" card-title green-text accent-4" id="TitleWin"></span>
                            <div class="divider"></div>
                            <div class="card-panel red white-text" id="ChipDontpay">Eventos no pagados</div>
                                <div id="InformationCosts">
                                   <div class="row" id="ReadNotPay">
                                   </div>
                                </div>
                            <div class="card-panel green accent-4 white-text">Eventos pagados</div>
                                <div id="InformationCosts">
                                    <div class="row" id="ReadPay">
                                    </div>
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
    ImportGlobal::ImportControllerJs('CostsController');
?>
</body>
</html>