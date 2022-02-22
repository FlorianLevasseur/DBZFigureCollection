<?php
require_once "../controllers/verifyUserController.php";

$arrayErrors = [];
$alreadySerie = 0;

$allSeriesObj = new Serie();
$allSeriesArray = $allSeriesObj->getAllSeries();

if (isset($_POST['submitCreate'])) {
    foreach ($allSeriesArray as $serie) {
        if ($serie['serie'] == $_POST['serie']) {
            $alreadySerie++;
        }
    }

    if (empty($_POST['serie'])) {
        $arrayErrors['serie'] = "Champs non rempli";
    } else if ($alreadySerie != 0) {
        $arrayErrors['serie'] = "Cette Série existe déjà !";
    }

    if (empty($arrayErrors)) {
        $serie = htmlspecialchars(trim($_POST['serie']));

        $createSerieObj = new Serie();
        $createSerieObj->addSerie($serie);

        $_SESSION['createSerie'] = $serie;
        header('Location: adminFigure');
        exit();
    }
}