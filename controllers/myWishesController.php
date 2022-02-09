<?php
require_once "../models/User.php";
require_once "../models/Figure.php";
session_start();

if(!empty($_SESSION)){
    $myWishesObj = new Figure();
    $myWishesArray = $myWishesObj->getMyWishes(intval($_SESSION['id']));
}