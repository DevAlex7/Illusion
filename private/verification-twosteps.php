<?php 
require_once('../Imports/Global/Global.php');
require_once('../Helpers/AuthenticatorGenerator.php');
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
    <div class="card col s12 m4 offset-m4" id="Card-Authenticator">
        <div class="card-content">            
            <div id="divImage" class="center">
                <img src="../Imports/resources/pics/utilities/autenticator.png" id="imageAutenticator">
            </div>
            <div class="row">
                <div class="col s12 m12">
                    <span class="card-title" id="saludate">Paso 2: protege tu cuenta</span>
                    <span class="grey-text" id="descriptionSaludate">Con la aplicación de google Authenticator puedes escanear el codigo QR.</span>
                    
                    <div id="qr" class="center">
                        <?php print Authenticator::generateQR()['Qr'] ?>
                    </div>
                </div>
            </div>
            <form method="POST" id="verifyForm">
                <div class="row">
                    <div class="col s12 m8 offset-m2">
                        <input type="text" name="secret" value="<?php print Authenticator::generateQR()['key'] ?>">
                        <input type="text" class="center" name="code_verification" id="code_verification" placeholder="Ingresa el codigo">      
                    </div>
                </div>
                <div class="center">
                <button class="btn" id="buttonVerify">Verificar</button>
                </div>
            </form>
        </div>
    </div>
</div>

</main>
<?php 
    ImportGlobal::ImportJQuery();
    ImportGlobal::ImportMaterializeJS();
    ImportGlobal::ImportJSFunctions(); 
    ImportGlobal::ImportControllerJs('LoginAuth');
?>
</body>
</html>