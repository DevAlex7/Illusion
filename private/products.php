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
    ImportGlobal::ImportIco();
    ImportGlobal::ImportFileCss('products');
    ImportGlobal::ImportSidenavCss('sidenav');
    ImportGlobal::ImportFont();
?>
    <header>
        <?php AdminSideNav::SideNav(); ?> 
    </header>
    <main>
            <div class="fixed-action-btn">
                <a class="btn-floating modal-trigger tooltipped btn-large white " data-position="left" data-tooltip="Agregar producto" href="#AddProductModal">
                    <i class="large material-icons red-text">add</i>
                </a>
            </div>
            
            <div class="row" id="SearchBar">
                <div class="col s12 m12">
                    <nav class="white">
                        <div class="nav-wrapper">
                        <form id="SearchForm" method="POST">
                            <div class="input-field">
                                <input id="SearchInput" name="SearchInput" type="search" placeholder="Busca alguna información">
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
                                        <div class="file-field input-field col s12 m9" id="TimeSection">
                                            <div class="btn waves-effect">
                                                <span><i class="material-icons">image</i></span>
                                                <input 
                                                id="ProductImage" 
                                                type="file" 
                                                name="ProductImage" 
                                                required/>
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input type="text" class="file-path validate" placeholder="Seleccione una imagen"/>
                                            </div>
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
            
            <div class="modal" id="EditModalProduct">
                <div class="modal-content">
                    <div class="card">
                        <div class="card-content">
                            <form method="POST" id="FormEditProduct">
                                <div class="center"> <span class="card-title">Información general</span> </div>
                                <blockquote id="LineAllDetails">
                                    <input type="hidden" id="EditId" name="EditId">
                                    <input type="hidden" name="ImageEditProduct" id="ImageEditProduct">
                                    <span class="card-title" id="userResponsable"></span>
                                    <span class="card-title" id="dateProduct"></span>
                                    <div class="row">
                                        <div class="col s12 m7">
                                            <blockquote id="LineDetails">
                                                <label> <h6>Nombre de producto</h6> </label>
                                                <input type="text" name="EditNameProduct" id="EditNameProduct">
                                            </blockquote>
                                        </div>
                                        <div class="file-field input-field col s12 m9" id="TimeSection">
                                            <div class="btn waves-effect">
                                                <span><i class="material-icons">image</i></span>
                                                <input 
                                                id="FileEditCover" 
                                                type="file" 
                                                name="FileEditCover" 
                                                />
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input type="text" class="file-path validate" id="Image" placeholder="Seleccione una imagen"/>
                                            </div>
                                        </div>
 
                                        <div class="col s12 m7">
                                            <blockquote id="LineDetails">
                                                <label> <h6>Cantidad de producto</h6> </label>
                                                <input type="number" min="0" name="EditCountProduct" id="EditCountProduct">
                                                </blockquote>    
                                        </div>
                                        <div class="col s12 m7">
                                            <blockquote id="LineDetails">
                                                <label> <h6>Precio de producto</h6> </label>
                                                <input type="text" name="EditPriceProduct" id="EditPriceProduct">
                                            </blockquote>
                                        </div>
                                    </div>
                                </blockquote>
                                <div class="center">
                                    <button type="submit" class="btn green accent-4"> <i class="material-icons left">edit</i> Editar</button>
                                    <a class="btn grey modal-close"> <i class="material-icons left">close</i> Cancelar </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="DeleteProduct">
                <div class="modal-content">
                    <div class="card">
                        <div class="card-content">
                            <div class="center"> <span class="card-title"> ¿Deseas eliminar este producto? </span> </div>
                            <div class="modal-footer transparent">
                                <div class="center">
                                    <a onclick="confirmDelete()" class="btn red"> <i class="material-icons left">delete</i> Eliminar</a>
                                    <a class="btn modal-close grey"> <i class="material-icons left">close</i> Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <footer class="red">
        <?php ImportGlobal::ImportFooter(); ?>
    </footer>
<?php 
    ImportGlobal::ImportJQuery();
    ImportGlobal::ImportMaterializeJS();
    ImportGlobal::ImportMomentJS();
    ImportGlobal::ImportJSFunctions();
    ImportGlobal::ImportRoutesJs();
    ImportGlobal::ImportControllerJs('ProductsController');
?>
</body>
</html>