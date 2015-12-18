<?php

namespace Classes;

class Config {
    
    public static $admin_user = "admin";
    // the admin_pass needs to be an sha256 hash, it can be generated with the
    // following code 'php -r "echo hash('sha256', 'password here');"'
    // here is the hash for admin
    public static $admin_pass = "8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918"; //pass=admin

    public static $first_time = false;

    //here you set the timezone, you can see the list of avaiable ones here
    //http://php.net/manual/pt_BR/timezones.php
    //default one is America/Belem
    public static $timezone = 'America/Belem';
    
    public static function adminSessionId() {
        return md5(Config::$admin_pass);
    }
}
