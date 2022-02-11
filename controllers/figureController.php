<?php
require_once "../controllers/verifyUserController.php";
require_once "../models/Figure.php";

$owned = 0;
$wanted = 0;


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
} else {
    $_GET['id'] = "0";
    $figureDetailsArray = [];
}

if (!empty($_POST)) {
    if (isset($_POST['addCollecSubmit'])) {
        $addCollecFigureObj = new Figure();
        $addCollecFigure = $addCollecFigureObj->addCollecFigure(intval($_GET['id']), intval($_SESSION['id']));
    }

    if (isset($_POST['addWishSubmit'])) {
        $addWishFigureObj = new Figure();
        $addWishFigure = $addWishFigureObj->addWishFigure(intval($_GET['id']), intval($_SESSION['id']));
    }

    if (isset($_POST['removeCollecSubmit'])) {
        $removeCollecFigureObj = new Figure();
        $removeCollecFigure = $removeCollecFigureObj->removeCollecFigure(intval($_GET['id']), intval($_SESSION['id']));
    }

    if (isset($_POST['removeWishSubmit'])) {
        $removeWishFigureObj = new Figure();
        $removeWishFigure = $removeWishFigureObj->removeWishFigure(intval($_GET['id']), intval($_SESSION['id']));
    }
}

if (!empty($_SESSION['id'])) {
    $myFiguresObj = new Figure();
    $myFiguresArray = $myFiguresObj->getMyFigures(intval($_SESSION['id']));
    $myWishesObj = new Figure();
    $myWishesArray = $myWishesObj->getMyWishes(intval($_SESSION['id']));
    foreach ($myFiguresArray as $figure) {
        if ($figure['id'] == $_GET['id']) {
            $owned++;
            break;
        }
    }
    foreach ($myWishesArray as $figure) {
        if ($figure['id'] == $_GET['id']) {
            $wanted++;
            break;
        }
    }
}

$ownedByObj = new Figure();
$ownedByArray = $ownedByObj->getOwnedBy(intval($_GET['id']));

$wantedByObj = new Figure();
$wantedByArray = $wantedByObj->getWantedBy(intval($_GET['id']));
