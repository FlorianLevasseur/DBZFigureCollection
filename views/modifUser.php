<?php
require_once "../controllers/modifUserController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
    <p class="h3 text-center mb-4">Modifier Utilisateur</p>
    <?php if (isset($_SESSION['admin'])) {
        if ($_SESSION['admin'] != 0) {
            if (!empty($_GET['id'])) { ?>
                <div class="row m-0 p-0 justify-content-center">
                    <div class="col-lg-6">
                        <form method="POST">
                            <div>
                                <label for="pseudo">Pseudo</label>
                            </div>
                            <div>
                                <input class="form-control" name="pseudo" id="pseudo" type="text" value="<?= $userInfos['pseudo'] ?>">
                                <p class="text-danger">
                                    <?= $arrayErrors['pseudo'] ?? '' ?>
                                </p>
                            </div>
                            <div>
                                <label for="mail">Mail</label>
                            </div>
                            <div>
                                <input class="form-control" name="mail" id="mail" type="text" value="<?= $userInfos['mail'] ?>">
                                <p class="text-danger">
                                    <?= $arrayErrors['mail'] ?? '' ?>
                                </p>
                            </div>
                            <div>
                                <label for="admin">Admin</label>
                            </div>
                            <div>
                                <select class="form-select" name="admin" id="admin">
                                    <option value="0" <?= $userInfos['admin'] == 0 ? 'selected' : '' ?>>Non</option>
                                    <option value="1" <?= $userInfos['admin'] != 0 ? 'selected' : '' ?>>Oui</option>
                                </select>
                                <p class="text-danger">
                                    <?= $arrayErrors['admin'] ?? '' ?>
                                </p>
                            </div>
                            <div>
                                <label for="accepted">Accept??</label>
                            </div>
                            <div>
                                <select class="form-select" name="accepted" id="accepted">
                                    <option value="0" <?= $userInfos['accepted'] == 0 ? 'selected' : '' ?>>Non</option>
                                    <option value="1" <?= $userInfos['accepted'] != 0 ? 'selected' : '' ?>>Oui</option>
                                </select>
                                <p class="text-danger">
                                    <?= $arrayErrors['accepted'] ?? '' ?>
                                </p>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn greenDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4 mt-3" name="submitModif" value="Modifier Utilisateur">
                                <button type="button" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4 mt-3" data-bs-toggle="modal" data-bs-target="#deleteModal">Supprimer Utilisateur</button>
                                <a href="adminUser" class="btn blueDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4 mt-3">Retour ?? la liste</a>
                            </div>
                        </form>
                    </div>
                </div>
            <?php } else { ?>
                <p class="text-center">Cet Utilisateur n'existe pas</p>
            <?php }
        } else { ?>
            <p class="text-center">Vous n'avez pas acc??s ?? cette page.</p>
        <?php }
    } else { ?>
        <p class="text-center">Vous n'avez pas acc??s ?? cette page.</p>
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
                ??tes-vous s??r de vouloir supprimer l'utilisateur <?= $userInfos['pseudo'] ?> et toutes ses donn??es ?
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