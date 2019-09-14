<?php 
class AdminSideNav {
    public static function SideNav(){
        session_start();
        $filename = basename($_SERVER['PHP_SELF']);
        if(isset($_SESSION['idUser'])){
			$inactive = 1200; // Fórmula para obtener segundos (min * 60)
			$life = time() - $_SESSION['sessionTime'];
			//Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
			if ($life > $inactive) {
				session_destroy();
				header("Location: index.php");
			} else {  // si no ha caducado la sesion, se actualiza
				$_SESSION['tiempo'] = time();
			}
            if($filename != '../private/')
            {
                if($_SESSION['Role']==0){
                    self::modals();
                    print('
                    <ul id="slide-out" class="sidenav sidenav-fixed">
                        <li id="Sidenav">
                            <div class="user-view">
                            <div class="card center white-text" id="TitleSidenav">
                                    <span class="card-title">Illussion</span>
                                </div>
                                <a href="#name"><span class="black-text name">'. $_SESSION['UsernameActive'].'</span></a>
                                <a href="#email"><span class="black-text email" id="Name-sidenav">'. $_SESSION['NameUser'].' '.$_SESSION['LastnameUser'] .'</span></a>
                            </div>
                        </li>
                        <div id="OptionsBar">
                        <li><a class="green-text accent-4" href="/Illusion/private/home.php"><i class="material-icons green-text accent-4">dashboard</i>Inicio</a></li>
                        <li><a class="green-text accent-4" href="/Illusion/private/profile.php"><i class="material-icons green-text accent-4">person</i>Mi perfil</a></li>
                        <li><a class="green-text accent-4" href="/Illusion/private/binnacle.php"><i class="material-icons green-text accent-4">drag_indicator</i>Bitácora</a></li>
                        <li><a class="green-text accent-4" href="/Illusion/private/settings.php"><i class="material-icons green-text accent-4">block</i>Seguridad</a></li>
                        <li><div class="divider"></div></li>
                        <li><a class="subheader grey-text">Menu</a></li>
                        <li><a href="/Illusion/private/events.php"><i class="material-icons">calendar_today</i>Eventos</a></li>
                        <li><a href="/Illusion/private/typeevents.php"><i class="material-icons">subject</i>Tipos de eventos</a></li>
                        <li><a href="/Illusion/private/employees.php"><i class="material-icons">account_circle</i>Administradores</a></li>
                        <li><a href="/Illusion/private/products.php"><i class="material-icons">local_mall</i>Productos</a></li>
                        <li><a href="/Illusion/private/requests.php"><i class="material-icons">inbox</i>Solicitudes</a></li>
                        <li><a href="/Illusion/private/charts.php"><i class="material-icons">assessment</i>Estadísticas</a></li>
                        <li><div class="divider"></div></li>
                        <li><a href="#ModalCloseSession" class="modal-trigger"><i class="material-icons">exit_to_app</i>Cerrar Sesión</a></li>
                        </div>
                    </ul>  
                    ');
                }
                else if($_SESSION['Role']==1){
                    self::modals();
                    print('
                    <ul id="slide-out" class="sidenav sidenav-fixed">
                        <li id="Sidenav">
                            <div class="user-view">
                            <div class="card center white-text" id="TitleSidenav">
                                    <span class="card-title">Illussion</span>
                                </div>
                                <a href="#name"><span class="black-text name" id="Username-sidenav">'. $_SESSION['UsernameActive'].'</span></a>
                                <a href="#email"><span class="black-text email" id="Name-sidenav">'. $_SESSION['NameUser'].' '.$_SESSION['LastnameUser'] .'</span></a>
                            </div>
                        </li>
                        <div id="OptionsBar">
                        <li><a class="green-text accent-4" href="/Illusion/private/home.php"><i class="material-icons green-text accent-4">dashboard</i>Inicio</a></li>
                        <li><a class="green-text accent-4" href="/Illusion/private/profile.php"><i class="material-icons green-text accent-4">person</i>Mi perfil</a></li>
                        <li><a class="green-text accent-4" href="/Illusion/private/binnacle.php"><i class="material-icons green-text accent-4">drag_indicator</i>Bitacora</a></li>
                        <li><div class="divider"></div></li>
                        <li><a class="subheader grey-text">Menu Empleado</a></li>
                        <li><a href="/Illusion/private/events.php"><i class="material-icons">calendar_today</i>Eventos</a></li>
                        <li><a href="/Illusion/private/typeevents.php"><i class="material-icons">subject</i>Tipos de eventos</a></li>
                        <li><a href="/Illusion/private/products.php"><i class="material-icons">local_mall</i>Productos</a></li>
                        <li><a href="/PopMovies/feed/account/memberships.php"><i class="material-icons">inbox</i>Solicitudes</a></li>
                        <li><div class="divider"></div></li>
                        <li><a href="#ModalCloseSession" class="modal-trigger"><i class="material-icons">exit_to_app</i>Cerrar Sesión</a></li>
                        </div>
                    </ul>
                    ');  
                }
            }
            else
            {
                header('location:home.php');
            }
        }
        else{
            $filename = basename($_SERVER['PHP_SELF']);

            if($filename!= '../private/' && $filename != 'signup.php'){
                header('location:../private/');
            }
            else{
                print ('
                <header>
                <div class="navbar-fixed">
                    <nav class="teal">
                        <div class="nav-wrapper">
                            <a href="index.php" class="brand-logo"><i class="material-icons">dashboard</i></a>
                        </div>
                    </nav>
                </div>
                </header>
                <main class="container">
                <h3 class="center-align">Home</h3>
                ');
            }
        }
    }
    private function modals(){
        print('
        <div class="modal red" id="ModalCloseSession">
            <div class="modal-content col s5">
                <div class="card">
                    <div class="card-content center">
                        <span class="card-title">¿Desea cerrar sesión?</span>
                    </div>
                    <div class="card-action center">
                        <button class="btn red" onClick="LogOff()"> <i class="material-icons left">check</i> Aceptar</button>
                        <button class="btn grey modal-close"> <i class="material-icons left">close</i> Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
        ');
    }
}
?>
