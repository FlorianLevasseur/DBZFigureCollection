<?php
require_once "../controllers/adminFigureController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
    <p class="h3 text-center mb-4">Gérer Figurines</p>
    <?php if (isset($_SESSION['admin'])) {
        if ($_SESSION['admin'] != 0) { ?>
            <form method="POST">
                <div class="row m-0 p-0 justify-content-center">
                    <div class="col-lg-4 col-6 mb-4">
                        <label for="sort">Tri </label>
                        <select name="sort" onchange="this.form.submit()">
                            <option value="1" <?= $_SESSION['sort'] == 1 ? 'selected' : '' ?>>Date Mise en Ligne</option>
                            <option value="2" <?= $_SESSION['sort'] == 2 ? 'selected' : '' ?>>Nom Complet</option>
                            <option value="4" <?= $_SESSION['sort'] == 4 ? 'selected' : '' ?>>Personnage</option>
                            <option value="5" <?= $_SESSION['sort'] == 5 ? 'selected' : '' ?>>Forme</option>
                            <option value="6" <?= $_SESSION['sort'] == 6 ? 'selected' : '' ?>>Taille</option>
                            <option value="7" <?= $_SESSION['sort'] == 7 ? 'selected' : '' ?>>Date de Sortie</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-6 text-end">
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
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Nom</th>
                                    <th>Modifier</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listLimitFigures as $figure) { ?>
                                    <tr class="align-middle">
                                        <td width="5%" class="text-center"><img src="../assets/pictures/<?= $figure['id'] ?>-mini.jpg" alt="Image miniature de la figurine"></td>
                                        <td width="85%"><a class="text-decoration-none text-reset" href="figure?id=<?= $figure['id'] ?>"><?= $figure['full_name'] ?></a></td>
                                        <td width="10%" class="text-center"><a href="modifFigure?id=<?= $figure['id'] ?>"><i class="bi bi-pencil-square h3"></i></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php } else if ($_SESSION['display'] == 2) { ?>
                <div class="row m-0 p-0 justify-content-center">
                    <?php foreach ($listLimitFigures as $figure) { ?>
                        <div class="col-lg-3 mb-3 d-flex items-stretch">
                            <div class="card border border-reset">
                                <a class="text-decoration-none text-reset" href="figure?id=<?= $figure['id'] ?>">
                                    <img src="../assets/pictures/<?= $figure['id'] ?>.jpg" class="card-img-top" alt="Image de la figurine">
                                </a>
                                <div class="card-body d-flex flex-column p-0">
                                    <a class="text-decoration-none text-reset my-auto" href="figure?id=<?= $figure['id'] ?>">
                                        <p class="card-title h5 text-center p-2"><?= $figure['full_name'] ?></p>
                                    </a>
                                </div>
                                <div class="text-center mt-auto border-top">
                                    <a href="modifFigure?id=<?= $figure['id'] ?>"><i class="bi bi-pencil-square h3"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            <nav>
                <ul class="pagination justify-content-center">
                    <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                    <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                        <a href="adminFigure?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                    </li>
                    <?php for ($page = 1; $page <= $pages; $page++) : ?>
                        <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                        <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                            <a href="adminFigure?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                        </li>
                    <?php endfor ?>
                    <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                    <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                        <a href="adminFigure?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                    </li>
                </ul>
            </nav>
            <div class="text-center">
                <a href="createFigure" class="btn blueDBZBack text-white">Créer Figurine</a>
                <a href="createSerie" class="btn blueDBZBack text-white">Créer Série</a>
            </div>
        <?php } else { ?>
            <p class="text-center">Vous n'avez pas accès à cette page.</p>
        <?php }
    } else { ?>
        <p class="text-center">Vous n'avez pas accès à cette page.</p>
    <?php } ?>
</div>

<?php if (!empty($_SESSION['modif'])) { ?>
    <script>
        swal({
            title: "Figurine modifiée !",
            text: "La Figurine <?= $_SESSION['modif'] ?> a bien été modifiée !",
            icon: 'success',
            dangerMode: true,
            button: {
                text: "Continuer"
            }
        })
    </script>
<?php $_SESSION['modif'] = "";
} ?>

<?php if (!empty($_SESSION['delete'])) { ?>
    <script>
        swal({
            title: "Figurine supprimée !",
            text: "La Figurine <?= $_SESSION['delete'] ?> a bien été supprimée !",
            icon: 'success',
            dangerMode: true,
            button: {
                text: "Continuer"
            }
        })
    </script>
<?php $_SESSION['delete'] = "";
} ?>

<?php if (!empty($_SESSION['create'])) { ?>
    <script>
        swal({
            title: "Figurine créée !",
            text: "La Figurine <?= $_SESSION['create'] ?> a bien été créée !",
            icon: 'success',
            dangerMode: true,
            button: {
                text: "Continuer"
            }
        })
    </script>
<?php $_SESSION['create'] = "";
} ?>

<?php if (!empty($_SESSION['createSerie'])) { ?>
    <script>
        swal({
            title: "Série créée !",
            text: "La Série <?= $_SESSION['create'] ?> a bien été créé !",
            icon: 'success',
            dangerMode: true,
            button: {
                text: "Continuer"
            }
        })
    </script>
<?php $_SESSION['createSerie'] = "";
} ?>
<?php
include("footer.php");
?>