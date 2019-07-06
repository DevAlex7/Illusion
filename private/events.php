<?php 
    require_once('../Imports/Global/Global.php');   
    require_once('../Helpers/Dashboard.php');
    require_once('../Helpers/Roles.php'); 
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
        ImportGlobal::ImportIco();
        ImportGlobal::ImportFileCss('events');
        ImportGlobal::ImportSidenavCss('sidenav');
    ?> 
</head>
<body>
    <header>
        <?php AdminSideNav::SideNav(); ?>
    </header>
        <main>
            <?php 
                Permissions::eventsBar();
            ?>
            <div class="row" id="SearchBar">
                <div class="col s12 m12">
                    <nav class="white">
                        <div class="nav-wrapper">
                        <form id="SearchForm" method="POST">
                            <div class="input-field">
                                <input id="SearchInput" name="SearchInput" type="search" placeholder="Busca un evento o cliente">
                                <label class="label-icon" for="search"><i class="material-icons black-text">search</i></label>
                                <i class="material-icons">close</i>
                            </div>
                        </form>
                        </div>
                    </nav>
                </div>
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
        <footer class="red">
            <?php ImportGlobal::ImportFooter(); ?>
        </footer>
<?php
    ImportGlobal::ImportJQuery();
    ImportGlobal::ImportMaterializeJS();
    ImportGlobal::ImportJSFunctions();
    ImportGlobal::ImportMomentJS();
    ImportGlobal::ImportRoutesJs();
    ImportGlobal::ImportControllerJs('EventsController');
?>
</body>
</html>