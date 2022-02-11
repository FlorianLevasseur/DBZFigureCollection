<?php
require_once "../controllers/connexionController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
  <div class="row justify-content-center mb-4">
    <div class="col-lg-6 text-center">
      <p class="h3 mb-4">Connectez-vous à votre compte</p>
      <form method="POST" class="connectForm pt-4">
        <div class="form-group row pb-3">
          <label for="mail" class="col-4 form-control-label m-auto">E-Mail</label>
          <div class="col-7">
            <input class="form-control" type="text" name="mail" id="mail">
          </div>
          <div class="col-1"></div>
        </div>
        <div class="form-group row pb-3">
          <label for="password" class="col-4 form-control-label m-auto">Mot de Passe</label>
          <div class="col-7">
            <input class="form-control" type="password" name="password" id="password">
          </div>
          <div class="col-1"></div>
        </div>
        <p><a href="#" class="pb-3">Mot de passe oublié ?</a></p>
        <input type="submit" name="submit" id="submit" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4 mb-3" value="CONNEXION">
        <p class="text-danger"><?= $arrayErrors['connect'] ?? '' ?></p>
        <hr>
        <p>Pas de compte ? <a href="createAccount">Créez-en un !</a></p>
      </form>
    </div>
  </div>
</div>

<?php if (!empty($_SESSION['accept'])) { ?>
  <script>
    Swal.fire({
      text: "Désolé mais votre compte est en attente d'acceptation par un administrateur. Vous ne pouvez pas vous connecter pour l'instant !",
      icon: 'error',
      confirmButtonText: 'Continuer',
      confirmButtonColor: '#cc0921'
    })
  </script>
<?php $_SESSION['accept'] = "";
} ?>

<?php
include("footer.php");
?>