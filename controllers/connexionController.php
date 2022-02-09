<?php
require_once "../models/User.php";
session_start();
if(!empty($_SESSION['pseudo'])){
    header('Location: account.php');
    exit();
}


$arrayErrors = [];

if(!empty($_POST)) {
    $allUsersObj = new User();
    $allUsersArray = $allUsersObj->getAllUsers();

    foreach($allUsersArray as $user) {
        if($_POST['mail'] == $user['mail'] || $_POST['mail'] == $user['pseudo']) {
            if($_POST['password'] == $user['password']){
                session_start();
                $_SESSION['pseudo'] = $user['pseudo'];
                $_SESSION['id'] = $user['id'];
                $_SESSION['admin'] = $user['admin'];
                header('Location: account.php');
                exit();
            } else {
                $arrayErrors['connect'] = "Pseudo / Mail ou Mot de Passe incorrect";
            }
        } else {
            $arrayErrors['connect'] = "Pseudo / Mail ou Mot de Passe incorrect";
        }
    }
}