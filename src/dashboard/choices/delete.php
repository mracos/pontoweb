<?php 
session_start();

require_once('../../autoload.php');

use Classes\Database;
use Classes\Helpers;
use Classes\Dashboard;
use Classes\Config;

if (isset($_GET['usertodelete'])) {
    extract($_GET);
    $session_id = $_SESSION['session_id'];
} else if (isset($_SESSION['user'])) {
    extract($_SESSION);
}

Helpers::secure($user, $session_id);

if (isset($usertodelete)) {
    Dashboard::deleteUser($usertodelete);
    header('Location: ../');
    die();
} else if ($user != Config::$admin_user) {
    Dashboard::deleteUser($user);
    Helpers::secure();
}