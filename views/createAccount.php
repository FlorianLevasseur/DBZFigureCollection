<?php
require_once "../controllers/createAccountController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
    <div class="row m-0 p-0 justify-content-center mb-4">
        <div class="col-lg-6 text-center">
            <p class="h3 mb-4">Créez votre compte</p>
            <form method="POST" class="border border-reset pt-4">
                <div class="form-group row m-0 p-0 pb-3">
                    <label for="pseudo" class="col-4 form-control-label pt-2">Pseudo</label>
                    <div class="col-7">
                        <input class="form-control" type="text" name="pseudo" id="pseudo" value="<?= $_POST['pseudo'] ?? '' ?>">
                        <p class="text-danger">
                            <?= $arrayErrors['pseudo'] ?? '' ?>
                        </p>
                    </div>
                    <div class="col-1"></div>
                </div>
                <div class="form-group row m-0 p-0 pb-3">
                    <label for="mail" class="col-4 form-control-label pt-2">E-mail</label>
                    <div class="col-7">
                        <input class="form-control" type="mail" name="mail" id="mail" value="<?= $_POST['mail'] ?? '' ?>">
                        <p class="text-danger">
                            <?= $arrayErrors['mail'] ?? '' ?>
                        </p>
                    </div>
                    <div class="col-1"></div>
                </div>
                <div class="form-group row m-0 p-0 pb-3">
                    <label for="password" class="col-4 form-control-label pt-2">Mot de Passe</label>
                    <div class="col-7">
                        <input class="form-control" type="password" name="password" id="password">
                        <p class="text-danger">
                            <?= $arrayErrors['password'] ?? '' ?>
                        </p>
                    </div>
                    <div class="col-1"></div>
                </div>
                <div class="form-group row m-0 p-0 pb-3">
                    <label for="confirmPassword" class="col-4 form-control-label pt-2">Confirmez Mot de Passe</label>
                    <div class="col-7">
                        <input class="form-control" type="password" name="confirmPassword" id="confirmPassword">
                        <p class="text-danger">
                            <?= $arrayErrors['confirmPassword'] ?? '' ?>
                        </p>
                    </div>
                    <div class="col-1"></div>
                </div>
                <div class="form-group row m-0 p-0 pb-3 justify-content-center">
                    <div class="col-8 text-center">
                        <input type="checkbox" name="checkCGU" class="me-2"><label for="checkCGU">J'accepte les Conditions Générales d'Utilisation</label>
                        <p class="text-danger">
                            <?= $arrayErrors['checkCGU'] ?? '' ?>
                        </p>
                    </div>
                </div>
                <div class="form-group row m-0 p-0 pb-3 justify-content-center">
                    <div class="col-6 text-center">
                        <div class="g-recaptcha" data-sitekey="6Lf1mWkeAAAAAFcql27Pj22nPnif5qNQ8kEqQIFy"></div>
                        <p class="text-danger">
                            <?= $arrayErrors['captcha'] ?? '' ?>
                        </p>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4 mt-3 mb-3">ENREGISTRER</button>
                <hr>
                <p>Vous avez déjà un compte ? <a href="connexion">Connectez-vous !</a></p>
            </form>
        </div>
    </div>
</div>
<?php
include("footer.php");
?>