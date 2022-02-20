<?php
require_once "../controllers/myGalleryController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
    <?php if (!empty($_SESSION['id'])) {
        if ($existUser != 0) {
            if ($_SESSION['id'] == $_GET['id']) { ?>
                <p class="h3 text-center mb-4">Ma Gallerie</p>
            <?php } else { ?>
                <p class="h3 text-center mb-4">Gallerie de <?= $myUser ?></p>
            <?php } ?>
            <div class="row m-0 p-0" data-masonry='{"percentPosition": true }'>
                <?php foreach ($userPicturesArray as $picture) {
                    if ($picture['visible'] == 1) { ?>
                        <div class="col-lg-4">
                            <div>
                                <a href="../assets/uploadedPictures/<?= $picture['picture'] ?>" data-lightbox="allPictures"><img src="../assets/uploadedPictures/<?= $picture['picture'] ?>" class="img-fluid mb-2" alt="Photo d'une figurine"></a>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
            <div class="text-center">
                <a href="profile?id=<?= $_GET['id'] ?>" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4">RETOUR</a>
            </div>
        <?php } else { ?>
            <p class="text-center">Cet Utilisateur n'existe pas</p>
        <?php }
    } else { ?>
        <p class="text-center">Veuillez vous connecter pour avoir accès à cette page</p>
    <?php } ?>
</div>
<?php
include("footer.php");
?>