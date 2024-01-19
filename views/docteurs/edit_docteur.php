<?php
require('../../actions/docteurs/editDocteurAction.php');
$service = true;
include_once '../../header.php';
include_once '../../Database/service_db.php';

$services = getAllServices();
?>

<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Modication Docteur</h1>
    <?php
    if (isset($errorMessage)) {
    ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?= $errorMessage; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php
    }
    ?>
    <?php if (isset($nom, $prenom, $email, $adresse, $telephone, $service_id)) : ?> <!--si la variable $libelle existe -->
      <form class="row g-3" method="POST">
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Nom</label>
          <input type="text" class="form-control" name="nom">
        </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Prenom</label>
          <input type="text" class="form-control" name="prenom">
        </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Email</label>
          <input type="email" class="form-control" name="email">
        </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Adresse</label>
          <input type="text" class="form-control" name="adresse">
        </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Telephone</label>
          <input type="phone" class="form-control" name="telephone">
        </div>
        <select id="inputState" class="form-select" name="service_id">
          <!-- l'option par defaut si l'utilisateur ne selectionne aucun service -->
          <option value="0" selected>selectionner...</option>
          <?php while ($service = $services->fetch(PDO::FETCH_OBJ)) : ?>
            <option value="<?= $service->id ?>"><?= $service->libelle ?></option>
          <?php endwhile; ?>
        </select>
        <div class="col-12">
          <button type="submit" name='envoyer' class="btn btn-primary">Créer</button>
        </div>
      </form>
      <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Nom</label>
        <input type="text" class="form-control" name="nom" value="<?= $nom; ?>">
        <label for="inputEmail4" class="form-label">Prenom</label>
        <input type="text" class="form-control" name="prenom" value="<?= $prenom; ?>">
        <label for="inputEmail4" class="form-label">Email</label>
        <input type="text" class="form-control" name="email" value="<?= $email; ?>">
        <label for="inputEmail4" class="form-label">Adresse</label>
        <input type="text" class="form-control" name="adresse" value="<?= $adresse; ?>">
        <label for="inputEmail4" class="form-label">Telephone</label>
        <input type="text" class="form-control" name="telephone" value="<?= $telephone; ?>">
        <label for="inputEmail4" class="form-label">Service_id</label>
        <input type="text" class="form-control" name="service_id" value="<?= $service_id; ?>">
      </div>
      <div class="col-12">
        <button type="submit" name='envoyer' class="btn btn-primary">Modifier</button>
      </div>
      </form>
    <?php endif ?>
  </div>
</main>

<?php
include_once '../../footer.php'
?>