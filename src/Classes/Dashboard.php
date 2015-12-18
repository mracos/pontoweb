<?php

namespace Classes;

class Dashboard {

    public static function build($user, $session_id) {
        require_once('../views/header.php');
        if ($session_id === Config::adminSessionId()) {
            //build admin dashboard
            $data = Dashboard::returnAdminData();
            require_once('../views/admin.php');
        } else {
            //build user dashboard
            $user = Dashboard::returnUserData($user);
            require_once('../views/user.php');
        }
        require_once('../views/footer.php');
    }

    public static function returnUserData($user) {
        $data = Database::getAllUser($user);
        return $data;
    }

    public static function returnAdminData() {
        $data = Database::getAll();
        return $data;
    }

    public static function clockIn($user) {
        $logged = 1;
        $stamp = time();

        Database::clockIn($user, $logged, $stamp);
    }

    public function clockOut($user) {
        $old_stamp = Database::getStamp($user);
        $new_stamp = time();
        $logged = 0;
        $hours = ($new_stamp - $old_stamp)/3600;

        Database::clockOut($user, $logged, $hours, $new_stamp);
    }

    public function resetUser($user) {
        Database::resetUser($user);
    }

    public function deleteUser($user) {
        Database::deleteUser($user);
    }

    public function createUser($user, $pass) {
        Database::createUser($user, $pass);
    }

}