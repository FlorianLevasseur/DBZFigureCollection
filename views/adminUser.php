<?php
require_once "../controllers/adminUserController.php";
include("header.php");
?>

<div class="container bg-white content pt-3 pb-3 my-5" id="contentId">
  <p class="h3 text-center mb-4">Gérer Utilisateurs</p>
  <?php if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin'] != 0) { ?>
      <table class="table table-bordered">
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
              <td><?= $user['admin'] ?></td>
              <td><?= $user['accepted'] ?></td>
              <td><a href="modifUser?id=<?= $user['id'] ?>" class="btn btn-secondary">Modifier</a>
            </tr>
          <?php } ?>
        </tbody>
      </table>
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
    Swal.fire({
      text: "L'utilisateur <?= $_SESSION['modif'] ?> a bien été modifié !",
      icon: 'success',
      confirmButtonText: 'Continuer',
      confirmButtonColor: '#cc0921'
    })
  </script>
<?php $_SESSION['modif'] = "";
} ?>

<?php if (!empty($_SESSION['delete'])) { ?>
  <script>
    Swal.fire({
      text: "L'utilisateur <?= $_SESSION['delete'] ?> a bien été supprimé !",
      icon: 'success',
      confirmButtonText: 'Continuer',
      confirmButtonColor: '#cc0921'
    })
  </script>
<?php $_SESSION['delete'] = "";
} ?>

<?php if (!empty($_SESSION['create'])) { ?>
  <script>
    Swal.fire({
      text: "L'utilisateur <?= $_SESSION['create'] ?> a bien été créé !",
      icon: 'success',
      confirmButtonText: 'Continuer',
      confirmButtonColor: '#cc0921'
    })
  </script>
<?php $_SESSION['create'] = "";
} ?>
<?php
include("footer.php");
?>