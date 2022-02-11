<?php
require_once "../controllers/verifyUserController.php";
require_once "../models/Personal_Picture.php";

if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin'] != 0) {
        if (!empty($_GET['id'])) {
            $allPicturesObj = new Personal_Picture();
            $allPicturesArray = $allPicturesObj->getAllPictures();
            foreach ($allPicturesArray as $picture) {
                if ($picture['id'] == $_GET['id']) {
                    $pictureDetailsObj = new Personal_Picture();
                    $pictureDetailsArray = $pictureDetailsObj->getAllPicturesDetails($_GET['id']);
                    break;
                } else {
                    $pictureDetailsArray = [];
                }
            }
            if (!empty($pictureDetailsArray)) {
                $myPictureObj = new Personal_Picture();
                $myPicture = $myPictureObj->getPicture(intval($_GET['id']));
            } else {
                $_GET['id'] = 0;
                $myPicture = [];
            }
        } else {
            $_GET['id'] = 0;
            $myPicture = [];
        }
    }
}

$arrayErrors = [];

if (isset($_POST['submitVisible'])) {
    if ($_POST['visible'] != 0 && $_POST['visible'] != 1) {
        $arrayErrors['visible'] = "Valeur incorrecte";
    }

    if (empty($_POST['g-recaptcha-response'])) {
        $arrayErrors['captcha'] = "Veuillez confirmer le CAPTCHA";
    }

    if (empty($arrayErrors)) {
        $visible = htmlspecialchars(trim($_POST['visible']));

        $modifPictureObj = new Personal_Picture();
        $modifPictureObj->modifPicture(intval($_GET['id']), intval($visible));

        $_SESSION['visible'] = $visible;
        header('Location: adminGallery');
        exit();
    }
}

if (isset($_POST['deletePicture'])) {
    $deletePictureObj = new Personal_Picture();
    $deletePictureInfos = $deletePictureObj->getPicture(intval($_GET['id']));
    $deletePictureObj->deletePicture(intval($_GET['id']));
    unlink("../assets/uploadedPictures/" . $deletePictureInfos['picture']);

    $_SESSION['delete'] = $deletePictureInfos['picture'];
    header('Location: adminGallery');
    exit();
}
