<?php
require_once "../controllers/accountController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
  <div class="row justify-content-center mb-4">
    <div class="col-lg-6 text-center">
      <p class="h3 mb-4">Votre compte</p>
    </div>
  </div>
  <div class="row justify-content-around m-0">
    <a href="#" class="col-lg-3 btn myBtn border text-center my-2">
      <p><i class="bi bi-person h1"></i></p>
      <p class="h4">Mes infos</p>
    </a>
    <a href="myCollection" class="col-lg-3 btn myBtn border text-center my-2">
      <p><i class="bi bi-table h1"></i></p>
      <p class="h4">Ma Collection</p>
    </a>
    <a href="myWishes" class="col-lg-3 btn myBtn border text-center my-2">
      <p><i class="bi bi-heart-fill h1"></i></p>
      <p class="h4">Mes Souhaits</p>
    </a>
  </div>
  <form method="POST">
    <div class="row justify-content-around m-0">
      <?php if ($_SESSION['admin'] != 0) { ?>
        <a class="col-lg-3 btn myBtn border text-center my-2">
          <p><i class="bi bi-gear h1"></i><i class="bi bi-table h1"></i></p>
          <p class="h4">Gérer Figurines</p>
        </a>
      <?php } ?>
      <button type="submit" name="submit" id="submit" class="col-lg-3 btn myBtn border text-center my-2">
        <p><i class="bi bi-power h1"></i></p>
        <p class="h4">Déconnexion</p>
      </button>
      <?php if ($_SESSION['admin'] != 0) { ?>
        <a class="col-lg-3 btn myBtn border text-center my-2">
          <p><i class="bi bi-gear h1"></i><i class="bi bi-person h1"></i></p>
          <p class="h4">Gérer Utilisateurs</p>
        </a>
      <?php } ?>
    </div>
  </form>
</div>

<?php if (!empty($_SESSION['create'])) { ?>
  <script>
    Swal.fire({
      text: "Votre compte à bien été créé !",
      icon: 'success',
      confirmButtonText: 'Continuer',
      confirmButtonColor: '#cc0921'
    })
  </script>
<?php $_SESSION['create'] = "";
} ?>

<?php
include("footer.php");
?>