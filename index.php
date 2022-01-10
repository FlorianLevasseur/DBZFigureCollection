
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Livvic:wght@100;400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="#" id="myLink">
  <link rel="stylesheet" href="assets/css/style.css">

  <title>DBZ Figure Collection</title>
</head>

<body class="bg-white">
  <div class="container-fluid bg-white" id="myHeader">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-6 m-auto p-0">
          <a href="index.html"><img class="logo" src="assets/img/logoDBZFC.png"
              alt="Logo Dragon Ball Z Figure Collection"></a>
        </div>
        <div class="d-lg-block d-none col-6 m-auto">
          <div class="input-group w-75 m-auto">
            <input type="search" class="form-control" placeholder="Rechercher une figurine">
            <button type="button" class="btn btn-secondary text-white"><i class="bi bi-search"></i></button>
          </div>
        </div>
        <div class="d-lg-block d-none col-2 m-auto">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="darkSwitch" <?= isset($_COOKIE['user']) ? 'checked' : '' ?>>
            <label class="form-check-label" for="darkSwitch">Dark Mode</label>
          </div>
        </div>
        <div class="d-lg-none d-block col-4"></div>
        <div class="col-2 m-auto">
          <a class="text-decoration-none account d-flex justify-content-end" href="connexion.html" id="myAccount">
            <img class="logo4stars" src="assets/img/connectlogo.png" alt="Logo boule de cristal 4 étoiles">
            <p class="d-lg-block d-none m-auto ms-2">MON COMPTE</p>
          </a>
        </div>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top p-0" id="myNav">
    <div class="container d-lg-none justify-content-end">
      <div>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
          aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img class="logoZ" src="assets/img/logoConnect.gif"
            alt="Logo gif Z">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body container">
        <ul class="navbar-nav justify-content-around flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active fw-bold" href="index.php">ACCUEIL</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="search.php">RECHERCHE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="figure.html">MA COLLECTION</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">MES SOUHAITS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">A PROPOS</a>
          </li>
        </ul>
        <div class="input-group d-lg-none">
          <input class="form-control" type="search" placeholder="Rechercher une figurine">
          <button class="btn btn-secondary text-white" type="button"><i class="bi bi-search"></i></button>
        </div>
      </div>
    </div>
  </nav>

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
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="assets/img/carousel1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="assets/img/carousel2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="assets/img/carousel3.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
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
              <td><a class="actu" href="https://www.db-z.com/zarbon-se-devoile-dans-la-gamme-shfiguarts/"
                  target="_blank">
                  Zarbon se dévoile dans la gamme SHFiguarts</a></td>
            </tr>
            <tr>
              <th>19/09/2021</th>
              <td><a class="actu" href="https://www.db-z.com/dodoria-debarque-dans-la-gamme-shfiguarts/"
                  target="_blank">Dodoria débarque dans la gamme SHFiguarts !</a></td>
            </tr>
            <tr>
              <th>02/09/2021</th>
              <td><a class="actu" href="  https://www.db-z.com/shfiguarts-freezer-4eme-forme/"
                  target="_blank">SHFiguarts
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
              <td><a class="upgrade" href="#upgradeModal3" data-bs-toggle="modal"
                  data-bs-target="#upgradeModal3">Placement des éléments de la page d'accueil</a></td>
              <div class="modal fade" id="upgradeModal3" tabindex="-1" aria-labelledby="upgradeModalLabel3"
                aria-hidden="true">
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
              <td><a class="upgrade" href="#upgradeModal2" data-bs-toggle="modal"
                  data-bs-target="#upgradeModal2">Reprise à zéro du site</a></td>
              <div class="modal fade" id="upgradeModal2" tabindex="-1" aria-labelledby="upgradeModalLabel2"
                aria-hidden="true">
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
              <td><a class="upgrade" href="#upgradeModal1" data-bs-toggle="modal"
                  data-bs-target="#upgradeModal1">Création du 1er index.html</a></td>
              <div class="modal fade" id="upgradeModal1" tabindex="-1" aria-labelledby="upgradeModalLabel1"
                aria-hidden="true">
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
  <footer>
    <div class="container-fluid mb-0 pt-3 pb-1 bg-white" id="myFooter">
      <div class="container">
        <div class="row text-center pb-3">
          <div class="col-lg-4 col-5 m-auto">
            <a class="footLink" href="#" id="foot1">Mentions Légales</a>
          </div>
          <div class="col-lg-4 col-4 m-auto">
            <a class="footLink" href="#" id="foot2">Plan du Site</a>
          </div>
          <div class="col-lg-4 col-3 m-auto">
            <a class="footLink" href="contact.html" id="foot3">Contact</a>
          </div>
        </div>
        <p class="text-center">©2021 DBZ Figure Collection | Designed by TiFlo</p>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <script src="assets/js/script.js"></script>
</body>

</html>