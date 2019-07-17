<?php 
class Userside {
    public static function Navbar(){
        session_start();
        $filename = basename($_SERVER['PHP_SELF']);
        if(isset($_SESSION['idPublicUser'])){
            
            if($filename != '../user/')
            {
                self::modals();
                print('
                <div class="navbar-fixed">
                <nav class="nav-extended" id="NavBar">
                    <div class="nav-wrapper">
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="#ModalCloseSession" class="modal-trigger"> <i class="material-icons left">close</i> Cerrar Sesión</a></li>
                    </ul>
                    </div>
                </nav>
                </div>
                ');
            }
            else
            {
                header('location:requests.php');
            }
        }
        else{
            $filename = basename($_SERVER['PHP_SELF']);
            if($filename!='login.php' && $filename != 'signup.php'){
                header('location:../');
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
                        <button class="btn red" onClick="LogOffPublic()"> <i class="material-icons left">check</i> Aceptar</button>
                        <button class="btn grey modal-close"> <i class="material-icons left">close</i> Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
        ');
        }
    }
?>