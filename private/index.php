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
    ?>
</head>
<body>
<main>
    
<!--NavBar -->
<div class="navbar-fixed">
    <nav class="nav-extended" id="NavBar">
        <div class="nav-wrapper">
            <a href="/PopMovies/feed/home/main.php" class="brand-logo center">Illusion</a>
        </div>
    </nav>
</div>
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
<footer class="page-footer" id="FooterPart">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <div class="card z-depth-3">
                    <div class="card-content">
                        <span class="blue-text">Distribuidora Illussion</span>
                    </div>
                </div>
            </div>
            <div class="col l4 offset-l2 s12">
            <div class="card z-depth-3">
                    <div class="card-content">
                        <span>Hola</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php 
    ImportGlobal::ImportJQuery();
    ImportGlobal::ImportMaterializeJS();
    ImportGlobal::ImportJSFunctions(); 
    ImportGlobal::ImportRoutesJs();
    ImportGlobal::ImportControllerJs('LoginController');
   
?>
</body>
</html>