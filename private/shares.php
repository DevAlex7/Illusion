<?php 
    require_once('../Imports/Global/Global.php');   
    require_once('../Helpers/Dashboard.php');
    require_once('../Helpers/Roles.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Eventos </title>
    <?php 
        ImportGlobal::ImportMaterializeCss();
        ImportGlobal::ImportMaterialIcons();
        ImportGlobal::ImportFileCss('events');
        ImportGlobal::ImportFileCss('eventview');
        ImportGlobal::ImportSidenavCss('sidenav');
    ?> 
</head>
<body>
    <header>
        <?php AdminSideNav::SideNav(); ?>
    </header>
        <main>
            <!-- NavBar -->
            <?php 
                Permissions::sharesBar();
            ?>
            <div class="row" id="SearchBar">
                <div class="col s12 m12">
                    <nav class="white">
                        <div class="nav-wrapper">
                            <form id="SearchFormMyEvents" method="POST">
                                <div class="input-field">
                                    <input id="SearchMyEventsInput" name="SearchMyEventsInput" type="search" placeholder="Busca un evento o cliente">
                                    <label class="label-icon" for="search"><i class="material-icons black-text">search</i></label>
                                    <i class="material-icons">close</i>
                                </div>
                            </form>
                        </div>
                    </nav>
                </div>
            </div>

            <!-- Information -->
            <div class="row" id="Information">
            </div>

        </main>
        <footer>
        
        </footer>
<?php
    ImportGlobal::ImportJQuery();
    ImportGlobal::ImportMaterializeJS();
    ImportGlobal::ImportJSFunctions();
    ImportGlobal::ImportMomentJS();
    ImportGlobal::ImportControllerJs('SharesController');
?>