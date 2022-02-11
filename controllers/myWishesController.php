<?php
require_once "../controllers/verifyUserController.php";
require_once "../models/User.php";
require_once "../models/Figure.php";

if(!empty($_SESSION['id'])){
    $myWishesObj = new Figure();
    $myWishesArray = $myWishesObj->getMyWishes(intval($_SESSION['id']));
}