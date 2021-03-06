<?php
require_once "../controllers/connexionController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
  <div class="row m-0 p-0 justify-content-center mb-4">
    <div class="col-lg-6">
      <p class="h3 mb-4 text-center">Connectez-vous à votre compte</p>
      <form method="POST" class="border border-reset pt-4">
        <div class="form-group row m-0 p-0 pb-3">
          <label for="mail" class="col-lg-4 form-control-label m-auto alignLabel">E-Mail</label>
          <div class="col-lg-7">
            <input class="form-control" type="text" name="mail" id="mail">
          </div>
          <div class="col-1"></div>
        </div>
        <div class="form-group row m-0 p-0 pb-3">
          <label for="password" class="col-lg-4 form-control-label m-auto alignLabel">Mot de Passe</label>
          <div class="col-lg-7">
            <input class="form-control" type="password" name="password" id="password">
          </div>
          <div class="col-1"></div>
        </div>
        <p class="text-center"><a href="forgotPassword" class="pb-3">Mot de passe oublié ?</a></p>
        <div class="text-center">
          <input type="submit" name="submit" id="submit" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4 mb-3" value="CONNEXION">
        </div>
        <p class="text-danger text-center"><?= $arrayErrors['connect'] ?? '' ?></p>
        <hr>
        <p class="text-center">Pas de compte ? <a href="createAccount">Créez-en un !</a></p>
      </form>
    </div>
  </div>
</div>

<?php if (!empty($_SESSION['accept'])) { ?>
  <script>
    swal({
      title: "Compte en attente !",
      text: "Désolé mais votre compte est en attente d'acceptation par un administrateur. Vous ne pouvez pas vous connecter pour l'instant !",
      icon: 'error',
      dangerMode: true,
      button: {
        text: "Continuer"
      }
    })
  </script>
<?php $_SESSION['accept'] = "";
} ?>

<?php if (!empty($_SESSION['changePassword'])) { ?>
  <script>
    swal({
      title: "Mot de passe modifié !",
      text: "Un nouveau mot de passe a bien été envoyé à votre adresse mail ! Merci d'utiliser ce dernier pour vous connecter !",
      icon: 'success',
      dangerMode: true,
      button: {
        text: "Continuer"
      }
    })
  </script>
<?php $_SESSION['changePassword'] = "";
} ?>

<?php
include("footer.php");
?>