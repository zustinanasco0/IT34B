<?php


require_once'config/config.php';
require_once'includes/activity-logger.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $action = trim($_POST['action'] ?? '');

    $user_id = $_SESSION['user_id'] ?? null;
    $user_email = $_SESSION['user_email'] ?? null;

}


?>