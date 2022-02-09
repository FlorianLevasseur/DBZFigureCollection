<?php
require_once "../controllers/myCollectionController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
    <p class="h3 mb-4 text-center">Ma Collection</p>
    <?php if (!empty($_SESSION)) { ?>
        <div class="row m-0 p-0 justify-content-center">
            <?php foreach ($myFiguresArray as $figure) { ?>
                <div class="col-lg-3 mb-3 d-flex items-stretch">
                    <a class="card text-decoration-none text-reset border border-reset" href="figure?id=<?= $figure['id'] ?>">
                        <img src="../assets/pictures/<?= $figure['id'] ?>.jpg" class="card-img-top" alt="Image de la figurine">
                        <div class="card-body d-flex flex-column">
                            <p class="card-title h5 mt-auto text-center"><?= $figure['full_name'] ?></p>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <p class="text-center">Veuillez vous connecter pour avoir accès à cette page</p>
    <?php } ?>
</div>

<?php
include("footer.php");
?>