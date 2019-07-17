<?php 
require_once('Imports/Global/Global.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php 
            ImportGlobal::ImportPublicMaterialIcons();
            ImportGlobal::ImportPublicMaterializeCss();
            ImportGlobal::publicIco();
            ImportGlobal::ImportPublicFileCss('signupPublic');
    ?>
    <title>Registrarme</title>
</head>
<body>
    <nav class="black">
       
    </nav>
    <div class="row">
        <div class="card col s12 m6 offset-m3">
            <div class="card-content">
            <div class="row">
                <form class="col s12" method="POST" id="FormRegistrer">
                    <div class="row">
                        <div class="input-field col s12 m10 offset-m1">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="NameUser" name="NameUser" type="text">
                            <label for="NameUser">Nombre</label>
                        </div>
                        <div class="input-field col s12 m10 offset-m1">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="LastName" name="LastName" type="text">
                            <label for="LastName">Apellido</label>
                        </div>
                        <div class="input-field col s12 m10 offset-m1">
                            <i class="material-icons prefix">mail</i>
                            <input id="EmailUser" name="EmailUser" type="text">
                            <label for="EmailUser">Correo</label>
                        </div>
                        <div class="input-field col s12 m10 offset-m1">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="Nickname" name="Nickname" type="text">
                            <label for="Nickname">Usuario</label>
                        </div>
                        <div class="input-field col s12 m10 offset-m1">
                            <i class="material-icons prefix">vpn_key</i>
                            <input id="pass" autocomplete="off" name="pass" type="password">
                            <label for="pass">Contraseña</label>
                        </div>
                        <div class="input-field col s12 m10 offset-m1">
                            <i class="material-icons prefix">vpn_key</i>
                            <input id="pass2" autocomplete="off" name="pass2" type="password">
                            <label for="pass2">Repita su contraseña</label>
                        </div>
                    </div>
                    <button type="submit" class="btn col s12 m6 offset-m3 green accent-4">Registrarme</button>
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
    ImportGlobal::ImportPublicControllerJs('Signup');
    ?>
</body>
</html>