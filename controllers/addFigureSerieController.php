<?php
require_once "../controllers/verifyUserController.php";

if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin'] != 0) {
        if (!empty($_GET['id'])) {
            $allSeriesObj = new Serie();
            $allSeriesArray = $allSeriesObj->getAllSeries();
            $allFiguresObj = new Figure();
            $allFiguresArray = $allFiguresObj->getAllFigures();
            foreach ($allFiguresArray as $figure) {
                if ($figure['id'] == $_GET['id']) {
                    $figureDetailsObj = new Figure();
                    $figureDetailsArray = $figureDetailsObj->getFigureDetailsForModif($_GET['id']);
                    break;
                } else {
                    $figureDetailsArray = [];
                }
            }
            if (!empty($figureDetailsArray)) {
                $oneFigureObj = new Figure();
                $figureInfos = $oneFigureObj->getFigureDetailsForModif(intval($_GET['id']));
            } else {
                $_GET['id'] = 0;
                $figureInfos = [];
            }
        } else {
            $_GET['id'] = 0;
            $figureInfos = [];
        }
    }
}

$arrayErrors = [];
$alreadySerie = 0;
$existSerie = 0;

if (isset($_POST['submitSerie'])) {
    $allFigureSeriesObj = new Serie();
    $allFigureSeriesArray = $allFigureSeriesObj->getFigureSeries(intval($_GET['id']));
    foreach ($allFigureSeriesArray as $serie) {
        if ($serie['id'] == $_POST['serie']) {
            $alreadySerie++;
        }
    }

    $allSeriesObj = new Serie();
    $allSeriesArray = $allSeriesObj->getAllSeries();
    if(isset($_POST['serie'])){
        foreach ($allSeriesArray as $serie) {
            if ($serie['id'] == $_POST['serie']) {
                $existSerie++;
            }
        }
    }

    if (empty($_POST['serie'])) {
        $arrayErrors['serie'] = "Champs non rempli";
    } else if ($alreadySerie != 0) {
        $arrayErrors['serie'] = "Série déjà présente pour cette figurine";
    } else if ($existSerie == 0) {
        $arrayErrors['serie'] = "Cette Série n'existe pas";
    }

    if (empty($_POST['g-recaptcha-response'])) {
        $arrayErrors['captcha'] = "Veuillez confirmer le CAPTCHA";
    }

    if (empty($arrayErrors)) {
        $serie = htmlspecialchars(trim($_POST['serie']));

        $addFigureSerieObj = new Serie();
        $serieName = $addFigureSerieObj->getSerieName(intval($serie));
        $addFigureSerieObj->addFigureSerie(intval($serie), intval($_GET['id']));

        $_SESSION['addSerie'] = $serieName;
        header('Location: modifFigure?id=' . $_GET['id']);
        exit();
    }
}
