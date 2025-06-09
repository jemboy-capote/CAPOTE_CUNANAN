<?php
require_once 'user-class.php';
session_start();

$user = new USER();

if (!$user->isUserLoggedIn()) {
    $user->redirect('../../../signin');
    exit();
}

if ($user->isUserLoggedIn() != "") {
    $user->logout();
    $user->redirect('../../../signin');
    exit();
}
?>