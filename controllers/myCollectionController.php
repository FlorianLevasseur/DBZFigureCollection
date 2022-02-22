<?php
require_once "../controllers/verifyUserController.php";

if(!empty($_SESSION['id'])){
    $myFiguresObj = new Figure();
    $myFiguresArray = $myFiguresObj->getMyFigures(intval($_SESSION['id']));
}