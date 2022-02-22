<?php
require_once "../controllers/verifyUserController.php";

$arrayErrors = [];

if (isset($_POST['submit'])) {

    if (empty($_POST['pseudo'])) {
        $arrayErrors['pseudo'] = "Champs non rempli";
    }

    if (empty($_POST['mail'])) {
        $arrayErrors['mail'] = "Champs non rempli";
    } else if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $arrayErrors['mail'] = "Format invalide";
    }

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
        $name = htmlspecialchars(trim($_POST['pseudo']));
        $email = htmlspecialchars(trim($_POST['mail']));
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
        $mail->From = "$email";
        $mail->FromName = "$name";
        $mail->Sender = "$email";
        $mail->AddReplyTo("$email", "$name");
        $mail->Subject = "$subject";
        $mail->Body = nl2br($message);
        $mail->AddAddress('dbzfigurecollection@gmail.com');


        if (!$mail->Send()) {
            $arrayErrors['send'] = $mail->ErrorInfo;
        } else {
            $_SESSION['contact'] = "Votre mail a bien été envoyé !";
            header('Location: /');
            exit();
        }
    }
}
