<?php
// donc on doit imperativement sortir du dossier views 
// pour linker avec le fichier db_connection qui se trouve dans le dossier Database
// en mettant ../../Database/docteur_db.php les premiers .. me permet de sortir du dossier docteurs 
//les seconds me permet de sortir du dossier views
require('../../Database/docteur_db.php');
$docteur = true;
// meme principe pour recuperer les header.php aussi
include_once '../../header.php';

$docteurs = getAllDocteurs();
?>

<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Docteurs</h1>
    <a type="button" class="float-end mb-2 btn btn-primary" href="add_docteur.php">
      Nouveau
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
      </svg>
    </a>
    <?php
    if (isset($_GET['message'])) {
      $message = $_GET['message'];
    ?>
      <!-- un message de succès rechercher sur le site de bootstrap -->
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $message; ?>
        <!-- un button de fermeture rechercher sur le site de bootstrap -->
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php
    }
    ?>
    <table id="myDataTable" class="display" style="width:100%">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>Prenom</th>
          <th>Email</th>
          <th>Adresse</th>
          <th>Telephone</th>
          <th>Service</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($docteur = $docteurs->fetch(PDO::FETCH_OBJ)) : ?>
          <tr>
            <td><?= $docteur->id ?></td>
            <td><?= $docteur->nom ?></td>
            <td><?= $docteur->prenom ?></td>
            <td><?= $docteur->email ?></td>
            <td><?= $docteur->adresse ?></td>
            <td><?= $docteur->telephone ?></td>
            <td><?= $docteur->service_libelle ?></td>

            <td>
              <a href="edit_docteur.php?id=<?= $docteur->id ?>" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                </svg>
              </a>
              <a data-bs-toggle="modal" data-bs-target="#deleteServiceModal<?= $docteur->id ?>" class="btn btn-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                </svg>
              </a>
            </td>
          </tr>
          <!-- modal permet de confirmer la supprimer ou d'annuler -->
          <!-- Modal -->
          <div class="modal fade" id="deleteDocteurModal<?= $docteur->id ?>" tabindex="-1" aria-labelledby="deleteServiceModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="deleteDocteurModalLabel">Suppression docteur <?= $docteur->nom, $docteur->prenom, $docteur->email, $docteur->adresse, $docteur->telephone, $docteur->service_id ?></h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  voulez vous supprimer ce docteur
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                  <a href="/actions/docteurs/deleteDocteurAction.php?id=<?= $docteur->id ?>" type="button" class="btn btn-primary"> Oui</a>
                </div>
              </div>
            </div>
          </div>
          <!-- fin modal  -->
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</main>

<?php
// meme principe pour les footer.php aussi
include_once '../../footer.php'
?>