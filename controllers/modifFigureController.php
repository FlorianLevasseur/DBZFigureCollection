<?php
require_once "../controllers/verifyUserController.php";

if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin'] != 0) {
        if (!empty($_GET['id'])) {
            $allFiguresObj = new Figure();
            $allCompaniesArray = $allFiguresObj->getAllCompanies();
            $allFiguresArray = $allFiguresObj->getAllFigures();
            $allFigureSeriesObj = new Serie();
            $allFigureSeries = $allFigureSeriesObj->getFigureSeries(intval($_GET['id']));
            foreach ($allFiguresArray as $figure) {
                if ($figure['id'] == $_GET['id']) {
                    $figureDetailsObj = new Figure();
                    $figureInfos = $figureDetailsObj->getFigureDetailsForModif($_GET['id']);
                    break;
                } else {
                    $figureInfos = [];
                }
            }
            if (empty($figureInfos)) {
                $_GET['id'] = 0;
            }
        } else {
            $_GET['id'] = 0;
            $figureInfos = [];
        }
    }
}

$arrayErrors = [];
$alreadyFullName = 0;

if (isset($_POST['submitModif'])) {
    $allFiguresObj = new Figure();
    $allFiguresArray = $allFiguresObj->getAllFigures();
    foreach ($allFiguresArray as $figure) {
        if ($figure['id'] != $figureInfos['id']) {
            if ($figure['full_name'] == $_POST['full_name']) {
                $alreadyFullName++;
            }
        }
    }

    if ($_FILES['fileToUpload']['error'] == 0) {
        $ext = "jpg jpeg png";
        $target_dir = "../assets/pictures/";
        $target_name = $_FILES['fileToUpload']['name'];
        $target_array = explode(".", $_FILES['fileToUpload']['name']);
        $target_extension = end($target_array);
        $_FILES['fileToUpload']['name'] = $_GET['id'] . ".jpg";
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

    if ($_FILES['fileToUploadMini']['error'] == 0) {
        $ext = "jpg jpeg png";
        $target_dir = "../assets/pictures/";
        $target_name = $_FILES['fileToUploadMini']['name'];
        $target_array = explode(".", $_FILES['fileToUploadMini']['name']);
        $target_extension = end($target_array);
        $_FILES['fileToUploadMini']['name'] = $_GET['id'] . "-mini.jpg";
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
            $successMini = "Le fichier " . htmlspecialchars(basename($target_name)) . " a bien été uploadé.";
        }
    }

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

    if ($_POST['id_company'] != 1 && $_POST['id_company'] != 2) {
        $arrayErrors['id_company'] = "Valeur incorrecte";
    }

    if (empty($_POST['g-recaptcha-response'])) {
        $arrayErrors['captcha'] = "Veuillez confirmer le CAPTCHA";
    }

    if (empty($arrayErrors)) {
        $full_name = htmlspecialchars(trim($_POST['full_name']));
        $origin = htmlspecialchars(trim($_POST['origin']));
        $character = htmlspecialchars(trim($_POST['character']));
        $form = htmlspecialchars(trim($_POST['form']));
        $height = htmlspecialchars(trim($_POST['height']));
        $date = htmlspecialchars(trim($_POST['date']));
        $id_company = htmlspecialchars(trim($_POST['id_company']));

        $modifFigureObj = new Figure();
        $modifFigureObj->modifFigure(intval($_GET['id']), $full_name, $origin, $character, $form, $height, $date, intval($id_company));
        
        $_SESSION['modif'] = $full_name;
        header('Location: adminFigure');
        exit();
    }
}

if (isset($_POST['delete'])) {
    $deleteFigureObj = new Figure();
    $deleteFigureInfos = $deleteFigureObj->getFigureDetails(intval($_GET['id']));
    $deletePicturesObj = new Personal_Picture();
    $deletePicturesArray = $deletePicturesObj->getAllPictures();
    foreach ($deletePicturesArray as $picture) {
        if ($picture['id_figure'] == $_GET['id']) {
            unlink("../assets/uploadedpictures/" . $picture['picture']);
        }
    }
    unlink("../assets/pictures/" . $_GET['id'] . ".jpg");
    unlink("../assets/pictures/" . $_GET['id'] . "-mini.jpg");
    $deleteFigureObj->deleteFigure(intval($_GET['id']));
    
    $_SESSION['delete'] = $deleteFigureInfos['full_name'];
    header('Location: adminFigure');
    exit();
}