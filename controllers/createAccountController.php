<?php
require_once "../controllers/verifyUserController.php";
require_once "../models/User.php";

if(isset($_SESSION['pseudo'])){
    header('Location: account.php');
    exit();
}

$arrayErrors = [];
$alreadyPseudo = 0;
$alreadyMail = 0;

if(isset($_POST['submit'])){
    $allUsersObj = new User();
    $allUsersArray = $allUsersObj->getAllUsers();
    foreach($allUsersArray as $user) {
        if($user['pseudo'] == $_POST['pseudo']) {
            $alreadyPseudo++;
        }
        if($user['mail'] == $_POST['mail']){
            $alreadyMail++;
        }
    }
    if(empty($_POST['pseudo'])){
        $arrayErrors['pseudo'] = "Champs non rempli";
    } else if($alreadyPseudo != 0) {
        $arrayErrors['pseudo'] = "Pseudo déjà utilisé";
    }

    if(empty($_POST['mail'])){
        $arrayErrors['mail'] = "Champs non rempli";
    } else if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $arrayErrors['mail'] = "Format invalide";
    } else if($alreadyMail != 0) {
        $arrayErrors['mail'] = "Mail déjà utilisé";
    }

    if(empty($_POST['password'])){
        $arrayErrors['password'] = "Champs non rempli";
    }

    if(empty($_POST['confirmPassword'])){
        $arrayErrors['confirmPassword'] = "Champs non rempli";
    } else if($_POST['confirmPassword'] != $_POST['password']) {
        $arrayErrors['confirmPassword'] = "Mots de Passe non identiques";
    }

    if(empty($_POST['g-recaptcha-response'])){
        $arrayErrors['captcha'] = "Veuillez confirmer le CAPTCHA";
    }

    if(empty($arrayErrors)) {
        $pseudo = htmlspecialchars(trim($_POST['pseudo']));
        $mail = htmlspecialchars(trim($_POST['mail']));
        $password = htmlspecialchars(trim($_POST['password']));

        $addUserObj = new User();
        $addUserObj->addUser($pseudo, password_hash($password, PASSWORD_DEFAULT), $mail, 0, 0);
        $_SESSION['create'] = "Compte créé";
        header('Location: /');
        exit();
    }
}

