<?php
// donc on doit imperativement sortir du dossier views 
// pour linker avec le fichier db_connection qui se trouve dans le dossier Database
// en mettant ../../actions/services/createServiceAction.php les premiers .. me permet de sortir du dossier services 
//les seconds me permet de sortir du dossier views

// le fichier action nous permet de declancer les traitements
require('../../actions/services/createServiceAction.php');
$service = true;
include_once '../../header.php';

?>

<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Nouveau Service</h1>
    <?php
    // gerer la validation avec un message d'erreur qui se trouve dans notre variable $errorMessage 
    if (isset($errorMessage)) {
    ?>
      <!-- message d'erreur rechercher sur le site bootstrap -->
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?= $errorMessage; ?>
        <!-- button de fermeture rechercher sur le site bootstrap -->
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php
    }
    ?>
    <!-- vu qu'on doit soumettre un formulaire on doit utiliser la method post  -->
    <form class="row g-3" method="POST">
      <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Libelle</label>
        <!-- pour l'input on lui donne un nom qui nous permet de l'identifier -->
        <input type="text" class="form-control" name="libelle">
      </div>
      <div class="col-12">
        <!-- pour le button on lui donne un nom qui nous permet de l'identifier -->
        <button type="submit" name='envoyer' class="btn btn-primary">Créer</button>
      </div>
    </form>
  </div>
</main>

<?php
// meme principe pour les footer.php aussi
include_once '../../footer.php'
?>