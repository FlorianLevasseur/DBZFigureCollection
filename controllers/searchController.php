<?php
require_once "../models/Figure.php";
require_once "../models/Serie.php";
session_start();

$find = 0;

$allCharactersObj = new Figure();
$allCharactersArray = $allCharactersObj->getAllCharacters();

$allSeriesObj = new Serie();
$allSeriesArray = $allSeriesObj->getAllSeries();

$allYearsObj = new Figure();
$allYearsArray = $allYearsObj->getAllYears();

if (isset($_GET['character'])) {
    foreach ($allCharactersArray as $character) {
        if ($_GET['character'] == $character) {
            $find++;
            break;
        }
    }

    if($_GET['character'] == "all") {
        $allFiguresObj = new Figure();
        $allFiguresArray = $allFiguresObj->getAllFigures();

        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $currentPage = $_GET['page'];
        } else {
            $currentPage = 1;
        }

        $nbPatientsObj = new Figure();
        $nbPatients = $nbPatientsObj->getNbAllFigures();

        $parPage = 6;
        $pages = ceil($nbPatients / $parPage);
        $premier = ($currentPage * $parPage) - $parPage;

        $listLimitCharacterObj = new Figure();
        $listLimitCharacter = $listLimitCharacterObj->getLimitListFigures($premier, $parPage);
    } else if ($find == 0) {
        $oneCharacterObj = new Figure();
        $oneCharacterArray = $oneCharacterObj->getOneCharacter($_GET['character']);

        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $currentPage = $_GET['page'];
        } else {
            $currentPage = 1;
        }

        $nbPatientsObj = new Figure();
        $nbPatients = $nbPatientsObj->getNbCharacter($_GET['character']);

        $parPage = 6;
        $pages = ceil($nbPatients / $parPage);
        $premier = ($currentPage * $parPage) - $parPage;

        $listLimitCharacterObj = new Figure();
        $listLimitCharacter = $listLimitCharacterObj->getLimitListCharacter($_GET['character'], $premier, $parPage);
    } else {
        $listLimitCharacter = [];
    }
}
