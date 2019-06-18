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
            <div class="modal" id="CreateAdministrator">
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
    ImportGlobal::ImportControllerJs('EmployeesController');
?>
</body>
</html>