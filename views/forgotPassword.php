<?php
require_once "../controllers/forgotPasswordController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
    <div class="row justify-content-center mb-4">
        <div class="col-lg-6 text-center">
            <p class="h3 mb-4">Mot de passe oublié</p>
            <form method="POST" class="border border-reset pt-4">
                <p>Veuillez entrer le mail de votre compte afin de recevoir un mot de passe temporaire :</p>
                <div class="form-group row pb-3">
                    <label for="mail" class="col-4 form-control-label m-auto">E-Mail</label>
                    <div class="col-7">
                        <input class="form-control" type="text" name="mail" id="mail">
                    </div>
                    <div class="col-1"></div>
                </div>
                <p class="text-danger"><?= $arrayErrors['mail'] ?? '' ?></p>
                <input type="submit" name="submit" id="submit" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4 mb-3" value="ENVOYER">
                <a href="connexion" class="btn btn-secondary rounded-3 text-white pt-2 pb-2 ps-4 pe-4 mb-3">RETOUR CONNEXION</a>
            </form>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>