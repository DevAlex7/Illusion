<?php 
    /**
     * Aqui se van a declarar todos los permisos de los roles dados
     */
    class Permissions{

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
        public static function eventBar(){
            //If user is admin, he can create events
            if($_SESSION['Role']==0){
                print ('
                <div class="navbar-fixed">
                    <nav class="" id="Bar">
                        <div class="nav-wrapper">
                        <ul class="left hide-on-med-and-down">
                            <li><a > <i class="material-icons left">view_agenda</i> Ver eventos</a></li>
                            <li><a class="modal-trigger" href="#CreateEvent"> <i class="material-icons left">calendar_today</i> Crear evento</a></li>
                            <li><a href="/Illusion/private/eventcosts.php"> <i class="material-icons left"> attach_money </i> Gastos</a></li>
                        </ul>
                        </div>
                    </nav>
                </div>
                ');
            }
            else{
                 //If user is employee, he cant create events
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
        public static function addProduct(){
            if($_SESSION['Role']==0){
                print ('
                <div class="right">
                    <a href="#AddProducts" onclick="ListProducts();" class="btn left tooltipped modal-trigger"  data-position="left" data-tooltip="Agregar un producto al evento"> <i class="material-icons">add</i> </a>
                </div>
                ');
            }
            else{
            }
        }
        public static function addPersons(){
            if($_SESSION['Role']==0){

            }
            else{
                
            }
        }
        public static function hasTo_Edit_Eventname(){

        }
        public static function hasTo_Edit_Location(){

        }
        public static function hasTo_Edit_Eventinfo(){

        }
    }

?>