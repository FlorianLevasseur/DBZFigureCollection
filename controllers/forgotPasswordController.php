<?php
require_once "../controllers/verifyUserController.php";

if (!empty($_SESSION['pseudo'])) {
    header('Location: account');
    exit();
}

$arrayErrors = [];

if (isset($_POST['submit'])) {
    $allUsersObj = new User();
    $allUsersArray = $allUsersObj->getAllUsers();

    if (empty($_POST['mail'])) {
        $arrayErrors['mail'] = "Champs non rempli";
    } else if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $arrayErrors['mail'] = "Format invalide";
    } else {
        foreach ($allUsersArray as $user) {
            if ($_POST['mail'] == $user['mail']) {
                $comb = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                $shfl = str_shuffle($comb);
                $pwd = substr($shfl, 0, 8);

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
                $mail->From = "dbzfigurecollection@gmail.com";
                $mail->FromName = 'Admin';
                $mail->Sender = 'dbzfigurecollection@gmail.com';
                $mail->AddReplyTo('dbzfigurecollection@gmail.com', 'Admin');
                $mail->Subject = 'Nouveau Mot de Passe DBZFigureCollection';
                $mail->Body = "<p>Bonjour,</p>
                <p>Suite à votre demande, nous vous envoyons par ce mail un nouveau mot de passe temporaire : <b>$pwd</b></p>
                <p>Veuillez utiliser ce dernier pour vous connecter, puis le modifier à votre convenance via votre page 'Mes Infos'</p>
                <p>Bonne continuation</p>";
                $mail->AddAddress($_POST['mail']);

                if (!$mail->Send()) {
                    $arrayErrors['mail'] = $mail->ErrorInfo;
                    break;
                } else {
                    $changePasswordObj = new User();
                    $changePasswordObj->setPassword($_POST['mail'], password_hash($pwd, PASSWORD_DEFAULT));
                    $_SESSION['changePassword'] = "Mot de passe modifié";
                    header('Location: connexion');
                    exit();
                }
            } else {
                $arrayErrors['mail'] = "Ce mail n'existe pas dans la base de donnée";
            }
        }
    }
}
