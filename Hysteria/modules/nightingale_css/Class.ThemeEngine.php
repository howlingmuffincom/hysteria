<?php
class ThemeEngine {

    public function __construct() {
        self::EvokeTheme();
    }
    
    public static function modSelfIni() {
        $modConfig = parse_ini_file( $_SERVER['DOCUMENT_ROOT'] . '/hysteria/core/config/modules.ini');
        if($modConfig['nightingale'] == 1) {
            return true;
        }
        else {
            return false;
        }
    }

    public static function EvokeTheme() { 
        if(self::modSelfIni()) {
            $modConfig = parse_ini_file( $_SERVER['DOCUMENT_ROOT'] . '/hysteria/themes/config.themes.ini');
            
            foreach($modConfig as $key => $value) {
                if($value == 1) {
                    self::activateTheme($key);
                }
            }
        }
        else {
            echo 'ThemeEngine is deactivated. Please activate "nightingale" in core/config/modules.ini<br />';
        }
    }
    
    public static function activateTheme($themeName) {
        include $_SERVER['DOCUMENT_ROOT'] . '/hysteria/themes/custom/' . $themeName . '/main.html';
        include $_SERVER['DOCUMENT_ROOT'] . '/hysteria/core/includes/inc/head_close.php';
    }
}