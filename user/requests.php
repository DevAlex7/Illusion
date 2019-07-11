<?php 
 require_once('../Imports/Global/Global.php');
 require_once('../Helpers/Home.php');
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Distribuidora Illussion | Solicitud de eventos</title>
        <?php 
            ImportGlobal::ImportMaterializeCss();
            ImportGlobal::ImportMaterialIcons(); 
            ImportGlobal::ImportIco();
            ImportGlobal::ImportFileCss('signupPublic');
        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body class='Aki'>
        <?php Userside::Navbar();?>
        <div class="row">
            <div class="card col s12 m6 offset-m3">
                <div class="card-content">
                    <span class="card-title">Solicitud de eventos</span>
                    <div class="row">
                        <form class="col s12" method="POST" id="RequestForm">
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="icon_prefix" type="text" name="nameEvent" id="nameEvent" required>
                                    <label for="icon_prefix">Nombre del evento</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">chrome_reader_mode</i>
                                    <select name="typeEvents" id="typeEvents"></select>
                                    <label for="typeEvents">Tipo de evento</label>
                                </div>
                                <div class="input-field col s4">
                                    <i class="material-icons prefix">accessibility</i>
                                    <input id="countPerson" name="countPerson" min="0" type="number" required>
                                    <label for="countPerson">Cantidad de personas</label>
                                </div>
                                <div class="input-field col s6">
                                    <input type = "date" name="date" required/>   
                                </div>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">list</i>
                                    <textarea name="descriptionEvent" id="descriptionEvent" cols="30" rows="10" class="materialize-textarea"></textarea>
                                    <label for="">Descripción del evento</label>
                                </div>
                            </div>
                            <div class="center">
                                <button type="sumbit" class="btn grey black-text" id="createRequest">Crear</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>            
        </div>
<?php 
   ImportGlobal::ImportJQuery();
   ImportGlobal::ImportMaterializeJS();
   ImportGlobal::ImportJSFunctions();
   ImportGlobal::ImportRoutesJs();
   ImportGlobal::ImportControllerJs('Request');
?>
</body>
</html>