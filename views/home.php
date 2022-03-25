<?php
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
  <div class="row m-0 p-0 justify-content-center">
    <div class="col-11 pt-3">
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

  <hr class="mt-4 mb-0">
  <div class="row justify-content-around m-0 p-0">
    <div class="col-lg-5">
      <table class="table table-bordered table-striped table-hover mt-4">
        <thead>
          <tr>
            <th colspan="2">Actualités</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th>24/02/2022</th>
            <td><a class="actu" href="https://www.db-z.com/shfiguarts-gohan-tenue-saiyen-sannonce-en-images/" target="_blank">
                SHFiguarts : Gohan (tenue Saiyen)</a></td>
          </tr>
          <tr>
            <th>24/02/2022</th>
            <td><a class="actu" href="https://www.db-z.com/cell-premiere-forme-sinvite-dans-la-gamme-shfiguarts/" target="_blank">SHFiguarts Cell (première forme)</a></td>
          </tr>
          <tr>
            <th>07/02/2022</th>
            <td><a class="actu" href="https://www.db-z.com/c19-c20-ichiban-kuji-dragon-ball-la-terreur-des-cyborgs/" target="_blank">C-19 et C-20 rejoignent la Ichiban Kuji</a></td>
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
            <th>25/02/2022</th>
            <td><a class="upgrade" href="#upgradeModal3" data-bs-toggle="modal" data-bs-target="#upgradeModal3">Ajout du tri et du choix de visualisation</a></td>
            <div class="modal fade" id="upgradeModal3" tabindex="-1" aria-labelledby="upgradeModalLabel3" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <p class="modal-title m-auto h5" id="upgradeModalLabel3">Ajout du tri et du choix de visualisation</p>
                  </div>
                  <div class="modal-body">
                    <p>Possibilité de tri des figurines par :</p>
                    <ul>
                      <li>Date de mise en ligne</li>
                      <li>Nom Complet</li>
                      <li>Personnage</li>
                      <li>Forme</li>
                      <li>Taille</li>
                      <li>Date de sortie</li>
                    </ul>
                    <p>Choix de l'affichage des figurines en liste ou en grille.</p>
                  </div>
                  <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                  </div>
                </div>
              </div>
            </div>
          </tr>
          <tr>
            <th>24/02/2022</th>
            <td><a class="upgrade" href="#upgradeModal2" data-bs-toggle="modal" data-bs-target="#upgradeModal2">Ajout de nouvelles possibilités de recherche</a></td>
            <div class="modal fade" id="upgradeModal2" tabindex="-1" aria-labelledby="upgradeModalLabel2" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <p class="modal-title m-auto h5" id="upgradeModalLabel2">Ajout de nouvelles possibilités de recherche</p>
                  </div>
                  <div class="modal-body">
                    <p>La recherche ne pouvait auparavant être effectuée que par Personnage.</p>
                    <p>Il est maintenant possible d'effectuer également une recherche par :</p>
                    <ul>
                      <li>Série</li>
                      <li>Date de Sortie</li>
                      <li>Taille</li>
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
            <th>20/02/2022</th>
            <td><a class="upgrade" href="#upgradeModal1" data-bs-toggle="modal" data-bs-target="#upgradeModal1">Mise en fonction de la barre de recherche</a></td>
            <div class="modal fade" id="upgradeModal1" tabindex="-1" aria-labelledby="upgradeModalLabel1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <p class="modal-title m-auto h5" id="upgradeModalLabel1">Mise en fonction de la barre de recherche</p>
                  </div>
                  <div class="modal-body text-center">
                    <p>La barre de recherche est à présent fonctionnelle.</p>
                    <p>Elle permet de faire une recherche via n'importe quel mot appartenant au Nom Complet d'une figurine.</p>
                    <p>Vous pouvez tapez plusieurs mots même si ceux-ci ne se suivent pas dans le nom de la figurine.</p>
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
    swal({
      title: "Compte supprimé !",
      text: "Votre compte a bien été supprimé !",
      icon: 'success',
      dangerMode: true,
      button: {
        text: "Continuer"
      }
    })
  </script>
<?php session_unset();
  session_destroy();
} ?>

<?php if (!empty($_SESSION['create'])) { ?>
  <script>
    swal({
      title: "Compte créé !",
      text: "Votre compte à bien été créé et est en attente de confirmation par un administrateur ! Veuillez attendre que votre compte soit accepté !",
      icon: 'success',
      dangerMode: true,
      button: {
        text: "Continuer"
      }
    })
  </script>
<?php $_SESSION['create'] = "";
} ?>

<?php if (!empty($_SESSION['unknow'])) { ?>
  <script>
    swal({
      title: "Compte inconnu !",
      text: "Votre compte est inconnu dans la base de données. Il se pourrait qu'il ait été supprimé par un administrateur. Veuillez utiliser le formulaire de contact pour en savoir d'avantage.",
      icon: 'error',
      dangerMode: true,
      button: {
        text: "Continuer"
      }
    })
  </script>
<?php $_SESSION['unknow'] = "";
} ?>

<?php if (!empty($_SESSION['contact'])) { ?>
  <script>
    swal({
      title: "Mail envoyé !",
      text: "<?= $_SESSION['contact'] ?>",
      icon: 'success',
      dangerMode: true,
      button: {
        text: "Continuer"
      }
    })
  </script>
<?php $_SESSION['contact'] = "";
} ?>

<?php
include("footer.php");
?>