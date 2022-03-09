<?php
require_once "../controllers/accountController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
  <div class="row m-0 p-0 justify-content-center mb-4">
    <div class="col-lg-6 text-center">
      <p class="h3 mb-4">Votre compte</p>
    </div>
  </div>
  <div class="row m-0 p-0 justify-content-around m-0">
    <a href="profile?id=<?= $_SESSION['id'] ?>" class="col-lg-3 col-11 btn myBtn border text-center my-2">
      <p><i class="bi bi-person h1"></i></p>
      <p class="h4">Mes infos</p>
    </a>
    <a href="myCollection" class="col-lg-3 col-11 btn myBtn border text-center my-2">
      <p><i class="bi bi-table h1"></i></p>
      <p class="h4">Ma Collection</p>
    </a>
    <a href="myWishes" class="col-lg-3 col-11 btn myBtn border text-center my-2">
      <p><i class="bi bi-heart-fill h1"></i></p>
      <p class="h4">Mes Souhaits</p>
    </a>
  </div>
  <?php if ($_SESSION['admin'] != 0) { ?>
    <div class="row m-0 p-0 justify-content-around m-0">
      <a href="adminUser" class="col-lg-3 col-11 btn myBtn border text-center my-2">
        <p><i class="bi bi-gear h1"></i><i class="bi bi-person h1"></i></p>
        <p class="h4">Gérer Utilisateurs</p>
      </a>
      <a href="adminFigure" class="col-lg-3 col-11 btn myBtn border text-center my-2">
        <p><i class="bi bi-gear h1"></i><i class="bi bi-table h1"></i></p>
        <p class="h4">Gérer Figurines</p>
      </a>
      <a href="adminGallery" class="col-lg-3 col-11 btn myBtn border text-center my-2">
        <p><i class="bi bi-gear h1"></i><i class="bi bi-images h1"></i></p>
        <p class="h4">Gérer Galleries</p>
      </a>
    </div>
  <?php } ?>
  <form method="POST">
    <div class="row m-0 p-0 justify-content-center m-0">

      <button type="submit" name="submit" id="submit" class="col-lg-3 col-11 btn myBtn border text-center my-2">
        <p><i class="bi bi-power h1"></i></p>
        <p class="h4">Déconnexion</p>
      </button>
    </div>
  </form>
</div>

<?php
include("footer.php");
?>