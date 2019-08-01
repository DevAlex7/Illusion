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
            <div class="col s12 m6">
               <div class="card">
                   <div class="card-content">
                        <span class="card-title">N° de solicitudes por fechas</span>
                        <form method="POST" id="Datesform">
                            <div class="row">
                                <div class="center">
                                    <div class="col s12 m6">
                                        <input class="center" type="date" name="date1" id="date1" required/>   
                                    </div>
                                    <div class="col s12 m6">
                                        <input class="center" type="date" name="date2" id="date2" required/>   
                                    </div>
                                    <button class="btn">Buscar</button>
                                </div>
                            </div>
                        </form>     
                        <div class="card-panel" id="cardChart">
                            <canvas id="requestsDay"></canvas>
                            <a class="modal-trigger" onclick="viewDetails()" href="#viewDates" id="moredetails"></a>
                        </div>
                   </div>
               </div>
            </div>
            <div class="col s12 m6">
               <div class="card">
                   <div class="card-content">
                        <span class="card-title">Solicitudes por estados</span>
                        <div class="card-panel" id="cardChart">
                            <canvas id="requestsStates"></canvas>
                        </div>
                   </div>
               </div>
            </div>
        </div>
        <div class="modal" id="viewDates">
            <div class="modal-content">
                <div class="card" style="border-radius:1vh">
                    <div class="card-content">
                        <span class="card-title">Solicitudes por rango de fechas </span>
                        <canvas id="datesDetails"></canvas>
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
    ImportGlobal::ImportChart();
    ImportGlobal::ImportChartHelpers('HelperChart');
    ImportGlobal::ImportControllerJs('RequestController');
?>
</body>
</html>