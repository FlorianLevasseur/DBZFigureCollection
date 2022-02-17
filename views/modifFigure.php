<?php
require_once "../controllers/modifFigureController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
    <p class="h3 text-center mb-4">Modifier Figurine</p>
    <?php if (isset($_SESSION['admin'])) {
        if ($_SESSION['admin'] != 0) {
            if (!empty($_GET['id'])) { ?>
                <form enctype="multipart/form-data" method="POST">
                    <div class="row m-0 p-0 justify-content-center">
                        <div class="col-lg-4 text-center m-auto">
                            <div>
                                <label for="picture">Image</label>
                            </div>
                            <div>
                                <img src="../assets/pictures/<?= $_GET['id'] ?>.jpg" name="picture" id="picture" class="img-fluid" alt="Photo d'une figurine">
                            </div>
                            <p>Modifier Image :</p>
                            <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
                            <p class="text-danger">
                                <?= $arrayErrors['success'] ?? '' ?>
                                <?= $arrayErrors['format'] ?? '' ?>
                                <?= $arrayErrors['type'] ?? '' ?>
                                <?= $arrayErrors['nok'] ?? '' ?>
                            </p>
                            <div>
                                <label for="pictureMini">Miniature</label>
                            </div>
                            <div>
                                <img src="../assets/pictures/<?= $_GET['id'] ?>-mini.jpg" name="pictureMini" id="pictureMini" class="img-fluid text-center" alt="Photo d'une figurine">
                            </div>
                            <p>Modifier Miniature :</p>
                            <input type="file" name="fileToUploadMini" id="fileToUploadMini"><br><br>
                            <p class="text-danger">
                                <?= $arrayErrors['successMini'] ?? '' ?>
                                <?= $arrayErrors['formatMini'] ?? '' ?>
                                <?= $arrayErrors['typeMini'] ?? '' ?>
                                <?= $arrayErrors['nokMini'] ?? '' ?>
                            </p>
                        </div>
                        <div class="col-lg-6 m-auto">
                            <div>
                                <label for="full_name">Nom Complet</label>
                            </div>
                            <div>
                                <input class="form-control" name="full_name" id="full_name" type="text" value="<?= $figureInfos['full_name'] ?>">
                                <p class="text-danger">
                                    <?= $arrayErrors['full_name'] ?? '' ?>
                                </p>
                            </div>
                            <div>
                                <label for="origin">Origine</label>
                            </div>
                            <div>
                                <input class="form-control" name="origin" id="origin" type="text" value="<?= $figureInfos['origin'] ?>">
                                <p class="text-danger">
                                    <?= $arrayErrors['origin'] ?? '' ?>
                                </p>
                            </div>
                            <div>
                                <label for="character">Personnage</label>
                            </div>
                            <div>
                                <input class="form-control" name="character" id="character" type="text" value="<?= $figureInfos['character'] ?>">
                                <p class="text-danger">
                                    <?= $arrayErrors['character'] ?? '' ?>
                                </p>
                            </div>
                            <div>
                                <label for="form">Forme</label>
                            </div>
                            <div>
                                <input class="form-control" name="form" id="form" type="text" value="<?= $figureInfos['form'] ?>">
                                <p class="text-danger">
                                    <?= $arrayErrors['form'] ?? '' ?>
                                </p>
                            </div>
                            <div>
                                <label for="height">Taille</label>
                            </div>
                            <div>
                                <input class="form-control" name="height" id="height" type="text" value="<?= $figureInfos['height'] ?>">
                                <p class="text-danger">
                                    <?= $arrayErrors['height'] ?? '' ?>
                                </p>
                            </div>
                            <div>
                                <label for="date">Date de sortie</label>
                            </div>
                            <div>
                                <input class="form-control" name="date" id="date" type="date" value="<?= $figureInfos['date'] ?>">
                                <p class="text-danger">
                                    <?= $arrayErrors['date'] ?? '' ?>
                                </p>
                            </div>
                            <div>
                                <label for="id_company">Éditeur</label>
                            </div>
                            <div>
                                <select class="form-control" name="id_company" id="id_company">
                                    <?php foreach ($allCompaniesArray as $company) { ?>
                                        <option value="<?= $company['id'] ?>" <?= $figureInfos['id_company'] == $company['id'] ? 'selected' : '' ?>><?= $company['company'] ?></option>
                                    <?php } ?>
                                </select>
                                <p class="text-danger">
                                    <?= $arrayErrors['company'] ?? '' ?>
                                </p>
                            </div>
                            <div>
                                <label for="serie">Série(s)</label>
                            </div>
                            
                            <?php foreach($allFigureSeries as $serie) { ?>
                                <p class="mb-1"><?= $serie['serie'] ?></p>
                            <?php } ?>
                           
                            <div class="g-recaptcha" data-sitekey="6Lf1mWkeAAAAAFcql27Pj22nPnif5qNQ8kEqQIFy"></div>
                            <p class="text-danger text-center">
                                <?= $arrayErrors['captcha'] ?? '' ?>
                            </p>
                            <div class="text-center">
                                <input type="submit" class="btn btn-success rounded-3 text-white pt-2 pb-2 ps-4 pe-4" name="submitModif" value="Modifier Figurine">
                                <button type="button" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4" data-bs-toggle="modal" data-bs-target="#deleteModal">Supprimer Figurine</button>
                                <a href="adminFigure" class="btn btn-secondary rounded-3 text-white pt-2 pb-2 ps-4 pe-4">Retour à la liste</a>
                                <a href="addFigureSerie?id=<?= $_GET['id'] ?>" class="btn btn-success rounded-3 text-white pt-2 pb-2 ps-4 pe-4 mt-3">Ajouter une Série</a>
                                <a href="removeFigureSerie?id=<?= $_GET['id'] ?>" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4 mt-3">Retirer une Série</a>
                            </div>
                        </div>
                    </div>
                </form>
            <?php } else { ?>
                <p class="text-center">Cete Figurine n'existe pas</p>
            <?php }
        } else { ?>
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

<?php if (!empty($_SESSION['addSerie'])) { ?>
    <script>
        Swal.fire({
            text: "La Série <?= $_SESSION['addSerie'] ?> a bien été ajoutée !",
            icon: 'success',
            confirmButtonText: 'Continuer',
            confirmButtonColor: '#cc0921'
        })
    </script>
<?php $_SESSION['addSerie'] = "";
} ?>

<?php if (!empty($_SESSION['removeSerie'])) { ?>
    <script>
        Swal.fire({
            text: "La Série <?= $_SESSION['removeSerie'] ?> a bien été retirée !",
            icon: 'success',
            confirmButtonText: 'Continuer',
            confirmButtonColor: '#cc0921'
        })
    </script>
<?php $_SESSION['removeSerie'] = "";
} ?>

<?php
include("footer.php");
?>