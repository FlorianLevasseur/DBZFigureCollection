<?php
require_once "../controllers/createUserController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
    <p class="h3 text-center mb-4">Créer Utilisateur</p>
    <?php if (isset($_SESSION['admin'])) {
        if ($_SESSION['admin'] != 0) { ?>
            <div class="row m-0 p-0 justify-content-center">
                <div class="col-lg-6">
                    <form method="POST">
                        <div>
                            <label for="pseudo">Pseudo</label>
                        </div>
                        <div>
                            <input class="form-control" name="pseudo" id="pseudo" type="text" value="<?= $_POST['pseudo'] ?? '' ?>">
                            <p class="text-danger">
                                <?= $arrayErrors['pseudo'] ?? '' ?>
                            </p>
                        </div>
                        <div>
                            <label for="mail">Mail</label>
                        </div>
                        <div>
                            <input class="form-control" name="mail" id="mail" type="mail" value="<?= $_POST['mail'] ?? '' ?>">
                            <p class="text-danger">
                                <?= $arrayErrors['mail'] ?? '' ?>
                            </p>
                        </div>
                        <div>
                            <label for="password">Mot de Passe</label>
                        </div>
                        <div>
                            <input class="form-control" name="password" id="password" type="password">
                            <p class="text-danger">
                                <?= $arrayErrors['password'] ?? '' ?>
                            </p>
                        </div>
                        <div>
                            <label for="confirmPassword">Confirmer Mot de Passe</label>
                        </div>
                        <div>
                            <input class="form-control" name="confirmPassword" id="confirmPassword" type="password">
                            <p class="text-danger">
                                <?= $arrayErrors['confirmPassword'] ?? '' ?>
                            </p>
                        </div>
                        <div>
                            <label for="admin">Admin</label>
                        </div>
                        <div>
                            <select class="form-select" name="admin" id="admin">
                                <option value="0">Non</option>
                                <option value="1">Oui</option>
                            </select>
                            <p class="text-danger">
                                <?= $arrayErrors['admin'] ?? '' ?>
                            </p>
                        </div>
                        <div>
                            <label for="accepted">Accepté</label>
                        </div>
                        <div>
                            <select class="form-select" name="accepted" id="accepted">
                                <option value="0">Non</option>
                                <option value="1">Oui</option>
                            </select>
                            <p class="text-danger">
                                <?= $arrayErrors['accepted'] ?? '' ?>
                            </p>
                        </div>
                        <div class="text-center mt-4">
                            <input type="submit" class="btn greenDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4" name="submitCreate" value="Créer Utilisateur">
                            <a href="adminUser" class="btn blueDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4" name="submitModif" value="Modifier User">Retour à la liste</a>
                        </div>
                    </form>
                </div>
            </div>
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
                <h5 class="modal-title" id="deleteModalLabel">Suppression de l'utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                Êtes-vous sûr de vouloir supprimer l'utilisateur <?= $userInfos['pseudo'] ?> et toutes ses données ?
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