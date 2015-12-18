<?php 
session_start();

require_once('../../autoload.php');

use Classes\Database;
use Classes\Helpers;
use Classes\Dashboard;

// $user and $session_id
extract($_SESSION);
Helpers::secure($user, $session_id);

if (Database::getLoggedUser($user)) {
    Dashboard::clockOut($user);
} else {
    //n logado
    Dashboard::clockIn($user);
}

header('Location: ../');
die();