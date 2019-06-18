<?php 
    require_once('validates.php');
    require_once('../Backend/Models/Share_events.php');
    require_once('../Backend/Instance/instance.php');
    /**
     * Aqui se van a declarar todos los permisos de los roles dados
     */
    class Permissions {
        /**
         * Tipos de eventos
         */

        public static function addTypeEvent(){
            if($_SESSION['Role']==0){
                print('
                <div class="row">
                    <div class="col s12 m6 offset-m3">
                        <div class="card z-depth-5" id="NameTypeEventCard">
                            <div class="card-content">
                                <form method="POST" id="FormAddType">
                                    <div class="row">
                                        <div class="col s12 m9">
                                            <label for="NameTypeEvent">Tipo de evento</label>    
                                            <input name="NameTypeEvent" id="NameTypeEvent" type="text">
                                        </div>
                                        <div class="col s12 m1" id="BtnAddType">
                                            <button type="submit" class="btn" id="btnAdd">Listar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                ');
            }
            else{
            }
        }

        /**
         * Eventos
         */
        //Barra de eventos
        public static function eventsBar(){

            //Si el usuario es admin, puede crear eventos
            if($_SESSION['Role']==0){
                print ('
                <div class="navbar-fixed">
                    <nav class="" id="Bar">
                        <div class="nav-wrapper">
                        <ul class="left hide-on-med-and-down">
                            <li><a href="/Illusion/private/myevents.php"> <i class="material-icons left">view_agenda</i> Mis eventos</a></li>
                            <li><a href="/Illusion/private/events.php"> <i class="material-icons left">view_agenda</i> Ver eventos</a></li>
                            <li><a href="/Illusion/private/shares.php"> <i class="material-icons left">share</i>Eventos compartidos</a></li>
                            <li><a class="modal-trigger" href="#CreateEvent"> <i class="material-icons left">calendar_today</i> Crear evento</a></li>
                            <li><a href="/Illusion/private/eventcosts.php"> <i class="material-icons left"> attach_money </i> Gastos</a></li>
                        </ul>
                        </div>
                    </nav>
                </div>
                ');
            }
            else{
                 //Si es empleado no lo podra hacer
                print ('
                <div class="navbar-fixed">
                    <nav class="" id="Bar">
                        <div class="nav-wrapper">
                        <ul class="left hide-on-med-and-down">
                            <li><a > <i class="material-icons left">view_agenda</i> Ver eventos</a></li>
                            <li><a href="/Illusion/private/eventcosts.php"> <i class="material-icons left"> attach_money </i> Gastos</a></li>
                        </ul>
                        </div>
                    </nav>
                </div>
                ');
            }
        }

        public static function myEventsBar(){

            //Si el usuario es admin, puede crear eventos
            if($_SESSION['Role']==0){
                print ('
                <div class="navbar-fixed">
                    <nav class="" id="Bar">
                        <div class="nav-wrapper">
                        <ul class="left hide-on-med-and-down">
                            <li><a href="/Illusion/private/myevents.php"> <i class="material-icons left">view_agenda</i> Mis eventos</a></li>
                            <li><a href="/Illusion/private/events.php"> <i class="material-icons left">view_agenda</i> Ver eventos</a></li>
                            <li><a href="/Illusion/private/shares.php"> <i class="material-icons left">share</i>Eventos compartidos</a></li>
                            <li><a href="/Illusion/private/eventcosts.php"> <i class="material-icons left"> attach_money </i> Gastos</a></li>
                        </ul>
                        </div>
                    </nav>
                </div>
                ');
            }
            else{
                 //Si es empleado no lo podra hacer
                print ('
                <div class="navbar-fixed">
                    <nav class="" id="Bar">
                        <div class="nav-wrapper">
                        <ul class="left hide-on-med-and-down">
                            <li><a > <i class="material-icons left">view_agenda</i> Ver eventos</a></li>
                            <li><a href="/Illusion/private/eventcosts.php"> <i class="material-icons left"> attach_money </i> Gastos</a></li>
                        </ul>
                        </div>
                    </nav>
                </div>
                ');
            }
        }
        public static function sharesBar(){
            if($_SESSION['Role']==0){
                print ('
                <div class="navbar-fixed">
                    <nav class="" id="Bar">
                        <div class="nav-wrapper">
                        <ul class="left hide-on-med-and-down">
                            <li><a href="/Illusion/private/myevents.php"> <i class="material-icons left">view_agenda</i> Mis eventos</a></li>
                            <li><a href="/Illusion/private/events.php"> <i class="material-icons left">view_agenda</i> Ver eventos</a></li>
                            <li><a href="/Illusion/private/eventcosts.php"> <i class="material-icons left"> attach_money </i> Gastos</a></li>
                        </ul>
                        </div>
                    </nav>
                </div>
                ');
            }
            else{

            }
        }
        public static function AdminBar(){
            if($_SESSION['Role']==0){
                print('
                <div class="navbar-fixed">
                    <nav class="" id="Bar">
                        <div class="nav-wrapper">
                        <ul class="left hide-on-med-and-down">
                            <li><a class="modal-trigger" href="#CreateAdministrator"> <i class="material-icons left">person</i> Registrar administrador</a></li>
                        </ul>
                        </div>
                    </nav>
                </div>
                ');
            }
            else{

            }
        }
        /*public static function addProduct($event_id){
            if(Validate::Integer($event_id)->Id()){
                if(Validate::Integer( $_SESSION['idUser'] )->Id()){
                    if(ShareEvents::set()->id_event($event_id)->id_employee($_SESSION['idUser'])->existInEvent()){
                        print('
                            <div class="right">
                                <a href="#AddProducts" onclick="ListProducts();" class="btn left tooltipped modal-trigger"  data-position="left" data-tooltip="Agregar un producto al evento"> <i class="material-icons">add</i> </a>
                            </div>
                        ');
                    }
                    else{
                        print('
                            <div class="right">
                                <a href="#AddProducts" onclick="ListProducts();" class="btn disabled left tooltipped modal-trigger"  data-position="left" data-tooltip="Agregar un producto al evento"> <i class="material-icons">add</i> </a>
                            </div>
                        ');
                    }
                }
                else{
                    print '
                    <div class="right">
                        <p>Usuario invalido</p>
                    </div>
                    ';
                }   
            }
            else
            {
                print '
                <div class="right">
                    <p>Evento invalido</p>
                </div>
            ';
            }
        }*/
        /*public static function addPersons($event_id){
            if($_SESSION['Role']==0){
                print('
                <div class="right">
                    <button data-target="AddInvites" class="btn tooltipped modal-trigger" data-position="left" data-tooltip="Agregar un invitado al evento" > <i class="material-icons">add</i> </button>
                </div>
                ');
            }
            else{
            }
        }
        */
        /*public static function hasTo_Edit_Eventname($event_id){
            if($_SESSION['Role']==0){
                print('
                    <div class="right">
                        <a href="#ModalEditTitleEvent" onclick="editNameEvent()" class="modal-trigger"> <i class="material-icons left">edit</i> </a>
                    </div>
                ');
            }
            else{
            }
        }*/
        /*public static function hasTo_Edit_Location(){
            if($_SESSION['Role']==0){
                print('
                    <div class="right">
                        <a onclick="editMap()" href="#ModalEditMapEvent" class="modal-trigger"> <i class="material-icons">edit</i> </a>
                    </div>
                ');
            }
            else{
            }
        }
        */
        /*public static function hasTo_Edit_Eventinfo(){
            if($_SESSION['Role']==0){
                print('
                    <div class="right">
                      <a href="#EditInformationEvent" onclick="InfoEvent()" class="modal-trigger"> <i class="material-icons left">edit</i> </a>
                    </div>
                ');
            }
            else{
            }
        }*/
    }

?>