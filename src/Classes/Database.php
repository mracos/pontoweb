<?php

namespace Classes;

try {
    //set the instance to be in a global variable
    global $db;
    $ds = DIRECTORY_SEPARATOR;
    $db = new \PDO('sqlite:'.__DIR__.$ds.'..'.$ds.'pontoweb.sqlite3');
} catch (PDOException $e) {
    // error to some array;
}

class Database {
    
    public static function getUserPassSession($user) {
        //set $db as the global $db so it is able to use it inside the method 
        global $db;
        $smtm = $db->prepare('SELECT user,password FROM pontoweb WHERE user = :user;');
        //bind the user to the variable
        $smtm->bindParam(':user', $user, \PDO::PARAM_STR);
        $smtm->execute();
        //return an object with the values of the user and the password
        $user_and_pass = $smtm->fetch(\PDO::FETCH_OBJ);
        $user_and_pass->session_id = md5($user_and_pass->password);

        return $user_and_pass;
    }

    public static function getSessionId($user) {
        $all = Database::getUserPassSession($user);

        return $all->session_id;
    }


    public static function getAllUser($user) {
        global $db;

        $smtm = $db->prepare("SELECT * FROM pontoweb WHERE user = :user;");
        $smtm->bindParam(':user', $user, \PDO::PARAM_STR);
        $smtm->execute();
        $allUser = $smtm->fetch(\PDO::FETCH_OBJ);

        return $allUser;
    }

    public static function getAll(){
        global $db;

        $smtm = $db->prepare('SELECT * FROM pontoweb;');
        $smtm->execute();
        $all = $smtm->fetchAll(\PDO::FETCH_ASSOC);

        return $all;
    }

    public static function getLoggedUser($user) {
        $all = Database::getAllUser($user);
        $logged = $all->logged;

        return $logged;
    }

    public static function getStamp($user) {
        $all = Database::getAllUser($user);

        return $all->stamp;
    }

    public function clockIn($user, $logged, $stamp) {
        global $db;

        $smtm = $db->prepare('UPDATE pontoweb SET 
                                logged = :logged,
                                stamp = :stamp,
                                lastlogged = 0
                                WHERE user = :user;'
                            );

        $smtm->bindParam(':logged', $logged, \PDO::PARAM_INT);
        $smtm->bindParam(':stamp', $stamp, \PDO::PARAM_INT);
        $smtm->bindParam(':user', $user, \PDO::PARAM_STR);
        $smtm->execute();
    }

    public function clockOut($user, $logged, $hours, $last_logged) {
        global $db;

        $smtm = $db->prepare('UPDATE pontoweb SET
                                logged = :logged,
                                stamp = 0,
                                lastlogged = :last_logged,
                                hours = hours + :hours
                                WHERE user = :user;'
                            );
        $smtm->bindParam(':logged', $logged, \PDO::PARAM_INT);
        $smtm->bindParam(':last_logged', $last_logged, \PDO::PARAM_INT);
        $smtm->bindParam(':hours', $hours, \PDO::PARAM_STR);
        $smtm->bindParam(':user', $user, \PDO::PARAM_STR);
        $smtm->execute();
    }

    public static function createUser($user, $pass) {
        global $db;
        $pass = hash('sha256', $pass);

        $smtm = $db->prepare('INSERT INTO pontoweb VALUES(:user, :pass, 0, 0, 0, 0);');
        $smtm->bindParam(':user', $user, \PDO::PARAM_STR);
        $smtm->bindParam(':pass', $pass, \PDO::PARAM_STR);
        $smtm->execute();
    }

    public static function resetUser($user) {
        global $db;

        $smtm = $db->prepare('UPDATE pontoweb SET
                                logged = 0,
                                stamp = 0,
                                lastlogged = 0,
                                hours = 0
                                WHERE user = :user;'
                            );
        $smtm->bindParam(':user', $user, \PDO::PARAM_STR);
        $smtm->execute();
    } 

    public static function deleteUser($user) {
        global $db;

        $smtm = $db->prepare('DELETE from pontoweb WHERE user = :user;');
        $smtm->bindParam(':user', $user, \PDO::PARAM_STR);
        $smtm->execute();
    }
}