<?php
require_once "../controllers/verifyUserController.php";

if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin'] != 0) {
        if (!empty($_GET['id'])) {
            $allUsersObj = new User();
            $allUsersArray = $allUsersObj->getAllUsers();
            foreach ($allUsersArray as $user) {
                if ($user['id'] == $_GET['id']) {
                    $userDetailsObj = new User();
                    $userInfos = $userDetailsObj->getUser(intval($_GET['id']));
                    break;
                } else {
                    $userInfos = [];
                }
            }
            if (empty($userInfos)) {
                $_GET['id'] = 0;
            }
        } else {
            $_GET['id'] = 0;
            $userInfos = [];
        }
    }
}

$arrayErrors = [];
$alreadyPseudo = 0;
$alreadyMail = 0;

if (isset($_POST['submitModif'])) {
    $allUsersObj = new User();
    $allUsersArray = $allUsersObj->getAllUsers();
    foreach ($allUsersArray as $user) {
        if ($user['id'] != $userInfos['id']) {
            if ($user['pseudo'] == $_POST['pseudo']) {
                $alreadyPseudo++;
            }
            if ($user['mail'] == $_POST['mail']) {
                $alreadyMail++;
            }
        }
    }
    if (empty($_POST['pseudo'])) {
        $arrayErrors['pseudo'] = "Champs non rempli";
    } else if ($alreadyPseudo != 0) {
        $arrayErrors['pseudo'] = "Pseudo déjà utilisé";
    }

    if (empty($_POST['mail'])) {
        $arrayErrors['mail'] = "Champs non rempli";
    } else if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $arrayErrors['mail'] = "Format invalide";
    } else if ($alreadyMail != 0) {
        $arrayErrors['mail'] = "Mail déjà utilisé";
    }

    if ($_POST['admin'] != 0 && $_POST['admin'] != 1) {
        $arrayErrors['admin'] = "Valeur incorrecte";
    }

    if ($_POST['accepted'] != 0 && $_POST['accepted'] != 1) {
        $arrayErrors['admin'] = "Valeur incorrecte";
    }

    if (empty($arrayErrors)) {
        $pseudo = htmlspecialchars(trim($_POST['pseudo']));
        $mail = htmlspecialchars(trim($_POST['mail']));
        $admin = htmlspecialchars(trim($_POST['admin']));
        $accepted = htmlspecialchars(trim($_POST['accepted']));

        $modifUserObj = new User();
        $modifUserObj->modifUser(intval($_GET['id']), $pseudo, $mail, intval($admin), intval($accepted));
        if ($_SESSION['id'] == $_GET['id']) {
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['admin'] = $admin;
            $_SESSION['accepted'] = $accepted;
        }
        if ($_SESSION['accepted'] == 0) {
            session_unset();
            session_destroy();
            session_start();
            $_SESSION['accept'] = "Compte non accepté";
            header('Location: connexion');
            exit();
        }
        $_SESSION['modif'] = $pseudo;
        header('Location: adminUser');
        exit();
    }
}

if (isset($_POST['delete'])) {
    $deleteUserObj = new User();
    $deleteUserInfos = $deleteUserObj->getUser(intval($_GET['id']));
    $deletePicturesObj = new Personal_Picture();
    $deletePicturesArray = $deletePicturesObj->getAllPictures();
    foreach ($deletePicturesArray as $picture) {
        if ($picture['id_user'] == $_GET['id']) {
            unlink("../assets/uploadedPictures/" . $picture['picture']);
        }
    }
    $deleteUserObj->deleteUser(intval($_GET['id']));
    if ($_SESSION['id'] == $_GET['id']) {
        session_unset();
        session_destroy();
        session_start();
        $_SESSION['delete'] = $deleteUserInfos['pseudo'];
        header('Location: /');
        exit();
    }
    $_SESSION['delete'] = $deleteUserInfos['pseudo'];
    header('Location: adminUser');
    exit();
}
