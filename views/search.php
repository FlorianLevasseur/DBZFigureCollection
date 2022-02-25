<?php
require_once "../controllers/searchController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
    <p class="h3 text-center">Recherche de figurines</p>
    <?php if (isset($_GET['character'])) { ?>
        <p class="h3 mb-4 text-center"><?= $_GET['character'] ?></p>
    <?php } else if (isset($_GET['serie'])) { ?>
        <p class="h3 mb-4 text-center"><?= $_GET['serie'] ?></p>
    <?php } else if (isset($_GET['year'])) { ?>
        <p class="h3 mb-4 text-center"><?= $_GET['year'] ?></p>
    <?php } else if (isset($_GET['height'])) {
        $heightArray = explode("-", $_GET['height']) ?>
        <p class="h3 mb-4 text-center">entre <?= $heightArray[0] ?> et <?= $heightArray[1] ?> cm</p>
    <?php } ?>
    <?php if (empty($_GET['character']) && empty($_GET['serie']) && empty($_GET['year']) && empty($_GET['height'])) { ?>
        <form method="GET">
            <div class="row m-0 p-0 justify-content-center">
                <div class="col-lg-3 col-9 my-3">
                    <select class="form-select" id="select1" onchange="getdata1()">
                        <option value="" selected disabled>-- Rechercher par --</option>
                        <option value="1">Personnage</option>
                        <option value="2">Série</option>
                        <option value="3">Date de sortie</option>
                        <option value="4">Taille</option>
                    </select>
                </div>
                <div class="col-lg-3 col-9 my-3">
                    <select class="form-select" id="select2" disabled>
                        <option selected disabled>Choix...</option>
                    </select>
                </div>
                <div class="col-lg-3 text-center my-3">
                    <button type="submit" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4" id="submitSearch" disabled>RECHERCHER</button>
                </div>
            </div>
        </form>
    <?php } else if (empty($listLimitCharacter)) { ?>
        <div class="text-center mt-3">
            <p>Cette page n'existe pas.</p>
            <a href="search" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4">RETOUR</a>
        </div>
    <?php } else { ?>
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
        <div class="row m-0 p-0 justify-content-center">
            <?php if ($_SESSION['display'] == 2) { ?>
                <?php foreach ($listLimitCharacter as $figure) { ?>
                    <div class="col-lg-3 mb-3 d-flex items-stretch">
                        <a class="card text-decoration-none text-reset border border-reset" href="figure?id=<?= $figure['id'] ?>">
                            <img src="../assets/pictures/<?= $figure['id'] ?>.jpg" class="card-img-top" alt="Image de la figurine">
                            <div class="card-body d-flex flex-column">
                                <p class="card-title h5 mt-auto text-center"><?= $figure['full_name'] ?></p>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            <?php } else if ($_SESSION['display'] == 1) { ?>
                <div class="col-lg-8">
                    <table class="table table-bordered">
                        <tbody>
                            <?php foreach ($listLimitCharacter as $figure) { ?>
                                <form method="POST">
                                <tr class="align-middle">
                                    <td width="10%"><img src="../assets/pictures/<?= $figure['id'] ?>-mini.jpg" alt="Image miniature de la figurine"></td>
                                    <td width="80%"><a class="text-decoration-none text-reset" href="figure?id=<?= $figure['id'] ?>"><?= $figure['full_name'] ?></a></td>
                                    <!-- <td width="10%" class="text-center"><input type="submit" name="submit-??= $figure['id'] ??" value="Ajouter"></td> -->
                                </tr>
                                </form>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } ?>
                <?php if (isset($_GET['character'])) { ?>
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
                <?php } else if (isset($_GET['serie'])) { ?>
                    <nav>
                        <ul class="pagination justify-content-center">
                            <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                            <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                                <a href="search?serie=<?= $_GET['serie'] ?>&page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                            </li>
                            <?php for ($page = 1; $page <= $pages; $page++) : ?>
                                <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                                <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                                    <a href="search?serie=<?= $_GET['serie'] ?>&page=<?= $page ?>" class="page-link"><?= $page ?></a>
                                </li>
                            <?php endfor ?>
                            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                            <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                                <a href="search?serie=<?= $_GET['serie'] ?>&page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                            </li>
                        </ul>
                    </nav>
                <?php } else if (isset($_GET['year'])) { ?>
                    <nav>
                        <ul class="pagination justify-content-center">
                            <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                            <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                                <a href="search?year=<?= $_GET['year'] ?>&page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                            </li>
                            <?php for ($page = 1; $page <= $pages; $page++) : ?>
                                <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                                <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                                    <a href="search?year=<?= $_GET['year'] ?>&page=<?= $page ?>" class="page-link"><?= $page ?></a>
                                </li>
                            <?php endfor ?>
                            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                            <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                                <a href="search?year=<?= $_GET['year'] ?>&page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                            </li>
                        </ul>
                    </nav>
                <?php } else if (isset($_GET['height'])) { ?>
                    <nav>
                        <ul class="pagination justify-content-center">
                            <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                            <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                                <a href="search?height=<?= $_GET['height'] ?>&page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                            </li>
                            <?php for ($page = 1; $page <= $pages; $page++) : ?>
                                <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                                <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                                    <a href="search?height=<?= $_GET['height'] ?>&page=<?= $page ?>" class="page-link"><?= $page ?></a>
                                </li>
                            <?php endfor ?>
                            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                            <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                                <a href="search?height=<?= $_GET['height'] ?>&page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                            </li>
                        </ul>
                    </nav>
                <?php } ?>
                <?php if ($_SESSION['display'] == 1) { ?>
                </div>
            <?php } ?>
        </div>
        <div class="text-center mt-3">
            <a href="search" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4">RETOUR</a>
        </div>
    <?php } ?>

</div>
<script type="text/javascript">
    function getdata1() {
        var select1 = $('#select1').val();
        if (select1) {
            $.ajax({
                type: 'post',
                url: './getdata.php',
                data: {
                    select1: select1,
                },
                success: function(response) {
                    $('#select2').html(response);
                }
            });
        } else {
            $('#select2').html("");
        }
    }
</script>
<?php
include("footer.php");
?>