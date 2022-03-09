<?php
require_once "../controllers/removeFigureSerieController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
    <p class="h3 text-center mb-0">Retirer une série à la Figurine</p>
    <?php if (isset($_SESSION['admin'])) {
        if ($_SESSION['admin'] != 0) {
            if (!empty($_GET['id'])) { ?>
                <p class="h3 text-center mb-4"><?= $figureInfos['full_name'] ?></p>
                <form method="POST">
                    <div class="row m-0 p-0 justify-content-center">
                        <div class="col-lg-6 m-auto">
                            <div>
                                <label for="serie">Série</label>
                            </div>
                            <div>
                                <select class="form-select" name="serie" id="serie">
                                    <option value="557" selected disabled>-- Choix d'une Série --</option>
                                    <?php foreach ($figureSeriesArray as $serie) { ?>
                                        <option value="<?= $serie['id'] ?>"><?= $serie['serie'] ?></option>
                                    <?php } ?>
                                </select>
                                <p class="text-danger">
                                    <?= $arrayErrors['serie'] ?? '' ?>
                                </p>
                            </div>
                            <div class="text-center mt-4">
                                <input type="submit" class="btn greenDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4" name="submitSerie" value="Retirer Serie">
                                <a href="modifFigure?id=<?= $_GET['id'] ?>" class="btn blueDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4">Retour à la Figurine</a>
                            </div>
                        </div>
                    </div>
                </form>
            <?php } else { ?>
                <p class="text-center mt-3">Cete Figurine n'existe pas</p>
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