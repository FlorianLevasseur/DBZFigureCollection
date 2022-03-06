<?php
require_once "../controllers/sendMailController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
    <?php if (!isset($_SESSION['id'])) { ?>
        <p class="h3 mb-4 text-center">Contacter Utilisateur</p>
        <p class="text-center">Veuillez vous connecter pour avoir accès à cette page</p>
    <?php } else if ($existUser == 0) { ?>
        <p class="h3 mb-4 text-center">Contacter Utilisateur</p>
        <p class="text-center">Cet Utilisateur n'existe pas.</p>
    <?php } else if ($_SESSION['id'] == $_GET['id']) { ?>
        <p class="h3 mb-4 text-center">Contacter Utilisateur</p>
        <p class="text-center">Vous ne pouvez pas vous contacter vous-même</p>
    <?php } else { ?>
        <div class="row m-0 p-0 justify-content-center mb-4">
            <div class="col-lg-8 text-center">
                <p class="h3 mb-4">Contacter <?= $userInfos['pseudo'] ?></p>
                <form method="POST">
                    <div class="form-group row m-0 p-0 pb-3">
                        <label for="subject" class="col-4 form-control-label m-auto">Sujet</label>
                        <div class="col-7">
                            <input class="form-control" type="text" name="subject" id="subject" value="<?= $_POST['subject'] ?? '' ?>">
                        </div>
                        <div class="col-1"></div>
                    </div>
                    <p class="text-danger"><?= $arrayErrors['subject'] ?? '' ?></p>
                    <div class="form-group row m-0 p-0 pb-3">
                        <label for="message" class="col-4 form-control-label mt-2">Votre message</label>
                        <div class="col-7">
                            <textarea class="form-control" name="message" id="message" rows="10" value="<?= $_POST['message'] ?? '' ?>"></textarea>
                        </div>
                        <div class="col-1"></div>
                    </div>
                    <p class="text-danger"><?= $arrayErrors['message'] ?? '' ?></p>
                    <div class="g-recaptcha" data-sitekey="6Lf1mWkeAAAAAFcql27Pj22nPnif5qNQ8kEqQIFy"></div>
                    <p class="text-danger"><?= $arrayErrors['captcha'] ?? '' ?><?= $arrayErrors['send'] ?? '' ?></p>
                    <input type="submit" name="submit" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4 mt-3 mb-3" value="ENVOYER">
                </form>
            </div>
        </div>
    <?php } ?>
</div>

<?php
include("footer.php");
?>