<?php
require_once "../controllers/createFigureController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
    <p class="h3 text-center mb-4">Créer Figurine</p>
    <?php if (isset($_SESSION['admin'])) {
        if ($_SESSION['admin'] != 0) { ?>
            <form enctype="multipart/form-data" method="POST">
                <div class="row m-0 p-0 justify-content-center">
                    <div class="col-lg-4 text-center">
                        <div>
                            <label for="picture">Image</label>
                        </div>
                        <div>
                            <img name="picture" id="picture" class="img-fluid">
                        </div>
                        <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
                        <p class="text-danger">
                            <?= $arrayErrors['fileToUpload'] ?? '' ?>
                            <?= $arrayErrors['success'] ?? '' ?>
                            <?= $arrayErrors['format'] ?? '' ?>
                            <?= $arrayErrors['type'] ?? '' ?>
                            <?= $arrayErrors['nok'] ?? '' ?>
                        </p>
                        <div>
                            <label for="pictureMini">Miniature</label>
                        </div>
                        <div>
                            <img name="pictureMini" id="pictureMini" class="img-fluid text-center">
                        </div>
                        <input type="file" name="fileToUploadMini" id="fileToUploadMini"><br><br>
                        <p class="text-danger">
                            <?= $arrayErrors['fileToUploadMini'] ?? '' ?>
                            <?= $arrayErrors['successMini'] ?? '' ?>
                            <?= $arrayErrors['formatMini'] ?? '' ?>
                            <?= $arrayErrors['typeMini'] ?? '' ?>
                            <?= $arrayErrors['nokMini'] ?? '' ?>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <label for="full_name">Nom Complet</label>
                        </div>
                        <div>
                            <input class="form-control" name="full_name" id="full_name" type="text" value="<?= $_POST['full_name'] ?? '' ?>">
                            <p class="text-danger">
                                <?= $arrayErrors['full_name'] ?? '' ?>
                            </p>
                        </div>
                        <div>
                            <label for="origin">Origine</label>
                        </div>
                        <div>
                            <input class="form-control" name="origin" id="origin" type="text" value="<?= $_POST['origin'] ?? '' ?>">
                            <p class="text-danger">
                                <?= $arrayErrors['origin'] ?? '' ?>
                            </p>
                        </div>
                        <div>
                            <label for="character">Personnage</label>
                        </div>
                        <div>
                            <input class="form-control" name="character" id="character" type="text" value="<?= $_POST['character'] ?? '' ?>">
                            <p class="text-danger">
                                <?= $arrayErrors['character'] ?? '' ?>
                            </p>
                        </div>
                        <div>
                            <label for="form">Forme</label>
                        </div>
                        <div>
                            <input class="form-control" name="form" id="form" type="text" value="<?= $_POST['form'] ?? '' ?>">
                            <p class="text-danger">
                                <?= $arrayErrors['form'] ?? '' ?>
                            </p>
                        </div>
                        <div>
                            <label for="height">Taille</label>
                        </div>
                        <div>
                            <input class="form-control" name="height" id="height" type="text" value="<?= $_POST['height'] ?? '' ?>">
                            <p class="text-danger">
                                <?= $arrayErrors['height'] ?? '' ?>
                            </p>
                        </div>
                        <div>
                            <label for="date">Date de sortie</label>
                        </div>
                        <div>
                            <input class="form-control" name="date" id="date" type="date" value="<?= $_POST['date'] ?? '' ?>">
                            <p class="text-danger">
                                <?= $arrayErrors['date'] ?? '' ?>
                            </p>
                        </div>
                        <div>
                            <label for="id_company">Éditeur</label>
                        </div>
                        <div>
                            <select class="form-select" name="id_company" id="id_company">
                                <option value="" selected disabled>-- Choix d'un Éditeur --</option>
                                <?php foreach ($allCompaniesArray as $company) { ?>
                                    <option value="<?= $company['id'] ?>"><?= $company['company'] ?></option>
                                <?php } ?>
                            </select>
                            <p class="text-danger">
                                <?= $arrayErrors['id_company'] ?? '' ?>
                            </p>
                        </div>
                        <div class="text-center mt-4">
                            <input type="submit" class="btn greenDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4" name="submitCreate" value="Ajouter Figurine">
                            <a href="adminFigure" class="btn blueDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4">Retour à la liste</a>
                        </div>
                    </div>
                </div>
            </form>
        <?php } else { ?>
            <p class="text-center">Vous n'avez pas accès à cette page.</p>
        <?php }
    } else { ?>
        <p class="text-center">Vous n'avez pas accès à cette page.</p>
    <?php } ?>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Suppression de la figurine</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                Êtes-vous sûr de vouloir supprimer la figurine <?= $figureInfos['full_name'] ?> ?
            </div>
            <div class="modal-footer">
                <form method="POST">
                    <button type="submit" name="delete" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>