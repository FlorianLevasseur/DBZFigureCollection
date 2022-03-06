<?php
require_once "../controllers/verifyUserController.php";

if (!empty($_SESSION['id'])) {
    $myFiguresObj = new Figure();
    $myFiguresArray = $myFiguresObj->getMyFigures(intval($_SESSION['id']), intval($_SESSION['sort']));

    if (!empty($_POST)) {
        foreach ($_POST as $key => $value) {
            if (strstr($key, "submit-")) {
                $infosArray = explode("-", $key);
                if ($infosArray[2] == "collec") {
                    if ($infosArray[1] == "remove") {
                        $removeCollecFigureObj = new Figure();
                        $removeCollecFigure = $removeCollecFigureObj->removeCollecFigure(intval($infosArray[3]), intval($_SESSION['id']));
                    }
                }
                $figureDetailsArray = $myFiguresObj->getFigureDetails($infosArray[3]);
            }
        }
        $myFiguresArray = $myFiguresObj->getMyFigures(intval($_SESSION['id']), intval($_SESSION['sort']));
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
    $nbFigures = $nbFiguresObj->getNbMyFigures(intval($_SESSION['id']));

    $parPage = 10;
    $pages = ceil($nbFigures / $parPage);
    $premier = ($currentPage * $parPage) - $parPage;

    $listLimitMyFiguresObj = new Figure();
    $listLimitMyFigures = $listLimitMyFiguresObj->getLimitListMyFigures(intval($_SESSION['id']), $premier, $parPage, intval($_SESSION['sort']));
}
