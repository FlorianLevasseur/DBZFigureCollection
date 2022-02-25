<?php
require_once "../controllers/verifyUserController.php";

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
                    $_SESSION['mail'] = $user['mail'];
                    $_SESSION['admin'] = $user['admin'];
                    $_SESSION['accepted'] = $user['accepted'];
                    $_SESSION['sort'] = "1";
                    $_SESSION['display'] = "1";
                    $_SESSION['accept'] = "";
                    $_SESSION['create'] = "";
                    $_SESSION['upload'] = "";
                    $_SESSION['modif'] = "";
                    $_SESSION['delete'] = "";
                    $_SESSION['visible'] = "";
                    $_SESSION['unknow'] = "";
                    $_SESSION['createSerie'] = "";
                    $_SESSION['addSerie'] = "";
                    $_SESSION['removeSerie'] = "";
                    $_SESSION['changePassword'] = "";
                    $_SESSION['contact'] = "";
                    header('Location: account');
                    exit();
                } else {
                    $arrayErrors['connect'] = "Compte non accepté";
                    $_SESSION['accept'] = "Compte non accepté";
                    break;
                }
            } else {
                $arrayErrors['connect'] = "Mail ou Mot de Passe incorrect";
            }
        } else {
            $arrayErrors['connect'] = "Mail ou Mot de Passe incorrect";
        }
    }
}
