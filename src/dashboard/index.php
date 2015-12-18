<?php
session_start();

require_once("../autoload.php");

use Classes\Config;
use Classes\Database;
use Classes\Helpers;
use Classes\Dashboard;

// $user and $session_id
extract($_SESSION);

Helpers::secure($user, $session_id);
Dashboard::build($user, $session_id);