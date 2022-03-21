<?php
require_once "../controllers/galleryController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
    <p class="h3 text-center mb-0">Galerie</p>
    <?php
    if (!empty($_SESSION['id'])) {
        if (!empty($_GET['id'])) { ?>
            <p class="h3 text-center mb-3"><?= $figureDetailsArray['full_name'] ?></p>
            <?php if (empty($_POST['submit'])) { ?>
                <form method="POST">
                    <div class="text-center">
                        <input class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4 mt-3 mb-3" type="submit" id="submit" name="submit" value="AJOUTER UNE PHOTO">
                    </div>
                </form>
            <?php } else { ?>
                <form enctype="multipart/form-data" method="POST">
                    <div class="text-center">
                        <input class="mb-3" type="file" name="fileToUpload" id="fileToUpload">
                    </div>
                    <div class="text-center">
                        <input class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4 mt-3 mb-3" type="submit" value="UPLOAD" name="submitUpload">
                    </div>
                </form>
            <?php } ?>
            <div class="text-center">
                <p class="text-danger">
                    <?= $arrayErrors['format'] ?? '' ?>
                    <?= $arrayErrors['type'] ?? '' ?>
                    <?= $arrayErrors['nok'] ?? '' ?>
                </p>
            </div>
            <div class="row m-0 p-0" data-masonry='{"percentPosition": true }'>
                <?php foreach ($arrayPictures as $picture) {
                    $myUserObj = new Personal_Picture();
                    $myUser = $myUserObj->getUserImg($picture);
                    if ($myUser['visible'] != 0) { ?>
                        <div class="col-lg-4">
                            <div>
                                <a href="../assets/uploadedPictures/<?= $picture ?>" data-lightbox="allPictures" data-title="Photo de <?= $myUser['pseudo'] ?>"><img src="../assets/uploadedPictures/<?= $picture ?>" class="img-fluid mb-2" alt="Photo d'une figurine"></a>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
            <div class="text-center mt-3">
                <a href="figure?id=<?= $_GET['id'] ?>" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4">RETOUR</a>
            </div>
        <?php } else { ?>
            <p class="text-center mt-3">Cette figurine n'existe pas</p>
        <?php }
    } else { ?>
        <p class="text-center mt-3">Veuillez vous connecter pour avoir accès à cette page</p>
    <?php } ?>
</div>

<?php if (!empty($_SESSION['upload'])) { ?>
    <script>
        swal({
            title: "Photo uploadée !",
            text: "Votre photo a bien été uploadée et est en attente de confirmation par un administrateur ! Elle sera visible uniquement après confirmation !",
            icon: 'success',
            dangerMode: true,
            button: {
                text: "Continuer"
            }
        })
    </script>
<?php $_SESSION['upload'] = "";
} ?>

<?php
include("footer.php");
?>