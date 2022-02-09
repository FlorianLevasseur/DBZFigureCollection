<?php
require_once "../models/User.php";
session_start();
if(!isset($_SESSION['pseudo'])){
    header('Location: 404');
    exit();
}

if(isset($_POST['submit'])){
    session_unset();
    session_destroy();
    header('Location: connexion');
    exit();
}