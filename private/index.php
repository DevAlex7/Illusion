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
    
    <!-- BEGIN: Navbar -->
    <header>
            <nav class="grey darken-4">
                <div class="brand-sidebar black">
                    <a class="brand-logo center">
                        <img src="/Illusion/Imports/resources/pics/utilities/ico.png" alt="ico-illusion" height="25">
                        <span class="white-text">Illussion Party Supplies</span>
                    </a>
                </div>
            </nav>
        </header>
    <!-- END: Navbar -->
<!-- SideNav -->
<ul class="sidenav" id="mobile-demo">
    <li><a>Salir</a></li>
</ul>

<div class="row">
    <div class="card col s12 m4 offset-m4" id="LoginCard">
        <div class="card-content">
            <div class="row">
                <form class="col s12" method="POST" id="FormLogin">
                    <div class="row">
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
                    </div>
                    <button type="submit" class="btn col s12 m6 offset-m3 red">Entrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
</main>
        <!-- BEGIN: Footer -->
        <footer class="page-footer grey darken-4">
                <div class="container">
                    <div class="row">
                        <div class="col 16 s12">
                            <h5 class="white-text">Distribuidora Illussion</h5>
                            <p class="grey-text text-lighten-4">Todo tipo de decoración y accesorios para fiestas y eventos.</p>
                        </div>
                    </div>
                </div>
                <div class="footer-copyright black">
                    <div class="container">
                    © 2019 Copyright Illussion Party Supplies
                    <a class="grey-text text-lighten-4 right">Todos los derechos reservados</a>
                    </div>
                </div>
            </footer>
        <!-- END: Footer -->
<?php 
    ImportGlobal::ImportJQuery();
    ImportGlobal::ImportMaterializeJS();
    ImportGlobal::ImportJSFunctions(); 
    ImportGlobal::ImportRoutesJs();
    ImportGlobal::ImportControllerJs('LoginController');
   
?>
</body>
</html>