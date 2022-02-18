<?php
require_once "../controllers/figureController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
    <!-- <div class="row m-0 justify-content-center"> -->
    <?php if (!empty($figureDetailsArray)) { ?>
        <p class="h3 text-center"><?= $figureDetailsArray['full_name'] ?></p>
        <!-- </div> -->

        <div class="row justify-content-center m-0 mt-5">
            <div class="col-lg-4 text-center my-auto">
                <a href="../assets/pictures/<?= $figureDetailsArray['id'] ?>.jpg" data-lightbox="principalPicture"><img class="img-fluid" src="../assets/pictures/<?= $figureDetailsArray['id'] ?>.jpg" alt="Photo d'une figurine"></a>
            </div>
            <div class="col-lg-4 my-auto">
                <table class="table table-bordered table-striped mb-0">
                    <tr>
                        <th>Origine</th>
                    </tr>
                    <tr>
                        <td><?= $figureDetailsArray['origin'] ?></td>
                    </tr>
                    <tr>
                        <th>Éditeur</th>
                    </tr>
                    <tr>
                        <td><?= $figureDetailsArray['company'] ?></td>
                    </tr>
                    <tr>
                        <th>Série</th>
                    </tr>
                    <tr>
                        <td><?= $figureDetailsArray['serie'] ?></td>
                    </tr>
                    <tr>
                        <th>Personnage</th>
                    </tr>
                    <tr>
                        <td><?= $figureDetailsArray['character'] ?> - <?= $figureDetailsArray['form'] ?></td>
                    </tr>
                    <tr>
                        <th>Taille</th>
                    </tr>
                    <tr>
                        <td><?= $figureDetailsArray['height'] ?> cm</td>
                    </tr>
                    <tr>
                        <th>Date de sortie</th>
                    </tr>
                    <tr>
                        <td><?= $figureDetailsArray['date'] ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row justify-content-evenly m-0 mt-4">
            <div class="col-lg-3 mb-4">
                <p class="h4 text-center">Gallerie</p>
                <div class="text-center mt-3">
                    <div>
                        <?php if (!empty($_SESSION['id'])) { ?>
                            <a href="gallery?id=<?= $_GET['id'] ?>" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4 mt-3 mb-3">ACCEDER A LA GALLERIE</a>
                        <?php } else { ?>
                            <p class="mt-3">Veuillez vous connecter pour avoir accès à la galerie.</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <p class="h4 text-center">Possédée par</p>
                <table class="table table-bordered table-hover">
                    <?php foreach ($ownedByArray as $figure) { ?>
                        <tr>
                            <td><a class="text-decoration-none text-reset" href="profile?id=<?= $figure['id_user'] ?>"><?= $figure['pseudo'] ?></a></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="col-lg-3 mb-4">
                <p class="h4 text-center">Recherchée par</p>
                <table class="table table-bordered table-hover">
                    <?php foreach ($wantedByArray as $figure) { ?>
                        <tr>
                            <td><a class="text-decoration-none text-reset" href="profile?id=<?= $figure['id_user'] ?>"><?= $figure['pseudo'] ?></a></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <?php if (isset($_SESSION['pseudo'])) { ?>
            <form method="POST">
                <div class="row justify-content-center m-0 mb-2">
                    <?php if ($owned == 0 && $wanted == 0) { ?>
                        <div class="col-lg-4 col-6 text-center">
                            <button type="submit" name="addCollecSubmit" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4 mt-3 mb-3">AJOUTER A MA COLLECTION</button>
                        </div>
                        <div class="col-lg-4 col-6 text-center">
                            <button type="submit" name="addWishSubmit" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4 mt-3 mb-3">AJOUTER A MES SOUHAITS</button>
                        </div>
                    <?php } else if ($owned != 0) { ?>
                        <div class="col-lg-4 col-6 text-center">
                            <button type="submit" name="removeCollecSubmit" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4 mt-3 mb-3">RETIRER DE MA COLLECTION</button>
                        </div>
                    <?php } else if ($wanted != 0) { ?>
                        <div class="col-lg-4 col-6 text-center">
                            <button type="submit" name="removeWishSubmit" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4 mt-3 mb-3">RETIRER DE MES SOUHAITS</button>
                        </div>
                    <?php } ?>
                </div>
            </form>
        <?php } ?>
    <?php } else { ?>
        <p class="text-center">Cette figurine n'existe pas.</p>
    <?php } ?>
    <?php if (!empty($_POST['addCollecSubmit']) || !empty($_POST['addWishSubmit']) || !empty($_POST['removeCollecSubmit']) || !empty($_POST['removeWishSubmit'])) { ?>
        <script>
            Swal.fire({
                text: "La figurine <?= $figureDetailsArray['full_name'] ?> a bien été <?php if (isset($_POST['addCollecSubmit']) || isset($_POST['addWishSubmit'])) { ?>ajouté à <?php } else if (isset($_POST['removeCollecSubmit']) || isset($_POST['removeWishSubmit'])) { ?>retiré de <?php } ?><?php if (isset($_POST['addCollecSubmit']) || isset($_POST['removeCollecSubmit'])) { ?>votre Collection.<?php } else if (isset($_POST['addWishSubmit']) || isset($_POST['removeWishSubmit'])) { ?>votre liste de Souhaits.<?php } ?>",
                icon: 'success',
                confirmButtonText: 'Continuer',
                confirmButtonColor: '#cc0921'
            })
        </script>
    <?php } ?>
</div>

<?php
include("footer.php");
?>