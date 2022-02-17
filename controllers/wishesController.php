<?php
require_once "../controllers/verifyUserController.php";
require_once "../models/Figure.php";
require_once "../models/User.php";

if (empty($_GET['id'])) {
    $_GET['id'] = 0;
}

if (isset($_SESSION['id'])) {
    if ($_GET['id'] == $_SESSION['id']) {
        header('Location: myWishes');
        exit();
    }
}

$existUser = 0;

$allUsersObj = new User();
$allUsersArray = $allUsersObj->getAllUsers();
foreach ($allUsersArray as $user) {
    if ($_GET['id'] == $user['id']) {
        $existUser++;
        break;
    }
}

$userInfosObj = new User();
$userInfos = $userInfosObj->getUser(intval($_GET['id']));

$allOwnedObj = new Figure();
$allOwnedArray = $allOwnedObj->getMyWishes($_GET['id']);

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

$nbFiguresObj = new Figure();
$nbFigures = $nbFiguresObj->getNbMyFigures($_GET['id']);

$parPage = 10;
$pages = ceil($nbFigures / $parPage);
$premier = ($currentPage * $parPage) - $parPage;

$listLimitMyWishesObj = new Figure();
$listLimitMyWishes = $listLimitMyWishesObj->getLimitListMyWishes($_GET['id'], $premier, $parPage);