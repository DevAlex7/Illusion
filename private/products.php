<?php 
    require_once('../Imports/Global/Global.php'); 
    require_once('../Helpers/Dashboard.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Productos</title>
</head>
<body>
<?php 
    ImportGlobal::ImportMaterializeCss();
    ImportGlobal::ImportMaterialIcons();
    ImportGlobal::ImportFileCss('products');
    ImportGlobal::ImportSidenavCss('sidenav');
?>
    <header>
        <?php AdminSideNav::SideNav(); ?> 
    </header>
    <main>
            <div class="fixed-action-btn">
                <a class="btn-floating modal-trigger tooltipped btn-large red" data-position="left" data-tooltip="Agregar producto" href="#AddProductModal">
                    <i class="large material-icons">add</i>
                </a>
            </div>
            
            <div class="row" id="SearchBar">
                <div class="col s12 m12">
                    <nav class="white">
                        <div class="nav-wrapper">
                        <form>
                            <div class="input-field">
                                <input id="SearchInput" type="search" placeholder="Busca algun producto...">
                                <label class="label-icon" for="search"><i class="material-icons black-text">search</i></label>
                                <i class="material-icons">close</i>
                            </div>
                        </form>
                        </div>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="center">
                    <h5 class="white-text">Productos</h5>
                </div>
            </div>

            <div class="row" id="ProductsRead">
                
            </div>            

            <div class="modal" id="AddProductModal">
                <div class="modal-content">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-panel green accent-4">
                                <span class="card-title white-text">Agregar Producto</span>
                            </div>
                            <div class="row">
                                <form class="col s12" method="POST" id="FormAddProduct">
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">shopping_basket</i>
                                            <input id="NameProduct" name="NameProduct" type="text">
                                            <label for="NameProduct">Nombre del Producto</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">exposure</i>
                                            <input id="CountStock" name="CountStock" min="0" type="number">
                                            <label for="CountStock">Cantidad de producto</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">attach_money</i>
                                            <input id="PriceProduct" name="PriceProduct" type="text" class="validate">
                                            <label for="PriceProduct">Precio del producto</label>
                                        </div>
                                    </div>
                                    <div class="center">
                                        <button type="submit" class="btn green accent-4"> <i class="material-icons left">add</i> Agregar</button>
                                        <a class="btn modal-close grey"> <i class="material-icons left">close</i> Cancelar </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <footer>

    </footer>
<?php 
    ImportGlobal::ImportJQuery();
    ImportGlobal::ImportMaterializeJS();
    ImportGlobal::ImportJSFunctions();
    ImportGlobal::ImportControllerJs('ProductsController');
?>
</body>
</html>