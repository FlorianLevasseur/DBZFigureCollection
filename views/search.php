<?php
require_once "../controllers/searchController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
    <p class="h3 mb-4 text-center">Recherche de figurines</p>
    <?php if (empty($_GET['character'])) { ?>
        <form method="GET" class="row m-0 p-0 pt-4 mb-4">
            <div class="col-lg-3 col-9 m-auto my-3">
                <select class="form-select" id="character" name="character">
                    <option selected disabled>--Choix du personnage --</option>
                    <option value="all">Tous</option>
                    <?php foreach ($allCharactersArray as $figure) { ?>
                        <option value="<?= $figure['character'] ?>"><?= $figure['character'] ?></option>
                    <?php } ?>
                    <!-- <option value="1">Personnage</option>
                        <option value="2">Série</option>
                        <option value="3">Année de sortie</option>
                        <option value="4">Taille</option> -->
                </select>
            </div>
            <!-- <div class="col-lg-3 col-9 m-auto my-3">
                    <select class="form-select" id="inputGroupSelect02" disabled>
                        <option selected disabled>Choix...</option>
                    </select>
                </div>
                <div class="col-lg-3 col-9 m-auto my-3">
                    <select class="form-select" id="inputGroupSelect03" disabled>
                        <option selected disabled>Choix...</option>
                    </select>
                </div> -->
            <div class="col-lg-3 m-auto text-center my-3">
                <button type="submit" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4">RECHERCHER</button>
            </div>
        </form>
    <?php } else if (empty($listLimitCharacter)) { ?>
        <div class="text-center mt-3">
            <p>Cette page n'existe pas.</p>
            <a href="search" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4">RETOUR</a>
        </div>
    <?php } else { ?>
        <div class="row m-0 p-0 justify-content-center">
            <div class="col-lg-7">
                <table class="table table-bordered">
                    <tbody>
                        <?php foreach ($listLimitCharacter as $figure) { ?>
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
                            <a href="search?character=<?= $_GET['character'] ?>&page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                        </li>
                        <?php for ($page = 1; $page <= $pages; $page++) : ?>
                            <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                            <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                                <a href="search?character=<?= $_GET['character'] ?>&page=<?= $page ?>" class="page-link"><?= $page ?></a>
                            </li>
                        <?php endfor ?>
                        <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                        <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                            <a href="search?character=<?= $_GET['character'] ?>&page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="text-center mt-3">
            <a href="search" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4">RETOUR</a>
        </div>
    <?php } ?>

</div>

<?php
include("footer.php");
?>