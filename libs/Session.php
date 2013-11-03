<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Session
 *
 * @author alexander
 */
class Session {
    private static $__data = array();
    const SESSION_PATH = '/var/www/Sessions/sess_data/';
    const SESSION_NAME = 'MSESSID';
    private static $__session_id = null;
    
    public static function init() {
        if(isset($_COOKIE[self::SESSION_NAME])) {
            self::$__session_id = $_COOKIE[self::SESSION_NAME];
            self::load_data();
        } else {
            self::$__session_id = md5(time());
            setcookie(self::SESSION_NAME, self::$__session_id , -1);
        }
    }
    
    public static function load_data() {
        
        $data = file_get_contents(self::SESSION_PATH . 
                'sess_'.self::$__session_id);
        self::$__data = json_decode($data, true);
    }
    
    public static function close() {
        $data = json_encode(self::$__data);
        
        file_put_contents(self::SESSION_PATH . 
                'sess_'.self::$__session_id, $data);
    }
    
    public static function set($name, $val) {
        self::$__data[$name] = $val;
    }
    
    public static function get($name) {
        return self::$__data[$name];
    }
    
    public static function destroy() {
        file_put_contents(self::SESSION_PATH . 
                'sess_'.self::$__session_id, '');
    }
}

?>
