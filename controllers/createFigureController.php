<?php
require_once "../controllers/verifyUserController.php";

$arrayErrors = [];
$alreadyFullName = 0;
$existCompany = 0;

/**
 * Vérification de l'existance de l'Éditeur dans la base de données
 */
$allFiguresObj = new Figure();
$allCompaniesArray = $allFiguresObj->getAllCompanies();
if (isset($_POST['id_company'])) {
    foreach ($allCompaniesArray as $company) {
        if ($company['id'] == $_POST['id_company']) {
            $existCompany++;
        }
    }
}

if (isset($_POST['submitCreate'])) {
    /**
     * Vérification de l'existance du nom complet dans la base de données
     */
    $allFiguresObj = new Figure();
    $allFiguresArray = $allFiguresObj->getAllFigures();
    foreach ($allFiguresArray as $figure) {
        if ($figure['full_name'] == $_POST['full_name']) {
            $alreadyFullName++;
        }
    }

    /**
     * Vérification du type de fichier et de l'extension pour upload de l'image de la figurine 
     */
    if (empty($_FILES['fileToUpload']['name'])) {
        $arrayErrors['fileToUpload'] = "Veuillez choisir une image";
    } else if ($_FILES['fileToUpload']['error'] != 0) {
        $arrayErrors['fileToUpload'] = "Votre fichier n'a pas pu être uploadé.";
    } else {
        $ext = "jpg jpeg png";
        $target_dir = "../assets/pictures/";
        $target_name = $_FILES['fileToUpload']['name'];
        $target_array = explode(".", $_FILES['fileToUpload']['name']);
        $target_extension = end($target_array);
        $target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
        $uploadOk = 1;
        $check = @getimagesize($_FILES['fileToUpload']['tmp_name']);
        if ($check == false) {
            $arrayErrors['format'] = "Votre fichier n'est pas une image.";
            $uploadOk = 0;
        } else if (strpos($ext, $target_extension) === false) {
            $arrayErrors['type'] = "Votre fichier n'est pas de type jpg, jpeg ou png.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            $arrayErrors['nok'] = "Votre fichier n'a pas été Upload.";
        } else if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $success = "Le fichier " . htmlspecialchars(basename($target_name)) . " a bien été uploadé.";
        }
    }

    /**
     * Vérification du type de fichier et de l'extension pour upload de la miniature de la figurine 
     */
    if (empty($_FILES['fileToUploadMini']['name'])) {
        $arrayErrors['fileToUploadMini'] = "Veuillez choisir une image";
    } else if ($_FILES['fileToUploadMini']['error'] != 0) {
        $arrayErrors['fileToUploadMini'] = "Votre fichier n'a pas pu être uploadé.";
    } else {
        $ext = "jpg jpeg png";
        $target_dir = "../assets/pictures/";
        $target_nameMini = $_FILES['fileToUploadMini']['name'];
        $target_array = explode(".", $_FILES['fileToUploadMini']['name']);
        $target_extension = end($target_array);
        $target_file = $target_dir . basename($_FILES['fileToUploadMini']['name']);
        $uploadOk = 1;
        $check = @getimagesize($_FILES['fileToUploadMini']['tmp_name']);
        if ($check == false) {
            $arrayErrors['formatMini'] = "Votre fichier n'est pas une image.";
            $uploadOk = 0;
        } else if (strpos($ext, $target_extension) === false) {
            $arrayErrors['typeMini'] = "Votre fichier n'est pas de type jpg, jpeg ou png.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            $arrayErrors['nokMini'] = "Votre fichier n'a pas été Upload.";
        } else if (move_uploaded_file($_FILES["fileToUploadMini"]["tmp_name"], $target_file)) {
            $successMini = "Le fichier " . htmlspecialchars(basename($target_nameMini)) . " a bien été uploadé.";
        }
    }


    /**
     * Vérification des différents champs si vide ou si déjà existants pour les champs ne pouvant pas avoir de doublons
     */
    if (empty($_POST['full_name'])) {
        $arrayErrors['full_name'] = "Champs non rempli";
    } else if ($alreadyFullName != 0) {
        $arrayErrors['full_name'] = "Nom Complet déjà utilisé";
    }

    if (empty($_POST['origin'])) {
        $arrayErrors['origin'] = "Champs non rempli";
    }

    if (empty($_POST['character'])) {
        $arrayErrors['character'] = "Champs non rempli";
    }

    if (empty($_POST['form'])) {
        $arrayErrors['form'] = "Champs non rempli";
    }

    if (empty($_POST['height'])) {
        $arrayErrors['height'] = "Champs non rempli";
    } else if (intval($_POST['height']) < 1 || intval($_POST['height']) > 300) {
        $arrayErrors['height'] = "Veuillez entrer une taille valide";
    }

    if (empty($_POST['date'])) {
        $arrayErrors['date'] = "Champs non rempli";
    }

    if (empty($_POST['id_company'])) {
        $arrayErrors['id_company'] = "Champs non rempli";
    } else if ($existCompany == 0) {
        $arrayErrors['id_company'] = "Cet Éditeur n'existe pas";
    }

    /**
     * Utilisation de htmlspecialchars et trim pour sécuriser le formulaire et création de la figurine
     */
    if (empty($arrayErrors)) {
        $id = htmlspecialchars(trim($target_name));
        $full_name = htmlspecialchars(trim($_POST['full_name']));
        $origin = htmlspecialchars(trim($_POST['origin']));
        $character = htmlspecialchars(trim($_POST['character']));
        $form = htmlspecialchars(trim($_POST['form']));
        $height = htmlspecialchars(trim($_POST['height']));
        $date = htmlspecialchars(trim($_POST['date']));
        $id_company = htmlspecialchars(trim($_POST['id_company']));

        $createFigureObj = new Figure();
        $createFigureObj->addFigure($id, $full_name, $origin, $character, $form, $height, $date, intval($id_company));

        $_SESSION['create'] = $full_name;
        header('Location: adminFigure');
        exit();
    }
}
