
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrarme</title>
    <?php require_once('../Imports/Global/Global.php');?>
    
    <?php 
        ImportGlobal::ImportMaterializeCss();
        ImportGlobal::ImportMaterialIcons();
        ImportGlobal::ImportIco();
        ImportGlobal::ImportFont();
        ImportGlobal::ImportFileCss('signup');
    ?>
</head>
<body>
<main>
<!--NavBar -->
<div class="navbar-fixed">
    <nav class="nav-extended green accent-4">
        <div class="nav-wrapper">
        <a href="/PopMovies/feed/home/main.php" class="brand-logo center">Illusion</a>
        <a href="" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>
</div>
<!-- SideNav -->
<ul class="sidenav" id="mobile-demo">
    <li><a>Salir</a></li>
</ul>
<div class="row">
    <div class="card col s12 m4 offset-m4" id="RegistrerCard">
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
                            <input id="Nickname" autocomplete="off" name="Nickname" type="text">
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
                    <button type="submit" id="btnSignUp" class="btn col s12 m6 offset-m3 green accent-4">Registrarme</button>
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
        <h5 class="white-text">Distribuira Illusion</h5>
        <p class="grey-text text-lighten-4">Tu organizador de eventos, más especializado</p>
        </div>
        <div class="col l4 offset-l2 s12">
        <h6 class="white-text">¡Puedes encontrarnos en donde sea!</h6>
        <ul>
            <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
        </ul>
        </div>
    </div>
</div>
</footer>    
<?php 
    ImportGlobal::ImportJQuery();
    ImportGlobal::ImportMaterializeJS();
    ImportGlobal::ImportJSFunctions();
    ImportGlobal::ImportRoutesJs();
    ImportGlobal::ImportControllerJs('SignUpController');
?>
</body>
</html>