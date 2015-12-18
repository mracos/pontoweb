<?php 
session_start();

require_once('../../autoload.php');

require_once('../../views/headerchoices.php');
require_once('../../views/createuser.php');
require_once('../../views/footerchoices.php');

use Classes\Database;
use Classes\Helpers;
use Classes\Dashboard;

// $user and $session_id
extract($_SESSION);
Helpers::secure($user, $session_id);

// $newuser $newpass
extract($_POST);

if (isset($newuser) && isset($newpass)) {
    Dashboard::createUser($newuser, $newpass);
    header('Location: ../');
    die();
}