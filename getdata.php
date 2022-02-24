<?php

require_once "./config.php";
require_once "./models/Database.php";
require_once "./models/Figure.php";
require_once "./models/Serie.php";

if (isset($_POST['name'])) {
    $exists = 0;
    $name = $_POST['name'];
    $figure = new Figure();
    $figures = $figure->getAllFigures();
    $nameArray = explode(" ", $name);
    foreach ($figures as $result) {
        foreach ($nameArray as $myName) {
            if (!empty($myName)) {
                if (strstr(strtoupper($result['full_name']), strtoupper($myName))) {
                    $exists++;
                } else {
                    $exists = 0;
                    break;
                }
            }
        }
        if ($exists != 0) {
            echo "<a class='text-decoration-none text-reset' href='figure?id=" . $result['id'] . "'><p class='border border-top-0 m-0 text-truncate'><img src='../assets/pictures/" . $result['id'] . "-mini.jpg' alt='Photo de figurine'> " . $result["full_name"] . "</p></a>";
        }
    }
}

$figureObj = new Figure();
$allCharacters = $figureObj->getAllCharacters();
$allYears = $figureObj->getAllYears();
$seriesObj = new Serie();
$allSeries = $seriesObj->getAllSeries();
$value = 1;

if (isset($_POST['select1'])) {
    $select1 = $_POST['select1'];
    switch ($select1) {
        case 1:
            echo "<option value='' selected disabled>-- Choix du personnage --</option>";
            foreach ($allCharacters as $character) {
                echo "<option value='" . $character['character'] . "'>" . $character['character'] . "</option>";
                $value++;
            }
            break;
        case 2:
            echo "<option value='' selected disabled>-- Choix de la série --</option>";
            foreach ($allSeries as $serie) {
                echo "<option value='" . $serie['serie'] . "'>" . $serie['serie'] . "</option>";
                $value++;
            }
            break;
        case 3:
            echo "<option value='' selected disabled>-- Choix de l'année --</option>";
            foreach ($allYears as $year) {
                echo "<option value='" . $year['year'] . "'>" . $year['year'] . "</option>";
                $value++;
            }
            break;
        case 4:
            echo "<option value='' selected disabled>-- Choix de la taille --</option>";
            echo "<option value='6-10'>Entre 6 et 10 cm</option>";
            echo "<option value='11-15'>Entre 11 et 15 cm</option>";
            echo "<option value='16-20'>Entre 16 et 20 cm</option>";
            echo "<option value='21-25'>Entre 21 et 25 cm</option>";
            echo "<option value='26-30'>Entre 26 et 30 cm</option>";
            echo "<option value='31-35'>Entre 31 et 35 cm</option>";
            break;
        default:
            break;
    }
}