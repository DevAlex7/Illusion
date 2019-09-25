<?php 
class AdminSideNav {
    public static function SideNav(){
        session_start();
        $filename = basename($_SERVER['PHP_SELF']);
        if( isset($_SESSION['idUser']) ){
            /*
			$inactive = 1200; // Fórmula para obtener segundos (min * 60)
			$life = time() - $_SESSION['time'];
			if ($life > $inactive) {
				session_destroy();
				header("Location: index.php");
			} else {
				$_SESSION['time'] = time();
			}
            */
            if($filename != '../private/')
            {
                if($_SESSION['Role']==0){
                    //Imprime las opciones  
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
                        <li><a id="home-item" class="" href="/Illusion/private/home.php"><i class="material-icons black-text" id="icon-home">dashboard</i> Inicio </a></li>
                        <li><a id="profile-item" class="" href="/Illusion/private/profile.php"><i class="material-icons black-text" id="icon-profile">person</i>Mi perfil</a></li>
                        <li><a id="binnacle-item" class="" href="/Illusion/private/binnacle.php"><i class="material-icons black-text" id="icon-binnacle" >drag_indicator</i>Bitácora</a></li>
                        <li><a id="security-item" class="" href="/Illusion/private/settings.php"><i class="material-icons black-text" id="icon-security" >block</i>Seguridad</a></li>
                        <li><a id="notify-item" class="" href="/Illusion/private/notifications.php"><i class="material-icons black-text" id="icon-notify">notification_important</i>Notificaciones</a></li>
                        <li><div class="divider"></div></li>
                        <li><a class="subheader grey-text">Menu</a></li>
                        <li><a id="events-item" href="/Illusion/private/events.php"><i class="material-icons black-text" id="icon-event">calendar_today</i>Eventos</a></li>
                        <li><a id="subject-item" href="/Illusion/private/typeevents.php"><i class="material-icons black-text" id="icon-subject">subject</i>Tipos de eventos</a></li>
                        <li><a id="admin-item" href="/Illusion/private/employees.php"><i class="material-icons black-text" id="icon-admin">account_circle</i>Administradores</a></li>
                        <li><a id="product-item" href="/Illusion/private/products.php"><i class="material-icons" id="icon-product">local_mall</i>Productos</a></li>
                        <li><a id="request-item" href="/Illusion/private/requests.php"><i class="material-icons" id="icon-request">inbox</i>Solicitudes</a></li>
                        <li><a id="graph-item" href="/Illusion/private/charts.php"><i class="material-icons" id="icon-graph">assessment</i>Estadísticas</a></li>
                        <li><div class="divider"></div></li>
                        <li><a href="#ModalCloseSession" class="modal-trigger"><i class="material-icons">exit_to_app</i>Cerrar Sesión</a></li>
                        </div>
                    </ul>  
                    ');
                }
                else if($filename == 'employees.php' || $filename == 'notifications.php' || $filename=='charts.php' && $_SESSION['Role'] == 1 ){
                    header('location:home.php');
                }
                else if($_SESSION['Role']==1){
                    //Imprime las opciones del empleado
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
                        <li><a id="home-item" class="" href="/Illusion/private/home.php"><i class="material-icons black-text" id="icon-home">dashboard</i> Inicio </a></li>
                        <li><a id="profile-item" class="" href="/Illusion/private/profile.php"><i class="material-icons black-text" id="icon-profile">person</i>Mi perfil</a></li>
                        <li><a id="binnacle-item" class="" href="/Illusion/private/binnacle.php"><i class="material-icons black-text" id="icon-binnacle" >drag_indicator</i>Bitácora</a></li>
                        <li><a id="security-item" class="" href="/Illusion/private/settings.php"><i class="material-icons black-text" id="icon-security" >block</i>Seguridad</a></li>
                        <li><div class="divider"></div></li>
                        <li><a class="subheader grey-text">Menu</a></li>
                        <li><a id="events-item" href="/Illusion/private/events.php"><i class="material-icons black-text" id="icon-event">calendar_today</i>Eventos</a></li>
                        <li><a id="subject-item" href="/Illusion/private/typeevents.php"><i class="material-icons black-text" id="icon-subject">subject</i>Tipos de eventos</a></li>
                        <li><a id="product-item" href="/Illusion/private/products.php"><i class="material-icons" id="icon-product">local_mall</i>Productos</a></li>
                        <li><a id="request-item" href="/Illusion/private/requests.php"><i class="material-icons" id="icon-request">inbox</i>Solicitudes</a></li>
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
            if($filename != '../private/' && $filename != 'signup.php'){
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
