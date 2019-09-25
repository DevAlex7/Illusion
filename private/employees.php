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
            
            <div class="row" id="GetPersons"></div>
            <div class="fixed-action-btn">
                <?php 
                    Permissions::AdminBar();
                ?>    
                <a class="btn-floating btn-large orange modal-trigger" href="#searchEmployee">
                    <i class="large material-icons">search</i>
                </a>
                <a class="btn-floating btn-large red modal-trigger" id="reportEmployees">
                    <i class="large material-icons">description</i>
                </a>
            </div>

            <!--modal insertar Administradores -->
            <div class="modal red" id="insertAdmins">
                <div class="modal-content">
                    <form method="post" id="form-addEmployee">
                    <div class="row">
                        <div class="col s12 m6">
                            <div class="card">
                                <div class="card-content">
                                    <div class="center">
                                        <span>Datos personales</span>
                                    </div>                       
                                    <div class="input-field prefix">
                                        <input type="text" name="name" id="name">
                                        <label for="">Nombre</label>
                                    </div>
                                    <div class="input-field prefix">
                                        <input type="text" name="lastname" id="lastname">
                                        <label for="">Apellido</label>
                                    </div>
                                    <div class="input-field prefix">
                                        <input type="text" name="email" id="email">
                                        <label for="">Correo electronico</label>
                                    </div>
                                    <div class="input-field prefix">
                                        <input type="text" name="username" id="username">
                                        <label for="">Usuario</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <div class="card">
                                <div class="card-content">
                                    <div class="center">
                                        <span>Datos de sistema</span>
                                    </div>
                                    <div class="input-field prefix">
                                        <a href="javascript:getRan()" class="prefix"><i class="material-icons">face</i></a>
                                        <input type="text" name="pass1" id="pass1" placeholder="Generar contraseña">
                                        
                                    </div>
                                    <div class="input-field prefix">
                                        <select name="role" id="role"></select>
                                        <label for="">Rol de usuario</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="center">
                                <button type="submit" class="btn">Agregar</button>
                            </div>
                        </div>  
                    </div>
                    </form>
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