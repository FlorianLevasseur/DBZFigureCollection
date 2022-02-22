<?php
require_once "../controllers/verifyUserController.php";

if (!empty($_GET['id'])) {
    $allFiguresObj = new Figure();
    $allFiguresArray = $allFiguresObj->getAllFigures();
    foreach ($allFiguresArray as $figure) {
        if ($figure['id'] == $_GET['id']) {
            $figureDetailsObj = new Figure();
            $figureDetailsArray = $figureDetailsObj->getFigureDetails($_GET['id']);
            break;
        } else {
            $figureDetailsArray = [];
        }
    }
    if (!empty($figureDetailsArray)) {
        $arrayErrors = [];
        $arrayScan = scandir("../assets/uploadedPictures/");
        $arrayPictures = [];
        foreach ($arrayScan as $picture) {
            $array_name = explode("-", $picture);
            $myFigure = reset($array_name);
            if ($myFigure == $_GET['id']) {
                array_push($arrayPictures, $picture);
            }
        }
    } else {
        $_GET['id'] = 0;
        $arrayPictures = [];
    }
} else {
    $_GET['id'] = 0;
    $arrayPictures = [];
}

if (isset($_POST['submitUpload'])) {
    $ext = "jpg jpeg png";
    $target_dir = "../assets/uploadedPictures/";
    $target_name = $_FILES['fileToUpload']['name'];
    $target_array = explode(".", $_FILES['fileToUpload']['name']);
    $target_extension = end($target_array);
    $_FILES['fileToUpload']['name'] = $_GET['id'] . "-" . $_SESSION['id'] . "-" . uniqid() . "." . $target_extension;
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
        $uploadImgObj = new Personal_Picture();
        $uploadImgObj->uploadImg($_FILES['fileToUpload']['name'], intval($_SESSION['id']), intval($_GET['id']), 0);
        $arrayErrors['success'] = "Le fichier " . htmlspecialchars(basename($target_name)) . " a bien été uploadé.";
        $_SESSION['upload'] = "Photo uploadée";
    }
}
