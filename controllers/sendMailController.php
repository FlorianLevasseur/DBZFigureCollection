<?php
require_once "../controllers/verifyUserController.php";

if(empty($_GET['id'])){
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


if (isset($_POST['submit'])) {

    if (empty($_POST['subject'])) {
        $arrayErrors['subject'] = "Champs non rempli";
    }

    if (empty($_POST['message'])) {
        $arrayErrors['message'] = "Champs non rempli";
    }

    if (empty($_POST['g-recaptcha-response'])) {
        $arrayErrors['captcha'] = "Veuillez confirmer le CAPTCHA";
    }

    if (empty($arrayErrors)) {

        $subject = htmlspecialchars(trim($_POST['subject']));
        $message = htmlspecialchars(trim($_POST['message']));

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->Username = 'dbzfigurecollection@gmail.com';
        $mail->Password = MAILPASSWORD;
        $mail->CharSet = 'UTF-8';
        $mail->IsHTML(true);
        $mail->From = $_SESSION['mail'];
        $mail->FromName = $_SESSION['pseudo'];
        $mail->Sender = $_SESSION['mail'];
        $mail->AddReplyTo($_SESSION['mail'], $_SESSION['pseudo']);
        $mail->Subject = "$subject";
        $mail->Body = nl2br($message) . nl2br("\n\nCe message vous a été envoyé par " . $_SESSION['pseudo'] . " via l'adresse mail : " . $_SESSION['mail'] . ".\nVous pouvez y répondre directement en répondant à ce mail.");
        $mail->AddAddress($userInfos['mail']);


        if (!$mail->Send()) {
            $arrayErrors['send'] = $mail->ErrorInfo;
        } else {
            $_SESSION['contact'] = "Votre mail a bien été envoyé !";
            header('Location: /');
            exit();
        }
    }
}
