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
                                                <!--Edit EventName -->
                                                <div class="right">
                                                    <a id="EditEventNameBtn" href="#ModalEditTitleEvent" onclick="editNameEvent()" class="modal-trigger"> <i class="material-icons left">edit</i></a>
                                                </div>
                                                <div id="TitlePart">
                                                    <span class="card-title" id="TitleEvent"></span>
                                                    <p class="grey-text" id="TypeEvent"></p>
                                                    <div id="contributors">
                                                        <a onclick="loadUsers()" id="collaboratorLink" href="#CollaboratosModal" class="modal-trigger"></a>
                                                    </div>
                                                    <div class="divider" id="Divider"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col s12 m12">
                                            <div class="card-panel">
                                                <!--Edit Information event -->
                                                <div class="right">
                                                    <a id="EditInformationBtn" href="#EditInformationEvent" onclick="InfoEvent()" class="modal-trigger"> <i class="material-icons left">edit</i> </a>
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
                                                    <!--Edit Map event -->
                                                    <div class="right">
                                                        <a id="EditMapBtn" onclick="editMap()" href="#ModalEditMapEvent" class="modal-trigger"> <i class="material-icons">edit</i> </a>
                                                    </div>
                                                    <span class="card-title"> Ubicación del evento</span>
                                                    <div class="divider"></div>
                                                    <div class="row">
                                                        <div class="col s12 m12">
                                                            <div id="mapEvent">
                                                                
                                                            </div>
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
                                                    <!--Add products -->
                                                    <div class="right">
                                                        <a id="AddProductsBtn" href="#AddProducts" onclick="ListProducts();" class="btn left tooltipped modal-trigger"  data-position="left" data-tooltip="Agregar un producto al evento"> <i class="material-icons">add</i> </a>
                                                    </div>
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
                                                    <!--Add Invitations -->
                                                    <div class="right">
                                                        <button id="BtnAddInvites" data-target="AddInvites" class="btn tooltipped modal-trigger" data-position="left" data-tooltip="Agregar un invitado al evento" > <i class="material-icons">add</i> </button>
                                                    </div>
                                                    <span class="card-title">Lista de invitados</span>
                                                    <div>
                                                        <table>
                                                            <thead>
                                                            <tr>
                                                                <th>Nombres</th>
                                                                <th>Apellidos</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody id="InvitesRead">
                                                            </tbody>
                                                        </table>
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
                <div class="row">
                    <div class="col s12 m12">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <span class="card-title">Comentarios</span>
                                    <div class="row" id="CommentsPart" style="height:330px; overflow-y:scroll;">
                                        
                                    </div>
                                    <div class="row">
                                        <form class="col s12" id="FormCommentUser">
                                            <div class="row">
                                                <div class="input-field col s12">
                                                <input type="hidden" name="IdEventComment" id="IdEventComment">
                                                <textarea id="Comment" name="Comment" class="materialize-textarea" placeholder="Escriba su comentario..."></textarea>
                                                </div>
                                            </div>
                                            <button  id="SendComment" type="submit" class="btn blue">Comentar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Modal add products list -->
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
            <!--Modal add invites to event -->
            <div class="modal" id="AddInvites">
                <div class="modal-content">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Agregar invitados</span>
                            <form method="POST" id="InvitesForm">
                                <div class="row">
                                    <div class="col s8">
                                        <input type="text" name="NameInvite" id="NameInvite">
                                        <label for="NameInvite">Nombre de la persona</label>
                                    </div>
                                    <div class="col s8">
                                        <input type="text" name="LastnameInvite" id="LastnameInvite">
                                        <label for="LastnameInvite">Apellido de la persona</label>
                                    </div>
                                    <div class="col s8">
                                        <input type="hidden" name="IdEvent" id="IdEvent" value=<?php print $_GET['event'] ?>>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <button type="submit" class="btn green accent-4">Agregar</button>
                                    <a class="btn modal-close grey">Cerrar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--Modal edit title event -->
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
            <!--Modal edit information -->
            <div class="modal" id="EditInformationEvent">
                <div class="modal-content">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <form class="col s12" method="POST" id="EditInfoForm">
                                    <div class="row">
                                        <input type="hidden" name="EditIdEventInfo" id="EditIdEventInfo">
                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">calendar_today</i>
                                            <input type="text" name="DateEdit" id="DateEdit">
                                            <label for="DateEdit">Fecha de evento</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">list</i>
                                            <select name="TypeEventsEdit" id="TypeEventsEdit"></select>
                                            <label for="TypeEventsEdit">Tipo de evento</label>
                                        </div>
                                        <div class="center">
                                            <button type="submit" class="btn amber lighten-1">Editar</button>
                                            <a class="btn modal-close red">Cerrar</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Modal edit map -->
            <div class="modal" id="ModalEditMapEvent">
                <div class="modal-content">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title"> <i class="material-icons">map</i> Editar ubicación del evento </span>
                            <form method="POST" id="MapEditForm">
                                <div class="row">
                                    <div class="col s12">
                                        <input type="hidden" id="EditMapId" name="EditMapId">
                                    </div>
                                    <div class="col s12">
                                        <textarea name="EditMap" class="materialize-textarea" id="EditMap" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <button type="submit" class="btn amber lighten-1">Editar</button>
                                    <a class="btn modal-close red">Cerrar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--Modal delete product -->
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
            <div class="modal red" id="DeleteInviteModal">
                <div class="modal-content">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                            <span class="card-title">¿Deseas eliminar a este invitado?</span>
                            </div>
                            <div class="card-action center">
                                <a onclick="deleteInvite()" class="btn red">Si, borrar</a>
                                <a class="btn grey modal-close">No, Cerrar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="CollaboratosModal">
                <div class="modal-content">
                <div class="card-panel green accent-4 white-text center">Colaboradores</div>
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Administradores disponibles</span>
                            <div class="row" id="ReadUsers">
                            </div>
                            <table class="centered">
                                <thead>
                                <tr>
                                    <th>Nombre </th>
                                    <th>Apellido</th>
                                </tr>
                                </thead>

                                <tbody id="ReadCollaborators">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="ReplyesModal">
                <div class="modal-content">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <span class="card-title">Respuestas</span>
                                <div class="row" id="ReplyesPart" style="height:315px; overflow-y:scroll;">
                                </div>
                                <div class="row">
                                    <form class="col s12" id="FormReplytUser">
                                        <div class="row">
                                            <div class="input-field col s12">
                                            <input type="hidden" name="IdComment" id="IdComment">
                                            <textarea id="CommentReply" name="CommentReply" class="materialize-textarea" placeholder="Escriba su comentario..."></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn blue">Comentar</button>
                                    </form>
                                </div>
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