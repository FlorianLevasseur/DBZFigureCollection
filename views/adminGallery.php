<?php
require_once "../controllers/adminGalleryController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
  <p class="h3 text-center mb-4">Gérer Galleries</p>
  <?php if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin'] != 0) { ?>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Photo</th>
            <th scope="col">Visible</th>
            <th scope="col">Détails</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($allPicturesArray as $picture) { ?>
            <tr>
              <td><?= $picture['picture'] ?></td>
              <td><?= $picture['visible'] ?></td>
              <td><a href="modifGallery?id=<?= $picture['id'] ?>" class="btn btn-secondary">Voir Photo</a>
            </tr>
          <?php } ?>
        </tbody>
      </table>
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
      Swal.fire({
        text: "La photo est à présent <?= $_SESSION['visible'] == 0 ? 'invisible' : 'visible' ?> !",
        icon: 'success',
        confirmButtonText: 'Continuer',
        confirmButtonColor: '#cc0921'
      })
    </script>
<?php $_SESSION['visible'] = "2";
  }
} ?>

<?php if (!empty($_SESSION['delete'])) { ?>
  <script>
    Swal.fire({
      text: "La photo <?= $_SESSION['delete'] ?> a bien été supprimé !",
      icon: 'success',
      confirmButtonText: 'Continuer',
      confirmButtonColor: '#cc0921'
    })
  </script>
<?php $_SESSION['delete'] = "";
} ?>

<?php
include("footer.php");
?>