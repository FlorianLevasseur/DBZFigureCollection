<?php
require_once "../controllers/adminFigureController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
    <p class="h3 text-center mb-4">Gérer Figurines</p>
    <?php if (isset($_SESSION['admin'])) {
        if ($_SESSION['admin'] != 0) { ?>
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
                            <td width="10%" class="text-center"><a href="modifFigure?id=<?= $figure['id'] ?>" class="btn btn-secondary">Modifier</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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
                <a href="createFigure" class="btn btn-secondary">Créer Figurine</a>
                <a href="createSerie" class="btn btn-secondary">Créer Série</a>
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
        Swal.fire({
            text: "La Figurine <?= $_SESSION['modif'] ?> a bien été modifiée !",
            icon: 'success',
            confirmButtonText: 'Continuer',
            confirmButtonColor: '#cc0921'
        })
    </script>
<?php $_SESSION['modif'] = "";
} ?>

<?php if (!empty($_SESSION['delete'])) { ?>
    <script>
        Swal.fire({
            text: "La Figurine <?= $_SESSION['delete'] ?> a bien été supprimée !",
            icon: 'success',
            confirmButtonText: 'Continuer',
            confirmButtonColor: '#cc0921'
        })
    </script>
<?php $_SESSION['delete'] = "";
} ?>

<?php if (!empty($_SESSION['create'])) { ?>
    <script>
        Swal.fire({
            text: "La Figurine <?= $_SESSION['create'] ?> a bien été créé !",
            icon: 'success',
            confirmButtonText: 'Continuer',
            confirmButtonColor: '#cc0921'
        })
    </script>
<?php $_SESSION['create'] = "";
} ?>

<?php if (!empty($_SESSION['createSerie'])) { ?>
    <script>
        Swal.fire({
            text: "La Série <?= $_SESSION['create'] ?> a bien été créé !",
            icon: 'success',
            confirmButtonText: 'Continuer',
            confirmButtonColor: '#cc0921'
        })
    </script>
<?php $_SESSION['createSerie'] = "";
} ?>
<?php
include("footer.php");
?>