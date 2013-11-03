<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cookie
 *
 * @author alexander
 */
class Cookie {
    const KEY = 'private_password';
    
    static public function set($name, $value) {
        $value = self::__encode_data($value);
        setcookie($name, $value);
    }
    
    static public function get($name) {
        if(isset($_COOKIE[$name])) {
                       
            return self::__decode_data(data);
        }
        
        throw new Exception("Undefined cookie");
    }
    
    static private function __decode_data($data) {
        $data = base64_decode($_COOKIE[$name]);
            $data = gzuncompress($data);
            $data = mcrypt_decrypt(MCRYPT_3DES, self::KEY, $data, MCRYPT_MODE_CBC);
            
            return $data;
    }

    static private function __encode_data($data) {
        $data = mcrypt_encrypt(MCRYPT_3DES, self::KEY, $data, MCRYPT_MODE_CBC);
        $data = gzcompress($data);
        $data = base64_encode($data);
        
        return $data;
    }
}
?>
