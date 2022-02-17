<?php
require_once "../controllers/verifyUserController.php";
require_once "../models/Figure.php";

if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin'] != 0) {
        $allFiguresObj = new Figure();
        $allFiguresArray = $allFiguresObj->getAllFigures();

        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $currentPage = $_GET['page'];
        } else {
            $currentPage = 1;
        }

        $nbFiguresObj = new Figure();
        $nbFigures = $nbFiguresObj->getNbAllFigures();

        $parPage = 10;
        $pages = ceil($nbFigures / $parPage);
        $premier = ($currentPage * $parPage) - $parPage;

        $listLimitFiguresObj = new Figure();
        $listLimitFigures = $listLimitFiguresObj->getLimitListFigures($premier, $parPage);
    }
}
