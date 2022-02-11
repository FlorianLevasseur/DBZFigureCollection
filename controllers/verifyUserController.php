<?php 
require_once "../models/User.php";
session_start();

$find = 0;

if(isset($_SESSION['id'])){
    $allUsersObj = new User();
    $allUsersArray = $allUsersObj->getAllUsers();
    foreach($allUsersArray as $user) {
        if($user['id'] == $_SESSION['id']){
            $_SESSION['admin'] = $user['admin'];
            $_SESSION['accepted'] = $user['accepted'];
            $find++;
            break;
        }
    }

    if($find == 0){
        session_unset();
        session_destroy();
        session_start();
        $_SESSION['unknow'] = "Compte inconnu";
        header('Location: /');
        exit();
    }

    if($_SESSION['accepted'] == 0){
        session_unset();
        session_destroy();
        session_start();
        $_SESSION['accept'] = "Compte non accepté";
        header('Location: connexion');
        exit();
    }


}