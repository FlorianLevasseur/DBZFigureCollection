<?php
require_once "../controllers/collectionController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
    <?php if (empty($_SESSION['id'])) { ?>
        <p class="h3 mb-4 text-center">Collection</p>
        <p class="text-center">Veuillez vous connecter pour avoir accès à cette page</p>
    <?php } else if ($existUser == 0) { ?>
        <p class="h3 mb-4 text-center">Collection</p>
        <p class="text-center">Cet Utilisateur n'existe pas</p>
    <?php } else { ?>
        <p class="h3 mb-4 text-center">Collection de <?= $userInfos['pseudo'] ?></p>
        <form method="POST">
            <div class="row m-0 p-0 justify-content-center">
                <div class="col-4 mb-4">
                    <label for="sort">Tri </label>
                    <select name="sort" onchange="this.form.submit()">
                        <option value="1" <?= $_SESSION['sort'] == 1 ? 'selected' : '' ?>>Date de Mise en Ligne</option>
                        <option value="2" <?= $_SESSION['sort'] == 2 ? 'selected' : '' ?>>Nom Complet</option>
                        <option value="4" <?= $_SESSION['sort'] == 4 ? 'selected' : '' ?>>Personnage</option>
                        <option value="5" <?= $_SESSION['sort'] == 5 ? 'selected' : '' ?>>Forme</option>
                        <option value="6" <?= $_SESSION['sort'] == 6 ? 'selected' : '' ?>>Taille</option>
                        <option value="7" <?= $_SESSION['sort'] == 7 ? 'selected' : '' ?>>Date de Sortie</option>
                    </select>
                </div>
                <div class="col-4 text-end">
                    <label for="display">Affichage </label>
                    <select name="display" onchange="this.form.submit()">
                        <option value="1" <?= $_SESSION['display'] == 1 ? 'selected' : '' ?>>Liste</option>
                        <option value="2" <?= $_SESSION['display'] == 2 ? 'selected' : '' ?>>Grille</option>
                    </select>
                </div>
            </div>
        </form>
        <?php if ($_SESSION['display'] == 1) { ?>
            <div class="row m-0 p-0 justify-content-center">
                <div class="col-lg-10">
                    <table class="table table-bordered">
                        <tbody>
                            <?php foreach ($listLimitMyFigures as $figure) { ?>
                                <tr class="align-middle">
                                    <td width="5%" class="text-center"><img src="../assets/pictures/<?= $figure['id'] ?>-mini.jpg" alt="Image miniature de la figurine"></td>
                                    <td width="95%"><a class="text-decoration-none text-reset" href="figure?id=<?= $figure['id'] ?>"><?= $figure['full_name'] ?></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php } else if ($_SESSION['display'] == 2) { ?>
            <div class="row m-0 p-0 justify-content-center">
                <?php foreach ($listLimitMyFigures as $figure) { ?>
                    <div class="col-lg-3 mb-3 d-flex items-stretch">
                        <div class="card border border-reset">
                            <a class="text-decoration-none text-reset mb-2" href="figure?id=<?= $figure['id'] ?>">
                                <img src="../assets/pictures/<?= $figure['id'] ?>.jpg" class="card-img-top" alt="Image de la figurine">
                            </a>
                            <div class="card-body d-flex flex-column p-0">
                                <a class="text-decoration-none text-reset my-auto" href="figure?id=<?= $figure['id'] ?>">
                                    <p class="card-title h5 mt-auto text-center p-2"><?= $figure['full_name'] ?></p>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
        <div class="text-center">
            <nav>
                <ul class="pagination justify-content-center">
                    <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                    <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                        <a href="collection?id=<?= $_GET['id'] ?>&page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                    </li>
                    <?php for ($page = 1; $page <= $pages; $page++) : ?>
                        <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                        <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                            <a href="collection?id=<?= $_GET['id'] ?>&page=<?= $page ?>" class="page-link"><?= $page ?></a>
                        </li>
                    <?php endfor ?>
                    <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                    <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                        <a href="collection?id=<?= $_GET['id'] ?>&page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="text-center mt-3">
            <a href="profile?id=<?= $_GET['id'] ?>" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4">RETOUR</a>
        </div>
    <?php } ?>
</div>

<?php
include("footer.php");
?>