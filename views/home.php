<?php
session_start();
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
  <!-- Pour un espace de chaque coté en responsive -->
  <!-- <div class="row m-0"> -->
  <div class="row justify-content-center">
    <div class="col-11 titleBorder pt-3">
      <h1 class="text-center mb-4">Bienvenue sur Dragon Ball Z Figure Collection</h1>
      <p class="text-center h5 mb-4 resumeText">
        Ce site vous permettra de rechercher toutes les figurines existantes des différentes séries Dragon Ball
        (Original, Z, GT, Super,...) éditées par Banpresto/Bandaï Spirits.
        Si vous vous inscrivez, vous pourrez également créer votre collection personnelle ainsi que la liste des
        figurines que vous souhaitez acquérir.
        Pour en savoir plus sur ce site, rendez-vous dans l'onglet "A PROPOS".<br>
        Bonne visite à tous !!!
      </p>
    </div>

  </div>

  <hr class="mb-4">
  <div id="carouselExampleIndicators" class="carousel slide carousel-fade m-auto" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <a href="figure?id=1887"><img src="assets/img/carousel1.jpg" class="d-block w-100" alt="..."></a>
      </div>
      <div class="carousel-item">
        <a href="figure?id=1760"><img src="assets/img/carousel2.jpg" class="d-block w-100" alt="..."></a>
      </div>
      <div class="carousel-item">
        <a href="figure?id=1658"><img src="assets/img/carousel3.jpg" class="d-block w-100" alt="..."></a>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- </div> -->

  <hr class="mt-4 mb-0">
  <div class="row justify-content-around m-0">
    <div class="col-lg-5">
      <table class="table table-bordered table-striped table-hover mt-4">
        <thead>
          <tr>
            <th colspan="2">Actualités</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th>07/10/2021</th>
            <td><a class="actu" href="https://www.db-z.com/zarbon-se-devoile-dans-la-gamme-shfiguarts/" target="_blank">
                Zarbon se dévoile dans la gamme SHFiguarts</a></td>
          </tr>
          <tr>
            <th>19/09/2021</th>
            <td><a class="actu" href="https://www.db-z.com/dodoria-debarque-dans-la-gamme-shfiguarts/" target="_blank">Dodoria débarque dans la gamme SHFiguarts !</a></td>
          </tr>
          <tr>
            <th>02/09/2021</th>
            <td><a class="actu" href="  https://www.db-z.com/shfiguarts-freezer-4eme-forme/" target="_blank">SHFiguarts
                Freezer (4ème forme)</a></td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="col-lg-5">
      <table class="table table-bordered table-striped table-hover mt-4">
        <thead>
          <tr>
            <th colspan="2">Mises à jour du site</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th>30/10/2021</th>
            <td><a class="upgrade" href="#upgradeModal3" data-bs-toggle="modal" data-bs-target="#upgradeModal3">Placement des éléments de la page d'accueil</a></td>
            <div class="modal fade" id="upgradeModal3" tabindex="-1" aria-labelledby="upgradeModalLabel3" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <p class="modal-title m-auto h5" id="upgradeModalLabel3">Placement des éléments de la page
                      d'accueil</p>
                  </div>
                  <div class="modal-body">
                    <ul class="m-0">
                      <li>Nouveau background</li>
                      <li>Choix du container pour la mise en page</li>
                      <li>Mise en place du carousel</li>
                      <li>Arrivée des tableaux Actualités et Mises à jour</li>
                    </ul>
                  </div>
                  <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                  </div>
                </div>
              </div>
            </div>
          </tr>
          <tr>
            <th>29/10/2021</th>
            <td><a class="upgrade" href="#upgradeModal2" data-bs-toggle="modal" data-bs-target="#upgradeModal2">Reprise à zéro du site</a></td>
            <div class="modal fade" id="upgradeModal2" tabindex="-1" aria-labelledby="upgradeModalLabel2" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <p class="modal-title m-auto h5" id="upgradeModalLabel2">Reprise à zéro du site</p>
                  </div>
                  <div class="modal-body text-center">
                    <p>Bon, on va pas se mentir, c'était quand même mal barré cette histoire...</p>
                    <p class="mb-0">Donc on reprend tout depuis le début histoire que ça ressemble quand même à
                      quelque chose !</p>
                  </div>
                  <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                  </div>
                </div>
              </div>
            </div>
          </tr>
          <tr>
            <th>22/10/2021</th>
            <td><a class="upgrade" href="#upgradeModal1" data-bs-toggle="modal" data-bs-target="#upgradeModal1">Création du 1er index.html</a></td>
            <div class="modal fade" id="upgradeModal1" tabindex="-1" aria-labelledby="upgradeModalLabel1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <p class="modal-title m-auto h5" id="upgradeModalLabel1">Création du 1er index.html</p>
                  </div>
                  <div class="modal-body text-center">
                    <p class="mb-0">Youhouuuuu !!!!! C'est partiiiiii !!!!!!!</p>
                  </div>
                  <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                  </div>
                </div>
              </div>
            </div>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php if (!empty($_SESSION['delete'])) { ?>
  <script>
    Swal.fire({
      text: "Votre compte a bien été supprimé !",
      icon: 'success',
      confirmButtonText: 'Continuer',
      confirmButtonColor: '#cc0921'
    })
  </script>
<?php session_unset();
      session_destroy();
} ?>

<?php if (!empty($_SESSION['create'])) { ?>
  <script>
    Swal.fire({
      text: "Votre compte à bien été créé et est en attente de confirmation par un administrateur ! Veuillez attendre que votre compté soit accepté !",
      icon: 'success',
      confirmButtonText: 'Continuer',
      confirmButtonColor: '#cc0921'
    })
  </script>
<?php $_SESSION['create'] = "";
} ?>

<?php if (!empty($_SESSION['unknow'])) { ?>
  <script>
    Swal.fire({
      text: "Votre compte est inconnu dans la base de données. Il se pourrait qu'il ait été supprimé par un administrateur. Veuillez utiliser le formulaire de contact pour en savoir d'avantage.",
      icon: 'error',
      confirmButtonText: 'Continuer',
      confirmButtonColor: '#cc0921'
    })
  </script>
<?php $_SESSION['unknow'] = "";
} ?>

<?php if (!empty($_SESSION['contact'])) { ?>
  <script>
    Swal.fire({
      text: "<?= $_SESSION['contact'] ?>",
      icon: 'success',
      confirmButtonText: 'Continuer',
      confirmButtonColor: '#cc0921'
    })
  </script>
<?php $_SESSION['contact'] = "";
} ?>

<?php
include("footer.php");
?>