<?php
require_once "../controllers/verifyUserController.php";
require_once "../models/User.php";

if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin'] != 0) {
        $allUsersObj = new User();
        $allUsersArray = $allUsersObj->getAllUsersDetails();

        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $currentPage = $_GET['page'];
        } else {
            $currentPage = 1;
        }

        $nbUsersObj = new User();
        $nbUsers = $nbUsersObj->getNbAllUsers();

        $parPage = 10;
        $pages = ceil($nbUsers / $parPage);
        $premier = ($currentPage * $parPage) - $parPage;

        $listLimitUsersObj = new User();
        $listLimitUsers = $listLimitUsersObj->getLimitListUsers($premier, $parPage);
    }
}
