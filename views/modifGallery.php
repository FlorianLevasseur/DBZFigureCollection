<?php
require_once "../controllers/modifGalleryController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
    <p class="h3 text-center mb-0">Détails Photo</p>
    <?php if (isset($_SESSION['admin'])) {
        if ($_SESSION['admin'] != 0) {
            if (!empty($_GET['id'])) { ?>
                <p class="h3 text-center mb-4"><?= $myPicture['picture'] ?></p>
                <form method="POST">
                    <div class="row m-0 p-0">
                        <div class="col-lg-6 m-auto">
                            <img src="../assets/uploadedPictures/<?= $myPicture['picture'] ?>" class="img-fluid" alt="Photo d'une figurine">
                        </div>
                        <div class="col-lg-6 m-auto">
                            <p>Photo ajoutée par : <?= $myPicture['pseudo'] ?></p>
                            <p>Photo de : <?= $myPicture['full_name'] ?></p>
                            <div>
                                <label for="visible">Visible</label>
                            </div>
                            <div>
                                <select class="form-select" name="visible" id="visible">
                                    <option value="0" <?= $myPicture['visible'] == 0 ? 'selected' : '' ?>>Non</option>
                                    <option value="1" <?= $myPicture['visible'] != 0 ? 'selected' : '' ?>>Oui</option>
                                </select>
                                <p class="text-danger">
                                    <?= $arrayErrors['visible'] ?? '' ?>
                                </p>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-success rounded-3 text-white pt-2 pb-2 ps-4 pe-4" name="submitVisible" value="VALIDER">
                                <button type="button" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4" data-bs-toggle="modal" data-bs-target="#deleteModal">Supprimer Photo</button>
                                <a href="adminGallery" class="btn btn-secondary rounded-3 text-white pt-2 pb-2 ps-4 pe-4" name="submitModif" value="Modifier User">Retour à la liste</a>
                            </div>
                        </div>
                    </div>
                </form>
            <?php } else { ?>
                <p class="text-center mt-3">Cette photo n'existe pas</p>
            <?php }
        } else { ?>
            <p class="text-center mt-3">Vous n'avez pas accès à cette page.</p>
        <?php }
    } else { ?>
        <p class="text-center mt-3">Vous n'avez pas accès à cette page.</p>
    <?php } ?>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Suppression de l'utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                Êtes-vous sûr de vouloir supprimer la photo <?= $myPicture['picture'] ?> ?
            </div>
            <div class="modal-footer">
                <form method="POST">
                    <button type="submit" name="deletePicture" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
include("footer.php");
?>