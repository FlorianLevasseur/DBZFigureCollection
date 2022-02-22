<?php
require_once "../controllers/verifyUserController.php";

if(!empty($_SESSION['id'])){
    $myWishesObj = new Figure();
    $myWishesArray = $myWishesObj->getMyWishes(intval($_SESSION['id']));
}