<?php
require('../Imports/Global/Global.php');
require('../Helpers/Dashboard.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Estadísticas </title>
    <?php
    ImportGlobal::ImportMaterializeCss();
    ImportGlobal::ImportMaterialIcons();
    ImportGlobal::ImportIco();
    ImportGlobal::ImportFont();
    ImportGlobal::ImportFileCss('employees');
    ImportGlobal::ImportSidenavCss('sidenav');
    ?>
</head>
<body>
    <header>
        <?php AdminSideNav::SideNav(); ?>
    </header>
    <main>
        <div class="navbar-fixed">
            <nav class="" id="Bar">
                <div class="nav-wrapper">
                    <ul class="left hide-on-med-and-down">
                        <li><a class=""> <i class="material-icons left">timeline</i> Gráficos y estadísticas </a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="row">
            <div class="col s12 m6">
                <div id="Form">
                    <div class=" z-depth-4 card-panel">
                        <form>
                            <div class="row">
                                <div class="input-field col s12">
                                    <div class="center-align">
                                        <span class="card-title"> <i class="material-icons blue-text">filter_vintage</i></span>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="center-align">
                                        <span class="grey-text card-title">Eventos agrupados por tipo.</span>
                                        <canvas id="chart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div id="Form">
                    <div class="z-depth-4 card-panel">
                        <form>
                            <div class="row">
                                <div class="input-field col s12">
                                    <div class="center-align">
                                        <span class="card-title"> <i class="material-icons blue-text">filter_vintage</i> </span>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="center-align" id="DetailsEmployee">
                                        <span class="grey-text card-title">Acciones realizadas por fecha.</span>
                                        <canvas id="line"></canvas>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div id="Form">
                    <div class=" z-depth-4 card-panel border-radius-6 Card">
                        <form>
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <div class="center-align">
                                        <span class="card-title"> <i class="material-icons blue-text">filter_vintage</i> </span>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="center-align" id="DetailsEmployee">
                                        <span class="grey-text card-title">Inventario de productos.</span>
                                        <div class="center">
                                            <div class="col s12">
                                                <input class="center" type="number" name="evento" id="evento" placeholder="Ingrese la cantidad de productos que desea ver" required />
                                            </div>
                                            <a class="btn" id="searchingCount" >Buscar</a>
                                        </div>
                                        <canvas id="bar"></canvas>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div id="Form">
                    <div class=" z-depth-4 card-panel border-radius-6 Card">
                        <form>
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <div class="center-align">
                                        <span class="card-title"> <i class="material-icons blue-text">filter_vintage</i> </span>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="center-align" id="DetailsEmployee">
                                        <span class="grey-text card-title">Eventos agrupados por fecha.</span>
                                        <div class="center">
                                            <div class="col s12 m6">
                                                <input class="center" type="date" name="date1" id="date1" required />
                                            </div>
                                            <div class="col s12 m6">
                                                <input class="center" type="date" name="date2" id="date2" required />
                                            </div>
                                            <button class="btn">Buscar</button>
                                        </div>
                                        <canvas id="donut"></canvas>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="red">
        <?php ImportGlobal::ImportFooter() ?>
    </footer>
    <?php
    ImportGlobal::ImportJQuery();
    ImportGlobal::ImportMaterializeJS();
    ImportGlobal::ImportJSFunctions();
    ImportGlobal::ImportChart();
    ImportGlobal::ImportComponentChart();
    ImportGlobal::ImportControllerJs('ChartsPage');
    ?>
</body>
</html>