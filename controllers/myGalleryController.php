<?php
require_once "../controllers/verifyUserController.php";

if(!isset($_GET['id'])){
    $_GET['id'] = 0;
}

$existUser = 0;
$myUser = '';

$allUsersObj = new User();
$allUsersArray = $allUsersObj->getAllUsers();
foreach($allUsersArray as $user){
    if($_GET['id'] == $user['id']){
        $existUser++;
        $myUser = $user['pseudo'];
        break;
    }
}

$userPicturesObj = new Personal_Picture();
$userPicturesArray = $userPicturesObj->getUserPictures(intval($_GET['id']));