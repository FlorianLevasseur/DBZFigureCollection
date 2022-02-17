<?php
require_once "../controllers/wishesController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
    <?php if (empty($_SESSION['id'])) { ?>
        <p class="text-center">Veuillez vous connecter pour avoir accès à cette page</p>
    <?php } else if ($existUser == 0) { ?>
        <p class="text-center">Cet Utilisateur n'existe pas</p>
    <?php } else { ?>
        <p class="h3 mb-4 text-center">Souhaits de <?= $userInfos['pseudo'] ?></p>
        <div class="row m-0 p-0 justify-content-center">
            <div class="col-lg-7">
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
        </div>
        <div class="text-center mt-3">
            <a href="profile?id=<?= $_GET['id'] ?>" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4">RETOUR</a>
        </div>
    <?php } ?>
</div>

<?php
include("footer.php");
?>