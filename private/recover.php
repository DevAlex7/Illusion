<?php 
require_once('../Imports/Global/Global.php');
require_once('../Helpers/Roles.php');    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recuperar contraseña</title>
    <?php 
        ImportGlobal::ImportMaterializeCss();
        ImportGlobal::ImportMaterialIcons(); 
        ImportGlobal::ImportFileCss('index');
        ImportGlobal::ImportIco(); 
        ImportGlobal::ImportFont();
    ?>
</head>
<body>
<main>
<div class="row">
    <div class="card col s12 m4 offset-m4" id="LoginCard">
        <div class="card-content" id="content">
            <div class="row">
                <div class="col s12 m12">
                    <span class="card-title" id="saludate">Recuperar contraseña.</span>
                    <span class="grey-text" id="descriptionSaludate">Hemos enviado un codigo de verificación a tu correo para restablecer tu contraseña.</span>
                </div>
                <div class="col s12 m12">
                    <form class="col s12 m12" method="POST" id="recoverPass">
                        <div class="row">
                            <div class="input-field col s12 m12">
                                <i class="material-icons prefix">vpn_key</i>
                                <input id="code_verification" name="code_verification" type="text" placeholder="Codigo" autocomplete="off">
                            </div>
                        </div>
                        <button type="submit" class="btn col s12 m12 red" id="buttonLogin"> <i class="material-icons right">arrow_forward</i> <span id="buttonTitle">Verificar</span> </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
<?php 
    ImportGlobal::ImportJQuery();
    ImportGlobal::ImportMaterializeJS();
    ImportGlobal::ImportJSFunctions(); 
    ImportGlobal::ImportRoutesJs();
    ImportGlobal::ImportControllerJs('LoginController');
   
?>
</body>
</html>