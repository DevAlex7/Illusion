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
    <title>Dashboard | Evento </title>
    <?php
        ImportGlobal::ImportMaterializeCss();
        ImportGlobal::ImportMaterialIcons();
        ImportGlobal::ImportFileCss('eventview');
        ImportGlobal::ImportSidenavCss('sidenav');
    ?>
</head>
<body>
    <header>
        <?php AdminSideNav::SideNav(); ?>
    </header>
        <main>
            <div class="row">
               <div class="col s12 m12">
                   <div class="card" id="CardView">
                       <div class="card-content">
                            <div class="row">
                                <div class="col s12 m12">
                                    <div class="row">
                                        <div class="col s12 m12">
                                            <div class="card-panel">
                                                <div class="right">
                                                    <a href="#ModalEditTitleEvent" onclick="editNameEvent()" class="modal-trigger"> <i class="material-icons left">edit</i> </a>
                                                </div>
                                                <div id="TitlePart">
                                                    <span class="card-title" id="TitleEvent"></span>
                                                    <p class="grey-text" id="TypeEvent"></p>
                                                    <div class="divider" id="Divider"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col s12 m12">
                                            <div class="card-panel">
                                                <div class="right">
                                                    <a> <i class="material-icons left">edit</i> </a>
                                                </div>
                                                <p id="ClientName"></p>   
                                                <p id="DateEvent"></p>
                                                <p id="NameCreator"></p> 
                                                <p id="StatusEvent"></p> 
                                            </div>  
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col s12 m12">
                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="right">
                                                        <a href=""> <i class="material-icons">edit</i> </a>
                                                    </div>
                                                    <span class="card-title"> Ubicación del evento</span>
                                                    <div class="divider"></div>
                                                    <div class="row">
                                                        <div class="col s12 m12">
                                                        <div id="mapEvent"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 m6">
                                            <div class="card">
                                                <div class="card-content">
                                                   <?php Permissions::addProduct(); ?>
                                                    <span class="card-title">Lista de productos</span>
                                                    <div>
                                                        <table class="responsive-table">
                                                            <thead>
                                                            <tr>
                                                                <th>Productos</th>
                                                                <th>Precio</th>
                                                                <th>Cantidad</th>
                                                                <th>Controles</th>
                                                                <th>Acción</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody id="ProductsinList">
                                                            
                                                            </tbody>
                                                        </table>
                                                        <div class="row">
                                                            <div class="card-panel">
                                                                <span class="card-title" id="PriceEvent"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col s12 m6">
                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="right">
                                                        <button data-target="AddInvites" class="btn tooltipped modal-trigger" data-position="left" data-tooltip="Agregar un invitado al evento" > <i class="material-icons">add</i> </button>
                                                    </div>
                                                    <span class="card-title">Lista de invitados</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal" id="AddProducts">
                <div class="modal-content">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Agregar producto</span>
                            <div class="divider" id="DividerProducts"></div>
                            <form method="POST" id="ListofProducts">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="AddInvites">
                <div class="modal-content">

                </div>
            </div>
            <div class="modal" id="ModalEditTitleEvent">
                <div class="modal-content">
                    <div class="card">
                        <div class="card-content">

                            <div class="row">
                                <form class="col s12" id="EditEventNameForm" method="POST">
                                    <input type="hidden" name="IdEventEdit" id="IdEventEdit">
                                    <div class="row">
                                    <span class="card-title">Editar nombre de evento</span>
                                    
                                        <div class="input-field col s12">
                                            
                                            <i class="material-icons prefix black-text">mode_edit</i>
                                            <input type="text" name="NameEventEdit" id="NameEventEdit">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn amber lighten-1">Editar</button>
                                    <a class="btn modal-close red">Cerrar</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="EditInformationEvent">
                <div class="modal-content">

                </div>
            </div>
            <div class="modal red" id="ConfirmDeleteProduct">
                <div class="modal-content">
                    <div class="card">
                        <div class="card-content">
                            <div class="center">
                                <span class="card-title">¿Desea eliminar este producto de su lista?</span>
                                <a onclick="removeFromList()" class="btn red">Si, eliminar</a>
                                <a class="btn grey modal-close">Cancelar</a>
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
    ImportGlobal::ImportControllerJs('ViewEventController');
?>
</body>
</html>