<?php
require_once "../controllers/adminGalleryController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
  <p class="h3 text-center mb-4">Gérer Galeries</p>
  <?php if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin'] != 0) { ?>
      <div class="row m-0 p-0 justify-content-center">
        <div class="col-lg-10">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Photo</th>
                <th scope="col">Visible</th>
                <th scope="col">Modifier</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($listLimitPictures as $picture) { ?>
                <tr>
                  <td><span class="myHover"><?= $picture['picture'] ?></span>
                    <div class="box"><img src="../assets/uploadedPictures/<?= $picture['picture'] ?>" width="300px"></div>
                  </td>
                  <td class="text-center"><?= $picture['visible'] == 1 ? "<i class='bi bi-check-lg h3 text-success'></i>" : "" ?></td>
                  <td class="text-center"><a href="modifGallery?id=<?= $picture['id'] ?>"><i class="bi bi-pencil-square h3"></i></a>
                </tr>
              <?php } ?>
            </tbody>
          </table>
          <nav>
            <ul class="pagination justify-content-center">
              <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
              <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                <a href="adminGallery?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
              </li>
              <?php for ($page = 1; $page <= $pages; $page++) : ?>
                <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                  <a href="adminGallery?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                </li>
              <?php endfor ?>
              <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
              <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                <a href="adminGallery?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    <?php } else { ?>
      <p class="text-center">Vous n'avez pas accès à cette page.</p>
    <?php }
  } else { ?>
    <p class="text-center">Vous n'avez pas accès à cette page.</p>
  <?php } ?>
</div>

<?php if (isset($_SESSION['visible'])) {
  if ($_SESSION['visible'] === "0" || $_SESSION['visible'] == 1) { ?>
    <script>
      swal({
        title: "Photo modifiée !",
        text: "La photo est à présent <?= $_SESSION['visible'] == 0 ? 'invisible' : 'visible' ?> !",
        icon: 'success',
        dangerMode: true,
        button: {
          text: "Continuer"
        }
      })
    </script>
<?php $_SESSION['visible'] = "2";
  }
} ?>

<?php if (!empty($_SESSION['delete'])) { ?>
  <script>
    swal({
      title: "Photo supprimée !",
      text: "La photo <?= $_SESSION['delete'] ?> a bien été supprimé !",
      icon: 'success',
      dangerMode: true,
      button: {
        text: "Continuer"
      }
    })
  </script>
<?php $_SESSION['delete'] = "";
} ?>

<?php
include("footer.php");
?>