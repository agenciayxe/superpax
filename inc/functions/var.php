<?php 
class InfoVar {
    public static $variables = array();
    public static function show($varShow) {
        return self::$variables[$varShow];
    }
    public static function save($varSave) {
        return self::$variables = $varSave;
    }
}
?>