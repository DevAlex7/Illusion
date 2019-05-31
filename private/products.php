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

    </main>
    <footer>

    </footer>
<?php 
  ImportGlobal::ImportJQuery();
  ImportGlobal::ImportMaterializeJS();
  ImportGlobal::ImportJSFunctions();
  ImportGlobal::ImportControllerJs('EventsController');
?>
</body>
</html>