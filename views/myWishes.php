<?php
require_once "../controllers/myWishesController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
    <p class="h3 mb-4 text-center">Mes Souhaits</p>
    <?php if (!empty($_SESSION['id'])) { ?>
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
        <?php if ($_SESSION['display'] == 2) { ?>
            <div class="row m-0 p-0 justify-content-center">
                <?php foreach ($listLimitMyWishes as $figure) { ?>
                    <div class="col-lg-3 mb-3 d-flex items-stretch">
                        <a class="card text-decoration-none text-reset border border-reset" href="figure?id=<?= $figure['id'] ?>">
                            <img src="../assets/pictures/<?= $figure['id'] ?>.jpg" class="card-img-top" alt="Image de la figurine">
                            <div class="card-body d-flex flex-column">
                                <p class="card-title h5 mt-auto text-center"><?= $figure['full_name'] ?></p>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        <?php } else if ($_SESSION['display'] == 1) { ?>
            <div class="row m-0 p-0 justify-content-center">
                <div class="col-lg-8">
                    <table class="table table-bordered">
                        <tbody>
                            <?php foreach ($listLimitMyWishes as $figure) { ?>
                                <tr class="align-middle">
                                    <td width="10%"><img src="../assets/pictures/<?= $figure['id'] ?>-mini.jpg" alt="Image miniature de la figurine"></td>
                                    <td width="90%"><a class="text-decoration-none text-reset" href="figure?id=<?= $figure['id'] ?>"><?= $figure['full_name'] ?></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php } ?>
        <div class="text-center">
            <nav>
                <ul class="pagination justify-content-center">
                    <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                    <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                        <a href="myWishes?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                    </li>
                    <?php for ($page = 1; $page <= $pages; $page++) : ?>
                        <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                        <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                            <a href="myWishes?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                        </li>
                    <?php endfor ?>
                    <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                    <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                        <a href="myWishes?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                    </li>
                </ul>
            </nav>
        </div>
    <?php } else { ?>
        <p class="text-center">Veuillez vous connecter pour avoir accès à cette page</p>
    <?php } ?>
</div>

<?php
include("footer.php");
?>