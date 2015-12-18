<?php

namespace Classes;

class Helpers {

    public static function secure($user = '', $session_id = ''){

        if ($user != '') {
            $session_user = Database::getUserPassSession($user);
            $session_user = $session_user->password;
        } else {
            $session_user = 'none';
        }
        $session_admin = Config::adminSessionId();

        if ($session_id == '') {
            if ($session_id != $session_user || $session_id =! $session_admin) {
                session_start();
                session_destroy();
                header('Location: ../');
                die();
            }
        }
    }

    public static function translateLoggedToCircle($logged) {
        echo ($logged) ? "<div id='circlegreen'></div>" : "<div id='circlered'></div>";
    }

    public static function translateTimestampToDate($lastlogged) {
        $timestamp = $lastlogged;
        date_default_timezone_set(Config::$timezone);
        
        $date = date('H:i - j/n/Y', $timestamp);
        echo ($timestamp) ? $date : 0;
    }

    public static function defineLogButton($logged) {
        echo ($logged) ? "clock out" : "clock in";
    }
}