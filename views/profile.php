<?php
require_once "../controllers/profileController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
    <?php if ($_SESSION['id'] == $_GET['id']) { ?>
        <p class="h3 text-center mb-4">Mes Infos</p>
        <div class="row m-0 p-0 justify-content-center">
            <div class="col-lg-7">
                <div>
                    <label>Pseudo</label>
                </div>
                <div>
                    <input class="form-control" value="<?= $userInfos['pseudo'] ?>" disabled>
                </div>
                <div class="mt-3">
                    <label>Mail</label>
                </div>
                <div>
                    <input class="form-control" value="<?= $userInfos['mail'] ?>" disabled>
                </div>
                <p class="text-center mt-2 text-danger">Si vous souhaitez modifier votre Pseudo/Mail, veuillez en faire la demande en indiquant votre nouveau Pseudo/Mail via le formulaire de contact</p>
                <form method="POST" class="mt-5">
                    <p class="mb-2">Changer Mot de Passe :</p>
                    <div>
                        <label for="actualPassword">Mot de Passe Actuel</label>
                    </div>
                    <div>
                        <input class="form-control" type="password" name="actualPassword">
                    </div>
                    <p class="text-danger"><?= $arrayErrors['actualPassword'] ?? '' ?></p>
                    <div>
                        <label for="newPassword">Nouveau Mot de Passe</label>
                    </div>
                    <div>
                        <input class="form-control" type="password" name="newPassword">
                    </div>
                    <p class="text-danger"><?= $arrayErrors['newPassword'] ?? '' ?></p>
                    <div>
                        <label for="confirmPassword">Mot de Passe Actuel</label>
                    </div>
                    <div>
                        <input class="form-control" type="password" name="confirmPassword">
                    </div>
                    <p class="text-danger"><?= $arrayErrors['confirmPassword'] ?? '' ?></p>
                    <div class="text-center">
                        <input type="submit" name="submit" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4 mb-3 mt-3" value="VALIDER">
                    </div>
                </form>
            </div>
            <div class="row m-0 p-0 justify-content-center">
                <a href="myGallery?id=<?= $_SESSION['id'] ?>" class="col-lg-3 col-11 btn myBtn border text-center my-2">
                    <p><i class="bi bi-images h1"></i></p>
                    <p class="h4">Ma Gallerie</p>
                </a>
            </div>
        </div>
    <?php } else if ($existUser == 0) { ?>
        <p class="h3 text-center mb-4">Profil</p>
        <p class="text-center">Cet Utilisateur n'existe pas.</p>
    <?php } else { ?>
        <p class="h3 text-center mb-4">Profil de <?= $userInfos['pseudo'] ?></p>
        <div class="row m-0 p-0 justify-content-around">
            <a href="collection?id=<?= $_GET['id'] ?>" class="col-lg-3 col-11 btn myBtn border text-center my-2">
                <p><i class="bi bi-table h1"></i></p>
                <p class="h4">Sa Collection</p>
            </a>
            <a href="wishes?id=<?= $_GET['id'] ?>" class="col-lg-3 col-11 btn myBtn border text-center my-2">
                <p><i class="bi bi-heart-fill h1"></i></p>
                <p class="h4">Ses Souhaits</p>
            </a>
            <a href="myGallery?id=<?= $_GET['id'] ?>" class="col-lg-3 col-11 btn myBtn border text-center my-2">
                <p><i class="bi bi-images h1"></i></p>
                <p class="h4">Sa Gallerie</p>
            </a>
        </div>
        <div class="text-center mt-3">
            <a href="sendMail?id=<?= $_GET['id'] ?>" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4">CONTACTER <?= strtoupper($userInfos['pseudo']) ?></a>
        </div>
    <?php } ?>
</div>

<?php if (!empty($_SESSION['changePassword'])) { ?>
    <script>
        swal({
            title: "Mot de passe modifié !",
            text: '<?= $_SESSION['changePassword'] ?>',
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