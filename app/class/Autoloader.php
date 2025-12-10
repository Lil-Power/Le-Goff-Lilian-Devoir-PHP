<?php
namespace App;

class Autoloader {
    static function register(){
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    static function autoload($class){
        /**Withdraw App\ and replace \ by / */ 
        $class = str_replace(__NAMESPACE__ . '\\', '', $class);
        
        $class = str_replace('\\', '/', $class);

    
        $fichier = __DIR__ . '/../App/' . $class . '.php';

        if(file_exists($fichier)){
            require_once $fichier;
        }
    }
}
