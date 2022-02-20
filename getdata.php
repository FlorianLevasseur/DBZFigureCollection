<?php

require_once './models/Figure.php';


if (isset($_POST['name'])) {
    $exists = 0;
    $name = $_POST['name'];
    $figure = new Figure();
    $figures = $figure->getAllFigures();
    $nameArray = explode(" ", $name);
    foreach ($figures as $result) {
        foreach ($nameArray as $myName) {
            if(!empty($myName)) {
                if (strstr(strtoupper($result['full_name']), strtoupper($myName))) {
                    $exists++;
                } else {
                    $exists = 0;
                    break;
                }
            }
        }
        if($exists != 0) {
            echo "<a class='text-decoration-none text-reset' href='figure?id=" . $result['id'] . "'><p class='border border-top-0 m-0 text-truncate'><img src='../assets/pictures/" . $result['id'] . "-mini.jpg' alt='Photo de figurine'> " . $result["full_name"] . "</p></a>";
        }
    }
}
