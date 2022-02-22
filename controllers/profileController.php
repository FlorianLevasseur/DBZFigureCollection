<?php
require_once "../controllers/verifyUserController.php";

if(!isset($_SESSION['pseudo'])){
    header('Location: connexion');
    exit();
}

if(!isset($_GET['id'])){
    $_GET['id'] = 0;
}

$existUser = 0;

$allUsersObj = new User();
$allUsersArray = $allUsersObj->getAllUsers();
foreach($allUsersArray as $user){
    if($_GET['id'] == $user['id']){
        $existUser++;
        break;
    }
}

$userInfosObj = new User();
$userInfos = $userInfosObj->getUser(intval($_GET['id']));
$arrayErrors = [];

if(isset($_POST['submit'])) {
    if(empty($_POST['actualPassword'])){
        $arrayErrors['actualPassword'] = "Champs non rempli";
    } else if(!password_verify($_POST['actualPassword'], $userInfos['password'])){
        $arrayErrors['actualPassword'] = "Mot de passe incorrect";
    }

    if(empty($_POST['newPassword'])){
        $arrayErrors['newPassword'] = "Champs non rempli";
    }

    if(empty($_POST['confirmPassword'])){
        $arrayErrors['confirmPassword'] = "Champs non rempli";
    } else if($_POST['confirmPassword'] != $_POST['newPassword']) {
        $arrayErrors['confirmPassword'] = "Mots de Passe non identiques";
    }

    if(empty($arrayErrors)){
        $newPassword = htmlspecialchars(trim($_POST['newPassword']));

        $changePassword = new User();
        $changePassword->setPassword($userInfos['mail'], password_hash($newPassword, PASSWORD_DEFAULT));
        $_SESSION['changePassword'] = "Votre mot de passe a bien été modifié !";
    }
}