<?php
require_once "../controllers/verifyUserController.php";
require_once "../models/User.php";
if (!empty($_SESSION['pseudo'])) {
    header('Location: account');
    exit();
}


$arrayErrors = [];

if (!empty($_POST)) {
    $allUsersObj = new User();
    $allUsersArray = $allUsersObj->getAllUsers();

    foreach ($allUsersArray as $user) {
        if ($_POST['mail'] == $user['mail']) {
            if (password_verify($_POST['password'], $user['password'])) {
                if ($user['accepted'] != 0) {
                    session_start();
                    $_SESSION['pseudo'] = $user['pseudo'];
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['admin'] = $user['admin'];
                    $_SESSION['accepted'] = $user['accepted'];
                    $_SESSION['accept'] = "";
                    $_SESSION['create'] = "";
                    $_SESSION['upload'] = "";
                    $_SESSION['modif'] = "";
                    $_SESSION['delete'] = "";
                    $_SESSION['visible'] = "";
                    $_SESSION['unknow'] = "";
                    header('Location: account.php');
                    exit();
                } else {
                    $arrayErrors['connect'] = "Compte non accepté";
                    $_SESSION['accept'] = "Compte non accepté";
                    break;
                }
            } else {
                $arrayErrors['connect'] = "Pseudo / Mail ou Mot de Passe incorrect";
            }
        } else {
            $arrayErrors['connect'] = "Pseudo / Mail ou Mot de Passe incorrect";
        }
    }
}
