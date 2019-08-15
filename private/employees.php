<?php
    require('../Imports/Global/Global.php');
    require('../Helpers/Dashboard.php');
    require_once('../Helpers/Roles.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Empleados </title>
    <?php 
        ImportGlobal::ImportMaterializeCss();
        ImportGlobal::ImportMaterialIcons(); 
        ImportGlobal::ImportIco();
        ImportGlobal::ImportFileCss('employees');
        ImportGlobal::ImportSidenavCss('sidenav');   
        ImportGlobal::ImportFont();
    ?>
</head>
<body>
    <header>
        <?php AdminSideNav::SideNav(); ?>
    </header>
    <main>
            <?php 
                Permissions::AdminBar();
            ?>
            <div class="row" id="GetPersons">
                
            </div>
            <div class="fixed-action-btn">
                <a class="btn-floating btn-large red modal-trigger" href="#insertAdmins">
                    <i class="large material-icons">add</i>
                </a>
                <a class="btn-floating btn-large orange modal-trigger" href="#searchEmployee">
                    <i class="large material-icons">search</i>
                </a>
                <a class="btn-floating btn-large red modal-trigger" id="reportEmployees">
                    <i class="large material-icons">description</i>
                </a>
            </div>
            <!--modal insertar Administradores -->
            <div class="modal" id="insertAdmins">
                <div class="modal-content">
                    <div class="card">
                        <div class="card-content">

                            <form method="POST">
                                <div class="row">
                                    <div class="col s12 m6">
                                        <input type="text" name="NameAdministrator" id="NameAdministrator">
                                        <label for="NameAdministrator">Nombre de administrador</label>
                                    </div>
                                    <div class="col s12 m6">
                                        <input type="text" name="LastNameAdministrator" id="LastNameAdministrator">
                                        <label for="NameAdministrator">Apellido de administrador</label>
                                    </div>
                                    <div class="col s12 m6">
                                        <input type="text" name="UsernameAdministrator" id="UsernameAdministrator">
                                        <label for="NameAdministrator">Usuario de administrador</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>  
                            <span class="card-title">Agrega nuevos Administradores</span>
                            <div class="input-field col s6">
                                <input id="name" type="text">
                                <label for="name">nombres</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="last_name" type="text">
                                <label for="last_name">Apellidos</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="email" type="email">
                                <label for="email">Correo Electronico</label>
                            </div>
                            <div class="input-field col s12">
                                <select class="browser-default">
                                    <option value="" disabled selected>Selecione el tipo de usuario</option>
                                    <option value="0">Administrador</option>
                                    <option value="1">Empleado</option>
                                </select>                                
                            </div>
                            <div class="input-field col s6">
                                <input class="Password" type="text">
                                <label for="Password">Contraseña</label>
                            </div>
                            <a class="waves-effect waves-light btn"><i class="material-icons left"></i>Registrar</a>
                        </div>
                    </div>
                </div>
            </div>

            <!--modal ver estadisticas Administradores -->
            <div class="modal" id="viewStadistics">
                <div class="modal-content">
                    <div class="row">
                        <div class="col s12 m12">
                            <div class="card z-depth-3" id="eventsDates">
                                <div class="card-content" id="information">
                                    <span class="card-title">Actividad en creación de eventos</span>
                                    <canvas id="eventsinActivity"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m12">
                            <div class="card z-depth-3" id="productsActivity">
                                <div class="card-content" id="EventsProducts">
                                    <span class="card-title">N° de productos en eventos</span>
                                    <div id="productsChart">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m12">
                            <div class="card z-depth-3" id="typeEventsActivity">
                                <div class="card-content">
                                    <span class="card-title">Tipos de eventos</span>
                                    <div id="typeEventsChart">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="viewStadisticsPublicU">
                <div class="modal-content">
                    <div class="row">
                        <div class="col s12 m12">
                            <div class="card z-depth-3" id="cardRequests">
                                <div class="card-content">
                                <span class="card-title">N° de Solicitudes en rango de fechas</span>
                                <canvas id="requestsUser"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!--modal eliminar Administrador -->
        <div class="modal" id="deleteAdmins">
            <div class="modal-content">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Estas seguro que deseas eliminar?</span> 
                        <a class="waves-effect red btn"><i class="material-icons left"></i>eliminar</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal" id="searchEmployee">
            <div class="modal-content">
                <div class="row" id="SearchBar">
                    <div class="col s12 m12">
                        <nav class="white">
                            <div class="nav-wrapper">
                            <form id="searching" method="POST">
                                <div class="input-field">
                                    <input id="search" name="search" type="search" placeholder="Busca alguna información">
                                    <label class="label-icon" for="search"><i class="material-icons black-text">search</i></label>
                                    <i class="material-icons">close</i>
                                </div>
                            </form>
                            </div>
                        </nav>
                    </div>
                    <div class="col s12 m1 offset-m1" id="titlesResultName">
                        <span class="grey-text">Nombre</span>
                    </div>
                    <div class="col s12 m1 offset-m2" id="titlesResultUsername">
                        <span class="grey-text">Usuario</span>
                    </div>
                    <div class="col s12 m1 offset-m1" id="titlesResultPosition">
                        <span class="grey-text">Cargo</span>
                    </div>
                    <div class="col s12 m1 offset-m4" id="titlesResultAction">
                        <span class="grey-text">Acción</span>
                    </div>
                    <div class="col s12 m12">
                        <div id="result" style="margin-top:1rem">
                        </div>
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
    ImportGlobal::ImportChartHelpers('HelperChart');
    ImportGlobal::ImportControllerJs('EmployeesController');
?>
</body>
</html>