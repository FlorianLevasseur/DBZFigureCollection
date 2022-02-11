<?php
require_once "../controllers/verifyUserController.php";
require_once "../models/User.php";
if(!isset($_SESSION['pseudo'])){
    header('Location: connexion');
    exit();
}

if(isset($_POST['submit'])){
    session_unset();
    session_destroy();
    header('Location: connexion');
    exit();
}