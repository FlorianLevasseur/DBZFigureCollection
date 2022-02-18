<?php

require_once './models/Figure.php';

if(isset($_POST['name'])){
    $name = $_POST['name'];
    $figure = new Figure();
    $figures = $figure->getAllFigures();
    foreach ($figures as $result) {
        echo "<option>" . $result["full_name"] . "</option>";
    }
}
?>