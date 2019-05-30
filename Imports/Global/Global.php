<?php 

class ImportGlobal{

    //To import the Global Materialize Library
    public static function ImportMaterializeCss(){
        print 
        '<link rel="stylesheet" href="../Imports/resources/css/global/materialize.min.css">';
    }
    //To import the file to put style page
    public static function ImportFileCss($fileCss){
        print
        '<link rel="stylesheet" href="../Imports/resources/css/utilities/'. $fileCss .'.css">';
    }
    public static function ImportMaterialIcons(){
        print 
        '<link rel="stylesheet" href="../Imports/resources/css/Global/material-icons.css">';
    }
    //To import the Global Jquery 
    public static function ImportJQuery(){
        print 
        '<script src="../Imports/resources/js/global/jquery-3.2.1.min.js"></script>';
    }
    //To import the Global Materialize Js
    public static function ImportMaterializeJS(){
        print 
        '<script src="../Imports/resources/js/global/materialize.min.js"></script>';
    }
    //To import the global JS functions
    public static function ImportJSFunctions(){
        print 
        '<script src="../Helpers/functions.js"></script>';
    }
    //To import the Controller that you will use :)
    public static function ImportControllerJs($Controller){
        print 
        '<script src="../Http/Controllers/'.$Controller.'.js"></script>';
    }
}
?>