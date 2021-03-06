<?php
require_once "../controllers/myCollectionController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
    <p class="h3 mb-4 text-center">Ma Collection</p>
    <?php if (!empty($_SESSION['id'])) { ?>
        <form method="POST">
            <div class="row m-0 p-0 justify-content-center">
                <div class="col-lg-4 col-6 mb-4">
                    <label for="sort">Tri</label><br>
                    <select name="sort" onchange="this.form.submit()">
                        <option value="1" <?= $_SESSION['sort'] == 1 ? 'selected' : '' ?>>Date de Mise en Ligne</option>
                        <option value="2" <?= $_SESSION['sort'] == 2 ? 'selected' : '' ?>>Nom Complet</option>
                        <option value="4" <?= $_SESSION['sort'] == 4 ? 'selected' : '' ?>>Personnage</option>
                        <option value="5" <?= $_SESSION['sort'] == 5 ? 'selected' : '' ?>>Forme</option>
                        <option value="6" <?= $_SESSION['sort'] == 6 ? 'selected' : '' ?>>Taille</option>
                        <option value="7" <?= $_SESSION['sort'] == 7 ? 'selected' : '' ?>>Date de Sortie</option>
                    </select>
                </div>
                <div class="col-lg-4 col-6 text-end">
                    <label for="display">Affichage</label><br>
                    <select name="display" onchange="this.form.submit()">
                        <option value="1" <?= $_SESSION['display'] == 1 ? 'selected' : '' ?>>Liste</option>
                        <option value="2" <?= $_SESSION['display'] == 2 ? 'selected' : '' ?>>Grille</option>
                    </select>
                </div>
            </div>
        </form>
        <?php if ($_SESSION['display'] == 2) { ?>
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
                                <form method="POST" class="mt-auto">
                                    <div class="text-center border-top">
                                        <button class='btn shadow-none' type='submit' name='submit-remove-collec-<?= $figure['id'] ?>'><i class='bi bi-x-circle-fill redDBZColor h3'></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } else if ($_SESSION['display'] == 1) { ?>
            <div class="row m-0 p-0 justify-content-center">
                <div class="col-lg-10">
                    <table class="table table-bordered">
                        <tbody>
                            <form method="POST">
                                <?php foreach ($listLimitMyFigures as $figure) { ?>
                                    <tr class="align-middle">
                                        <td width="5%" class="text-center"><img src="../assets/pictures/<?= $figure['id'] ?>-mini.jpg" alt="Image miniature de la figurine"></td>
                                        <td width="90%"><a class="text-decoration-none text-reset" href="figure?id=<?= $figure['id'] ?>"><?= $figure['full_name'] ?></a></td>
                                        <td width="5%"><button class='btn shadow-none' type='submit' name='submit-remove-collec-<?= $figure['id'] ?>'><i class='bi bi-x-circle-fill redDBZColor h3'></i></button></td>
                                    </tr>
                                <?php } ?>
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php } ?>
        <div class=" text-center">
            <nav>
                <ul class="pagination justify-content-center">
                    <!-- Lien vers la page pr??c??dente (d??sactiv?? si on se trouve sur la 1??re page) -->
                    <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                        <a href="myCollection?page=<?= $currentPage - 1 ?>" class="page-link">Pr??c??dente</a>
                    </li>
                    <?php for ($page = 1; $page <= $pages; $page++) : ?>
                        <!-- Lien vers chacune des pages (activ?? si on se trouve sur la page correspondante) -->
                        <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                            <a href="myCollection?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                        </li>
                    <?php endfor ?>
                    <!-- Lien vers la page suivante (d??sactiv?? si on se trouve sur la derni??re page) -->
                    <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                        <a href="myCollection?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                    </li>
                </ul>
            </nav>
        </div>
    <?php } else { ?>
        <p class="text-center">Veuillez vous connecter pour avoir acc??s ?? cette page</p>
    <?php } ?>
</div>
<?php if (!empty($_POST)) { ?>
    <script>
        swal({
            title: "Figurine retir??e !",
            text: "La figurine <?= $figureDetailsArray['full_name'] ?> a bien ??t?? retir??e de votre Collection.",
            icon: 'success',
            dangerMode: true,
            button: {
                text: "Continuer"
            }
        })
    </script>
<?php } ?>
<?php
include("footer.php");
?>