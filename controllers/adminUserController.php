<?php
require_once "../controllers/verifyUserController.php";
require_once "../models/User.php";

if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin'] != 0) {
        $allUsersObj = new User();
        $allUsersArray = $allUsersObj->getAllUsersDetails();
    }
}
