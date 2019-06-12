<?php 
 require_once('Imports/Global/Global.php');
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Distribuidora Illussion | Solicitud de eventos</title>
        <?php 
            ImportGlobal::ImportPublicMaterialIcons();
            ImportGlobal::ImportPublicMaterializeCss();
            ImportGlobal::publicIco();
            ImportGlobal::publicStyle();
        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <!-- BEGIN: Navbar -->
        <header>
            <nav class="black">
                <div class="brand-sidebar black">
                    <a class="brand-logo center">
                        <img src="Imports/resources/pics/utilities/ico.png" alt="ico-illusion" height="25">
                        <span class="white-text">Illussion Party Supplies</span>
                    </a>
                </div>
            </nav>
        </header>
    <!-- END: Navbar -->

    <body class='Aki'>
        <div class="row margin">
            <div class="col s12">
                <div id="RegisterStyle" class="row">
                    <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 Card">
                        <form class="register-form" method="post">
                            <div class="row margin">
                                <div class="input-field col s12 m6">
                                    <h5 class="ml-4">Solicitud de eventos</h5>
                                </div>
                            </div>
                            <div class="row margin">
                                <div class="input-field col s12 m6">
                                    <i class="material-icons black-text prefix">person_outline</i>
                                    <input id="name" type="text" name="first_name" class="validate" required>
                                    <label for="name" class="center-align">Nombres</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <i class="material-icons black-text prefix">person</i>
                                    <input id="lastname" type="text" name="last_name" class="validate" required>
                                    <label for="lastname" class="center-align">Apellidos</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <i class="material-icons black-text prefix">email</i>
                                    <input id="email" type="text" name="e_mail" class="validate" required>
                                    <label for="email" class="center-align">Correo Electrónico</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <i class="material-icons black-text prefix">event_note</i>
                                    <input id="date" type="text" name="date_event" class="validate" required>
                                    <label for="date" class="center-align">Fecha del evento</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <i class="material-icons black-text prefix">phone</i>
                                    <input id="phone" type="text" name="phone" class="validate" required>
                                    <label for="phone" class="">Número de teléfono</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <i class="material-icons black-text prefix">equalizer</i>
                                    <input id="cate" type="text" name="cate" class="validate" required>
                                    <label for="cate" class="">Categoría</label>
                                </div>
                                <div class="input-field col s12">
                                    <i class="material-icons black-text prefix">edit</i>
                                    <input id="event" type="text" name="description" class="validate" required>
                                    <label for="event" class="">Descripción del evento</label>
                                </div>
                            </div>
                            <div class="row margin">
                                <div class="input-field col s12 center">
                                    <button type="submit" class="btn waves-effect waves-light black border-round tooltipped"
                                    data-tooltip="Agregar">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<?php 
    ImportGlobal::ImportPublicJQuery();
    ImportGlobal::ImportPublicMaterializeJS();
    ImportGlobal::ImportPublicJSFunctions();
    ImportGlobal::ImportPublicPlugin();
    ImportGlobal::ImportPublicControllerJs('Request');
?>
    </body>
</html>