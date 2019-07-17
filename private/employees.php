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

            <!--modal Editar Administradores -->
            <div class="modal" id="alterAdmins">
                <div class="modal-content">
                    <div class="card">
                        <div class="card-content">
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
                            <a class="waves-effect waves-light btn"><i class="material-icons left"></i>Modificar</a>
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

    </main>
    <footer class="red">
       <?php ImportGlobal::ImportFooter() ?>   
    </footer>
<?php
    ImportGlobal::ImportJQuery();
    ImportGlobal::ImportMaterializeJS();
    ImportGlobal::ImportJSFunctions();
    ImportGlobal::ImportRoutesJs();
    ImportGlobal::ImportControllerJs('EmployeesController');
?>
</body>
</html>