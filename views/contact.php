<?php
require_once "../controllers/contactController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
    <div class="row m-0 p-0 justify-content-center mb-4">
        <div class="col-lg-8">
            <p class="h3 mb-4 text-center">Contact</p>
            <form method="POST">
                <div class="form-group row m-0 p-0 pb-3">
                    <label for="pseudo" class="col-lg-4 form-control-label pt-2 alignLabel">Nom</label>
                    <div class="col-lg-7">
                        <input class="form-control" type="text" name="pseudo" id="pseudo" value="<?= $_POST['pseudo'] ?? '' ?>">
                        <p class="text-danger"><?= $arrayErrors['name'] ?? '' ?></p>
                    </div>
                    <div class="col-1"></div>
                </div>
                <div class="form-group row m-0 p-0 pb-3">
                    <label for="mail" class="col-lg-4 form-control-label pt-2 alignLabel">E-mail</label>
                    <div class="col-lg-7">
                        <input class="form-control" type="mail" name="mail" id="mail" value="<?= $_POST['mail'] ?? '' ?>">
                        <p class="text-danger"><?= $arrayErrors['mail'] ?? '' ?></p>
                    </div>
                    <div class="col-1"></div>
                </div>

                <div class="form-group row m-0 p-0 pb-3">
                    <label for="subject" class="col-lg-4 form-control-label pt-2 alignLabel">Sujet</label>
                    <div class="col-lg-7">
                        <input class="form-control" type="text" name="subject" id="subject" value="<?= $_POST['subject'] ?? '' ?>">
                        <p class="text-danger"><?= $arrayErrors['subject'] ?? '' ?></p>
                    </div>
                    <div class="col-1"></div>
                </div>
                <div class="form-group row m-0 p-0 pb-3">
                    <label for="message" class="col-lg-4 form-control-label pt-2 alignLabel">Votre message</label>
                    <div class="col-lg-7">
                        <textarea class="form-control" name="message" id="message" rows="10" value="<?= $_POST['message'] ?? '' ?>"></textarea>
                        <p class="text-danger"><?= $arrayErrors['message'] ?? '' ?></p>
                    </div>
                    <div class="col-1"></div>
                </div>
                <div class="g-recaptcha" data-sitekey="6Lf1mWkeAAAAAFcql27Pj22nPnif5qNQ8kEqQIFy"></div>
                <p class="text-danger text-center"><?= $arrayErrors['captcha'] ?? '' ?><?= $arrayErrors['send'] ?? '' ?></p>
                <div class="text-center">
                    <input type="submit" name="submit" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4 mt-3 mb-3" value="ENVOYER">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>