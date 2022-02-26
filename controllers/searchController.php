<?php
require_once "../controllers/verifyUserController.php";

$find = 0;

$allCharactersObj = new Figure();
$allCharactersArray = $allCharactersObj->getAllCharacters();

$allSeriesObj = new Serie();
$allSeriesArray = $allSeriesObj->getAllSeries();

$allYearsObj = new Figure();
$allYearsArray = $allYearsObj->getAllYears();

if (isset($_SESSION['id'])) {
    $myFiguresWishesObj = new Figure();
    $myFiguresArray = $myFiguresWishesObj->getMyFigures($_SESSION['id'], 1);
    $myWishesArray = $myFiguresWishesObj->getMyWishes($_SESSION['id'], 1);

    if (!empty($_POST)) {
        foreach ($_POST as $key => $value) {
            if (strstr($key, "submit-")) {
                $infosArray = explode("-", $key);
                if ($infosArray[2] == "collec") {
                    if ($infosArray[1] == "add") {
                        $addCollecFigureObj = new Figure();
                        $addCollecFigure = $addCollecFigureObj->addCollecFigure(intval($infosArray[3]), intval($_SESSION['id']));
                    } else if ($infosArray[1] == "remove") {
                        $removeCollecFigureObj = new Figure();
                        $removeCollecFigure = $removeCollecFigureObj->removeCollecFigure(intval($infosArray[3]), intval($_SESSION['id']));
                    }
                } else if ($infosArray[2] == "wish") {
                    if ($infosArray[1] == "add") {
                        $addWishFigureObj = new Figure();
                        $addWishFigure = $addWishFigureObj->addWishFigure(intval($infosArray[3]), intval($_SESSION['id']));
                    } else if ($infosArray[1] == "remove") {
                        $removeWishFigureObj = new Figure();
                        $removeWishFigure = $removeWishFigureObj->removeWishFigure(intval($infosArray[3]), intval($_SESSION['id']));
                    }
                }
            }
        }
    }
    $myFiguresArray = $myFiguresWishesObj->getMyFigures($_SESSION['id'], 1);
    $myWishesArray = $myFiguresWishesObj->getMyWishes($_SESSION['id'], 1);
}



if (isset($_GET['character'])) {
    foreach ($allCharactersArray as $character) {
        if ($_GET['character'] == $character) {
            $find++;
            break;
        }
    }

    if ($find == 0) {
        $oneCharacterObj = new Figure();
        $oneCharacterArray = $oneCharacterObj->getOneCharacter($_GET['character']);

        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $currentPage = $_GET['page'];
        } else {
            $currentPage = 1;
        }

        $nbFiguresObj = new Figure();
        $nbFigures = $nbFiguresObj->getNbCharacter($_GET['character']);

        $parPage = 10;
        $pages = ceil($nbFigures / $parPage);
        $premier = ($currentPage * $parPage) - $parPage;

        $listLimitCharacterObj = new Figure();
        $listLimitCharacter = $listLimitCharacterObj->getLimitListCharacter($_GET['character'], $premier, $parPage, intval($_SESSION['sort']));
    } else {
        $listLimitCharacter = [];
    }
} else if (isset($_GET['serie'])) {
    foreach ($allSeriesArray as $serie) {
        if ($_GET['serie'] == $serie) {
            $find++;
            break;
        }
    }

    if ($find == 0) {

        $oneSerieCharactersObj = new Figure();
        $oneSerieCharactersArray = $oneSerieCharactersObj->getOneSerieCharacters($_GET['serie']);

        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $currentPage = $_GET['page'];
        } else {
            $currentPage = 1;
        }

        $nbFiguresObj = new Figure();
        $nbFigures = $nbFiguresObj->getSerieNbCharacters($_GET['serie']);

        $parPage = 10;
        $pages = ceil($nbFigures / $parPage);
        $premier = ($currentPage * $parPage) - $parPage;

        $listLimitCharacterObj = new Figure();
        $listLimitCharacter = $listLimitCharacterObj->getLimitListSerieCharacters($_GET['serie'], $premier, $parPage, intval($_SESSION['sort']));
    } else {
        $listLimitCharacter = [];
    }
} else if (isset($_GET['year'])) {
    foreach ($allYearsArray as $year) {
        if ($_GET['year'] == $year) {
            $find++;
            break;
        }
    }

    if ($find == 0) {
        $oneYearCharactersObj = new Figure();
        $oneYearCharactersArray = $oneYearCharactersObj->getOneYearCharacters($_GET['year']);

        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $currentPage = $_GET['page'];
        } else {
            $currentPage = 1;
        }

        $nbFiguresObj = new Figure();
        $nbFigures = $nbFiguresObj->getYearNbCharacters($_GET['year']);

        $parPage = 10;
        $pages = ceil($nbFigures / $parPage);
        $premier = ($currentPage * $parPage) - $parPage;

        $listLimitCharacterObj = new Figure();
        $listLimitCharacter = $listLimitCharacterObj->getLimitListYearCharacters($_GET['year'], $premier, $parPage, intval($_SESSION['sort']));
    } else {
        $listLimitCharacter = [];
    }
} else if (isset($_GET['height'])) {
    $heightArray = explode("-", $_GET['height']);
    if (isset($heightArray[0]) && isset($heightArray[1])) {
        $oneHeightCharactersObj = new Figure();
        $oneHeightCharactersArray = $oneHeightCharactersObj->getOneHeightCharacters(intval($heightArray[0]), intval($heightArray[1]));

        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $currentPage = $_GET['page'];
        } else {
            $currentPage = 1;
        }

        $nbFiguresObj = new Figure();
        $nbFigures = $nbFiguresObj->getHeightNbCharacters(intval($heightArray[0]), intval($heightArray[1]));

        $parPage = 10;
        $pages = ceil($nbFigures / $parPage);
        $premier = ($currentPage * $parPage) - $parPage;

        $listLimitCharacterObj = new Figure();
        $listLimitCharacter = $listLimitCharacterObj->getLimitListHeightCharacters(intval($heightArray[0]), intval($heightArray[1]), $premier, $parPage, intval($_SESSION['sort']));
    } else {
        $listLimitCharacter = [];
    }
}
