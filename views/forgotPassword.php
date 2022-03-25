<?php
require_once "../controllers/forgotPasswordController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
    <div class="row m-0 p-0 justify-content-center mb-4">
        <div class="col-lg-6">
            <p class="h3 mb-4 text-center">Mot de passe oublié</p>
            <form method="POST" class="border border-reset pt-4">
                <p class="text-center">Veuillez entrer le mail de votre compte afin de recevoir un mot de passe temporaire :</p>
                <div class="form-group row m-0 p-0 pb-3">
                    <label for="mail" class="col-lg-4 form-control-label pt-2 alignLabel">E-Mail</label>
                    <div class="col-lg-7">
                        <input class="form-control" type="text" name="mail" id="mail">
                        <p class="text-danger"><?= $arrayErrors['mail'] ?? '' ?></p>
                    </div>
                    <div class="col-1"></div>
                </div>

                <div class="text-center">
                    <input type="submit" name="submit" id="submit" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4 mb-3" value="ENVOYER">
                    <a href="connexion" class="btn blueDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4 mb-3">RETOUR CONNEXION</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>