<?php
require_once "../controllers/verifyUserController.php";

if (!empty($_SESSION['id'])) {
    $myWishesObj = new Figure();
    $myWishesArray = $myWishesObj->getMyWishes(intval($_SESSION['id']), intval($_SESSION['sort']));

    $existUser = 0;

    $allUsersObj = new User();
    $allUsersArray = $allUsersObj->getAllUsers();
    foreach ($allUsersArray as $user) {
        if ($_SESSION['id'] == $user['id']) {
            $existUser++;
            break;
        }
    }

    if (isset($_GET['page']) && !empty($_GET['page'])) {
        $currentPage = $_GET['page'];
    } else {
        $currentPage = 1;
    }

    $nbFiguresObj = new Figure();
    $nbFigures = $nbFiguresObj->getNbMyWishes(intval($_SESSION['id']));
    $parPage = 10;
    $pages = ceil($nbFigures / $parPage);
    $premier = ($currentPage * $parPage) - $parPage;

    $listLimitMyWishesObj = new Figure();
    $listLimitMyWishes = $listLimitMyWishesObj->getLimitListMyWishes(intval($_SESSION['id']), $premier, $parPage, $_SESSION['sort']);
}
