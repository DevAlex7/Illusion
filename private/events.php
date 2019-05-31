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
    <title>Dashboard | Eventos </title>
    <?php 
        ImportGlobal::ImportMaterializeCss();
        ImportGlobal::ImportMaterialIcons();
        ImportGlobal::ImportFileCss('events');
        ImportGlobal::ImportFileCss('eventview');
        ImportGlobal::ImportSidenavCss('sidenav');
    ?> 
</head>
<body>
    <header>
        <?php AdminSideNav::SideNav(); ?>
    </header>
        <main>
            
            <!-- NavBar -->
            <div class="navbar-fixed">
                <nav class="" id="Bar">
                    <div class="nav-wrapper">
                    <ul class="left hide-on-med-and-down">
                        <li><a > <i class="material-icons left">view_agenda</i> Ver eventos</a></li>
                        <li><a class="modal-trigger" href="#CreateEvent"> <i class="material-icons left">calendar_today</i> Crear evento</a></li>
                        <li><a > <i class="material-icons left"> attach_money </i> Gastos</a></li>
                    </ul>
                    </div>
                </nav>
            </div>

            <!-- Information -->
            <div class="row" id="Information">
               
            </div>

            <div class="modal" id="CreateEvent">
                <div class="modal-content">
                    <div class="card-panel green accent-4">
                        <span class="card-title white-text">Crear Evento</span>
                    </div>
                    <div class="row">
                        <form class="col s12" method="POST" id="FormCreateEvent">
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="EventName" name="EventName" type="text">
                                    <label for="EventName">Nombre del evento</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">calendar_today</i>
                                    <input id="DateEvent" name="DateEvent" type="text">
                                    <label for="DateEvent">Fecha de evento (Año-mes-dia)</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">person</i>
                                    <input id="NameClient" name="NameClient" type="text">
                                    <label for="NameClient">Nombre del cliente</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">list</i>
                                    <select name="TypeEventSelect" id="TypeEventSelect"></select>
                                </div>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">map</i>
                                    <textarea class="materialize-textarea" name="PlaceEvent" id="PlaceEvent" cols="30" rows="10"></textarea>
                                    <label for="PlaceEvent">Ubicación del evento (Codigo HTML de Google Maps) </label>
                                </div>
                                <div class="input-field col s12">
                                   <div class="center">
                                        <button type="submit" class="btn green accent-4"> <i class="material-icons left">check</i> Crear evento</button>
                                        <a class="modal-close btn grey"> <i class="material-icons left">close</i> Cerrar</a>
                                   </div>
                                </div>
                            </div>
                        </form>
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
    ImportGlobal::ImportControllerJs('EventsController');
?>

</body>
</html>