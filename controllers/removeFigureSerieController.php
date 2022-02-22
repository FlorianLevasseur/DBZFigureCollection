<?php
require_once "../controllers/verifyUserController.php";

if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin'] != 0) {
        if (!empty($_GET['id'])) {
            $figureSeriesObj = new Serie();
            $figureSeriesArray = $figureSeriesObj->getFigureSeries(intval($_GET['id']));
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
$existSerie = 0;

if (isset($_POST['submitSerie'])) {
    $allFigureSeriesObj = new Serie();
    $allFigureSeriesArray = $allFigureSeriesObj->getFigureSeries(intval($_GET['id']));
    if(isset($_POST['serie'])){
        foreach ($allFigureSeriesArray as $serie) {
            if ($serie['id'] == $_POST['serie']) {
                $existSerie++;
            }
        }
    }

    if (empty($_POST['serie'])) {
        $arrayErrors['serie'] = "Champs non rempli";
    } else if ($existSerie == 0) {
        $arrayErrors['serie'] = "Série non présente pour cette figurine";
    }

    if (empty($_POST['g-recaptcha-response'])) {
        $arrayErrors['captcha'] = "Veuillez confirmer le CAPTCHA";
    }

    if (empty($arrayErrors)) {
        $serie = htmlspecialchars(trim($_POST['serie']));

        $removeFigureSerieObj = new Serie();
        $serieName = $removeFigureSerieObj->getSerieName(intval($serie));
        $removeFigureSerieObj->removeFigureSerie(intval($serie), intval($_GET['id']));

        $_SESSION['removeSerie'] = $serieName;
        header('Location: modifFigure?id=' . $_GET['id']);
        exit();
    }
}
