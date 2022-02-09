<?php
session_start();
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
    <div class="row justify-content-center mb-4">
        <div class="col-lg-6 text-center">
            <p class="h3 mb-4">Contact</p>
            <form class="connectForm pt-4">
                <div class="form-group row pb-3">
                    <label for="name" class="col-4 form-control-label m-auto">Nom</label>
                    <div class="col-7">
                        <input class="form-control" type="text" name="name" id="name">
                    </div>
                    <div class="col-1"></div>
                </div>
                <div class="form-group row pb-3">
                    <label for="mail" class="col-4 form-control-label m-auto">E-mail</label>
                    <div class="col-7">
                        <input class="form-control" type="mail" name="mail" id="mail">
                    </div>
                    <div class="col-1"></div>
                </div>
                <div class="form-group row pb-3">
                    <label for="message" class="col-4 form-control-label m-auto">Votre message</label>
                    <div class="col-7">
                        <textarea class="form-control" name="message" id="message"></textarea>
                    </div>
                    <div class="col-1"></div>
                </div>

                <button type="button" class="btn redDBZBack rounded-3 text-white pt-2 pb-2 ps-4 pe-4 mt-3 mb-3">ENVOYER</button>
            </form>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>