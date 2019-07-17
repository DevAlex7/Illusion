<?php 
 require_once('../Imports/Global/Global.php');
?>
<!doctype html>
<html lang="es">
<!-- Página para señalar que un objeto no ha sido encontrado en el sistema. -->
    <head>
        <meta charset="utf-8">
        <title>ERROR 404: ¡Objeto no localizado pierdete bro!</title>
            <?php
                ImportGlobal::publicIco();
                ImportGlobal::ImportPublicMaterializeCss();
                ImportGlobal::ImportPublicMaterialIcons();
                ImportGlobal::publicStyle();
            ?>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <body>
        <div class='center-align'>
            <h3>Error 404: Objeto no localizado.</h3>
            <a href='/illusion/'><i class="medium material-icons">restore</i></a>
        </div>
    </body>
</html>