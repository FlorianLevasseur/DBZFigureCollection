<?php
require_once "../controllers/verifyUserController.php";

$allFigures = new Figure();
$allFiguresArray = $allFigures->getAllFigures();
if (isset($_POST['name'])) {
    foreach ($allFiguresArray as $figure) {
        if ($_POST['name'] == $figure['full_name']) {
            header('Location: figure?id=' . $figure['id']);
        }
    }
}
