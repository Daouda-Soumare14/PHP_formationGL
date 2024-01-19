<?php
require('./Database/db_connection.php');
include_once './Database/docteur_db.php';
$index = true;
include_once './header.php';
?>

<!-- Begin page content -->

<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Dalal ak Diam</h1>
  </div>

  <div class="container">
  
    <form class="d-flex" role="search" method="post">
      <input class="form-control me-2" type="search" placeholder="Search" name="submit" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
  <div class="container">
    <div class="row">
      <?php
      if (isset($_POST['submit']) && !empty($_POST['submit'])) {
        $search = $_POST['submit'];
        // if(!empty($search)){
        $resultat = searchServices($search);

        if ($resultat->rowCount() > 0) {
          while ($row = $resultat->fetch()) {

      ?>

            <div class="col-4">
              <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title"><?= $row['prenom'] . " " . $row['nom']  ?></h5>
                  <p class="card-text"><?= "Service:" . " " . $row['services_libelle'] ?></p>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $row['id'] ?>">voir Details</button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Informations détaillé de : <?= strtoupper("<strong>{$row['nom']} {$row['prenom']}</strong>") ?></h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <?= "<strong>Nom :</strong>" . " " . $row['nom']; ?>
                          <br>
                          <?= "<strong>Prenom :</strong> " . " " . $row['prenom']; ?>
                          <br>
                          <?= "<strong>Telephone :</strong> " . " " . $row['telephone']; ?>
                          <br>
                          <?= "<strong>Email :</strong> " . " " . $row['email']; ?>
                          <br>
                          <?= "<strong>Adresse :</strong> " . " " . $row['adresse']; ?>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fermer</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      <?php
          }
        }
      } else {
        $errorMessage = 'ce champ est obligatoire !';
      }
      ?>
    </div>
  </div>
  </div>

</main>
<?php

// <div class="card col-md-8 offset-2 mt-5">
if (isset($errorMessage)) {
?>
  <div class="col-md-9 offset-2 mt-1">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <?= $errorMessage; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
<?php
}
?>
<!-- </div> -->
<?php
include_once './footer.php'
?>