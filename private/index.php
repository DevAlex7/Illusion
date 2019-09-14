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
    <title>Login</title>
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
        <div class="card-content">
            <div class="row">
                <div class="col s12 m12">
                    <span class="card-title" id="saludate">Bienvenido a Party Supplies.</span>
                    <span class="grey-text" id="descriptionSaludate">Nos alegra verte, ingresa tus datos.</span>
                </div>
                <div class="col s12 m12">
                    <form class="col s12 m12" method="POST" id="FormLogin">
                        <div class="row">
                            <div class="input-field col s12 m12">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="Nickname" name="Nickname" type="text" placeholder="Usuario" autocomplete="off">
                            </div>
                            <div class="input-field col s12 m12">
                                <i class="material-icons prefix">vpn_key</i>
                                <input id="pass" autocomplete="off" name="pass" type="password" placeholder="Contraseña">
                            </div>
                        </div>
                        <button type="submit" class="btn col s12 m12 red" id="buttonLogin"> <i class="material-icons right">arrow_forward</i> <span id="buttonTitle">Entrar</span> </button>
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