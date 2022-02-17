<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/originalBootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Livvic:wght@100;400&display=swap" rel="stylesheet">
    <link href="../assets/css/lightbox.css" rel="stylesheet">
    <link rel="stylesheet" href="#" id="myLink">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>DBZ Figure Collection</title>
</head>

<body class="bg-white">
    <div class="container-fluid bg-white" id="myHeader">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-6 p-0">
                    <a href="/"><img class="logo img-fluid" src="assets/img/logoDBZFC.png" alt="Logo Dragon Ball Z Figure Collection"></a>
                </div>
                <div class="d-lg-block d-none col-6 m-auto">
                    <div class="input-group w-75 m-auto">
                        <input type="search" class="form-control" placeholder="Rechercher une figurine">
                        <button type="button" class="btn btn-secondary text-white"><i class="bi bi-search"></i></button>
                    </div>
                </div>
                <div class="col-2 m-auto">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="darkSwitch" <?= isset($_COOKIE['user']) ? 'checked' : '' ?>>
                        <label class="form-check-label d-lg-block d-none" for="darkSwitch">Dark Mode</label>
                    </div>
                </div>
                <div class="col-2 m-auto">
                    <a class="text-decoration-none account d-flex justify-content-end" href="connexion" id="myAccount">
                        <img class="logo4stars" src="assets/img/connectlogo.png" alt="Logo boule de cristal 4 étoiles">
                        <p class="d-lg-block d-none m-auto ms-2"><?= isset($_SESSION['pseudo']) ? strtoupper($_SESSION['pseudo']) : "MON COMPTE" ?></p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top p-0" id="myNav">
        <div class="container d-lg-none justify-content-end">
            <div>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img class="logoZ" src="assets/img/logoConnect.gif" alt="Logo gif Z">Menu</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body container">
                <ul class="navbar-nav justify-content-around flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link <?= $_SERVER['REQUEST_URI'] == "/" ? "active fw-bold" : '' ?>" href="/">ACCUEIL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= strpos($_SERVER['REQUEST_URI'], "search") ? "active fw-bold" : '' ?>" href="search">RECHERCHE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= strpos($_SERVER['REQUEST_URI'], "myCollection") ? "active fw-bold" : '' ?>" href="myCollection">MA COLLECTION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= strpos($_SERVER['REQUEST_URI'], "myWishes") ? "active fw-bold" : '' ?>" href="myWishes">MES SOUHAITS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= strpos($_SERVER['REQUEST_URI'], "about") ? "active fw-bold" : '' ?>" href="about">A PROPOS</a>
                    </li>
                </ul>
                <div class="input-group d-lg-none">
                    <input class="form-control" type="search" placeholder="Rechercher une figurine">
                    <button class="btn btn-secondary text-white" type="button"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </div>
    </nav>