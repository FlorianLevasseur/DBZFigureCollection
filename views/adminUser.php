<?php
require_once "../controllers/adminUserController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
  <p class="h3 text-center mb-4">Gérer Utilisateurs</p>
  <?php if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin'] != 0) { ?>
      <table class="table table-bordered align-middle">
        <thead>
          <tr>
            <th scope="col">Pseudo</th>
            <th scope="col">Mail</th>
            <th scope="col">Admin</th>
            <th scope="col">Accepté</th>
            <th scope="col">Modifier</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($allUsersArray as $user) { ?>
            <tr>
              <td><?= $user['pseudo'] ?></td>
              <td><?= $user['mail'] ?></td>
              <td class="text-center"><?= $user['admin'] == "Oui" ? "<i class='bi bi-check-lg h3 text-success'></i>" : "" ?></td>
              <td class="text-center"><?= $user['accepted'] == "Oui" ? "<i class='bi bi-check-lg h3 text-success'></i>" : "" ?></td>
              <td class="text-center"><a href="modifUser?id=<?= $user['id'] ?>"><i class="bi bi-person-circle h3"></i></a>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <nav>
        <ul class="pagination justify-content-center">
          <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
          <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
            <a href="adminUser?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
          </li>
          <?php for ($page = 1; $page <= $pages; $page++) : ?>
            <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
            <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
              <a href="adminUser?page=<?= $page ?>" class="page-link"><?= $page ?></a>
            </li>
          <?php endfor ?>
          <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
          <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
            <a href="adminUser?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
          </li>
        </ul>
      </nav>
      <div class="text-center">
        <a href="createUser" class="btn btn-secondary">Créer Utilisateur</a>
      </div>
    <?php } else { ?>
      <p class="text-center">Vous n'avez pas accès à cette page.</p>
    <?php }
  } else { ?>
    <p class="text-center">Vous n'avez pas accès à cette page.</p>
  <?php } ?>
</div>

<?php if (!empty($_SESSION['modif'])) { ?>
  <script>
    swal({
      title: "Utilisateur modifié !",
      text: "L'utilisateur <?= $_SESSION['modif'] ?> a bien été modifié !",
      icon: 'success',
      dangerMode: true,
      button: {
        text: "Continuer"
      }
    })
  </script>
<?php $_SESSION['modif'] = "";
} ?>

<?php if (!empty($_SESSION['delete'])) { ?>
  <script>
    swal({
      title: "Utilisateur supprimé !",
      text: "L'utilisateur <?= $_SESSION['delete'] ?> a bien été supprimé !",
      icon: 'success',
      dangerMode: true,
      button: {
        text: "Continuer"
      }
    })
  </script>
<?php $_SESSION['delete'] = "";
} ?>

<?php if (!empty($_SESSION['create'])) { ?>
  <script>
    swal({
      title: "Utilisateur créé !",
      text: "L'utilisateur <?= $_SESSION['create'] ?> a bien été créé !",
      icon: 'success',
      dangerMode: true,
      button: {
        text: "Continuer"
      }
    })
  </script>
<?php $_SESSION['create'] = "";
} ?>
<?php
include("footer.php");
?>