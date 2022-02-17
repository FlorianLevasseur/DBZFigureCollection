<?php
require_once "../controllers/verifyUserController.php";
require_once "../models/Personal_Picture.php";

if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin'] != 0) {
        $allPicturesObj = new Personal_Picture();
        $allPicturesArray = $allPicturesObj->getAllPicturesDetails();

        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $currentPage = $_GET['page'];
        } else {
            $currentPage = 1;
        }

        $nbPicturesObj = new Personal_Picture();
        $nbPictures = $nbPicturesObj->getNbAllPictures();

        $parPage = 10;
        $pages = ceil($nbPictures / $parPage);
        $premier = ($currentPage * $parPage) - $parPage;

        $listLimitPicturesObj = new Personal_Picture();
        $listLimitPictures = $listLimitPicturesObj->getLimitListPictures($premier, $parPage);
    }
}
