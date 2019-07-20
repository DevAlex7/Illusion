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
    <title>Dashboard | Tipos de eventos</title>
</head>
<body>
<?php 
    ImportGlobal::ImportMaterializeCss();
    ImportGlobal::ImportMaterialIcons();
    ImportGlobal::ImportIco();
    ImportGlobal::ImportFileCss('typeEvents');
    ImportGlobal::ImportSidenavCss('sidenav');
    ImportGlobal::ImportFont();
?>
    <header>
        <?php AdminSideNav::SideNav(); ?> 
    </header>
    <main>
        <?php Permissions::addTypeEvent()  ?>
        <div class="row">
            <div class="col s12 m12">
                <div class="card">
                    <nav class="white grey-text">
                        <div class="nav-wrapper">
                            <form method="POST" id="FormSearch">
                                <div class="input-field">
                                    <input id="searchType" name="searchType" type="search" placeholder="Busca algo...">
                                    <label class="label-icon" for="search"><i class="material-icons black-text">search</i></label>
                                    <i onclick="clearSearch()" class="material-icons">close</i>
                                </div>
                            </form>
                        </div>
                    </nav>
                    <div class="card-content">
                        <div id="ContentTypes">
                            <span class="card-title">Tipos de evento</span>
                            <div class="row" id="TypesRead">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="modal" id="ModalEditType">
        <div class="modal-content">
            <div class="card">
                <div class="card-content">
                    <div class="center">
                        <span class="card-title">Editar Tipo de evento</span>
                        <div id="InformationEdit">
                            <form method="POST" id="EditFormType">
                                <div class="center">
                                    <div class="row">
                                        <div class="col s12 m6 offset-m3">
                                            <div class="center">
                                                <input type="hidden" name="Id_Type" id="Id_Type">
                                                <input type="text" name="EditTypeInput" id="EditTypeInput">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn green">Editar</button>
                                    <a class="btn modal-close grey"> <i class="material-icons left">close</i> Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal red" id="ModalDeleteType">
        <div class="modal-content">
            <div class="card">
                <div class="card-content">
                    <div class="center"> <span class="card-title">¿Desea eliminar este tipo de evento?</span> </div>
                    <div class="modal-footer transparent">
                       <div class="center">
                        <a onclick="confirmDelete();" class="btn red"> <i class="material-icons left">delete</i> Acepto</a>
                        <a class="btn modal-close grey"> <i class="material-icons left">close</i> No, cancelar</a>
                       </div>
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
    ImportGlobal::ImportRoutesJs();
    ImportGlobal::ImportControllerJs('TypeEventsController');
?>
</body>
</html>