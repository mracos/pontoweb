<?php
session_start();

require_once(__DIR__.DIRECTORY_SEPARATOR."autoload.php");

use Classes\Config;
use Classes\Database;
use Classes\Helpers;

// $user and $pass
extract($_POST);

$pass = hash('sha256', $pass);
$from_table = Database::getUserPassSession($user);
$admin = array(
            'user' => Config::$admin_user,
            'pass' => Config::$admin_pass,
            'session_id' => Config::adminSessionId()
        );

//checks if is admin
if ($user === $admin['user']) {
    if ($pass === $admin['pass']) {
        //set the session
        $_SESSION['session_id'] = $admin['session_id'];
        $_SESSION['user'] = $user;
    } else {
        //admin password not match
    }
} else {
    //checks if the given user exists
    if ($user === $from_table->user) {
        if ($pass === $from_table->password) {
            //set the session
            $_SESSION['session_id'] = $from_table->session_id;
            $_SESSION['user'] = $from_table->user;
        } else {
            //user password not the match
            
        }
    } else {
        //given user doesnt exists
    }
}

header('Location: ./dashboard/');
die();