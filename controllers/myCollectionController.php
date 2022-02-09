<?php
require_once "../models/User.php";
require_once "../models/Figure.php";
session_start();

if(!empty($_SESSION)){
    $myFiguresObj = new Figure();
    $myFiguresArray = $myFiguresObj->getMyFigures(intval($_SESSION['id']));
}