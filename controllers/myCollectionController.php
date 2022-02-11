<?php
require_once "../controllers/verifyUserController.php";
require_once "../models/User.php";
require_once "../models/Figure.php";

if(!empty($_SESSION['id'])){
    $myFiguresObj = new Figure();
    $myFiguresArray = $myFiguresObj->getMyFigures(intval($_SESSION['id']));
}