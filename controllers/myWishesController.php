<?php
require_once "../controllers/verifyUserController.php";

if (!empty($_SESSION['id'])) {
    $myWishesObj = new Figure();
    $myWishesArray = $myWishesObj->getMyWishes(intval($_SESSION['id']), intval($_SESSION['sort']));

    if (!empty($_POST)) {
        foreach ($_POST as $key => $value) {
            if (strstr($key, "submit-")) {
                $infosArray = explode("-", $key);
                if ($infosArray[2] == "wish") {
                    if ($infosArray[1] == "remove") {
                        $removeWishFigureObj = new Figure();
                        $removeWishFigure = $removeWishFigureObj->removeWishFigure(intval($infosArray[3]), intval($_SESSION['id']));
                    }
                }
                $figureDetailsArray = $myWishesObj->getFigureDetails($infosArray[3]);
            }
        }
        $myWishesArray = $myWishesObj->getMyWishes($_SESSION['id'], 1);
    }
    

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
