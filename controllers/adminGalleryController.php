<?php
require_once "../controllers/verifyUserController.php";
require_once "../models/Personal_Picture.php";

if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin'] != 0) {
        $allPicturesObj = new Personal_Picture();
        $allPicturesArray = $allPicturesObj->getAllPicturesDetails();
    }
}
