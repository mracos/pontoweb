<?php 
session_start();

require_once('../../autoload.php');

use Classes\Database;
use Classes\Helpers;
use Classes\Dashboard;

if (isset($_GET['user'])) {
    extract($_GET);
    $session_id = $_SESSION['session_id'];
} else if (isset($_SESSION['user'])) {
    extract($_SESSION);
}

Helpers::secure($user, $session_id);
Dashboard::resetUser($user);

header('Location: ../');
die();