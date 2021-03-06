<?php
require_once('Imports/Global/Global.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <?php
    ImportGlobal::ImportPublicMaterialIcons();
    ImportGlobal::ImportPublicMaterializeCss();
    ImportGlobal::publicIco();
    ImportGlobal::ImportFont();
    ImportGlobal::ImportPublicFileCss('signupPublic');
    ?>
</head>

<body>
    <main>
        <!--NavBar -->
        <div class="navbar-fixed">
            <nav class="nav-extended black">
                <div class="nav-wrapper">
                    <a class="brand-logo center" href="index.php">
                        <img src="Imports/resources/pics/utilities/ico.png" alt="icon" height="25">
                        <span class="white-text">Illusion Party Supplies</span>
                    </a>
                    <a href="" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
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
                            <div class="col s12 m12">
                                <span class="card-title" id="saludate">Bienvenido a Illusion.</span>
                                <span class="grey-text" id="descriptionSaludate">Nos alegra verte, ingresa tus datos.</span>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m10 offset-m1">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="Nickname" name="Nickname" type="text" autocomplete="off">
                                    <label for="Nickname">Usuario</label>
                                </div>
                                <div class="input-field col s12 m10 offset-m1">
                                    <i class="material-icons prefix">vpn_key</i>
                                    <input id="pass" autocomplete="off" name="pass" type="password">
                                    <label for="pass">Contraseña</label>
                                </div>
                                <div class="input-field col s12 center">
                                    <p class="margin medium-small">
                                        <a href="signup.php">¿No tienes una cuenta? ¡Registrate en Illusion Party Supplies!</a>
                                    </p>
                                </div>
                            </div>
                            <button type="submit" class="btn col s12 m6 offset-m3 black">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
    ImportGlobal::ImportPublicJQuery();
    ImportGlobal::ImportPublicMaterializeJS();
    ImportGlobal::ImportPublicJSFunctions();
    ImportGlobal::ImportPublicPlugin();
    ImportGlobal::ImportPublicControllerJs('Signup');
    ?>
</body>

</html>