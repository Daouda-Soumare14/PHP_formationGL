<?php
require '../../actions/docteurs/createDocteurAction.php';
$docteur = true;
// meme principe pour recuperer les header.php aussi
include_once '../../header.php';
include_once '../../Database/service_db.php';

$services = getAllServices();
?>

<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Nouveau Docteurs</h1>
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
        <form class="row g-3" method="POST">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Prenom</label>
                <input type="text" class="form-control" name="prenom">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Adresse</label>
                <input type="text" class="form-control" name="adresse">
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">Telephone</label>
                <input type="phone" class="form-control" name="telephone">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Service</label>
                <select id="inputState" class="form-select" name="service_id">
                    <!-- l'option par defaut si l'utilisateur ne selectionne aucun service -->
                    <option value="0" selected>selectionner...</option>
                    <?php while ($service = $services->fetch(PDO::FETCH_OBJ)) : ?>
                        <option value="<?= $service->id ?>"><?= $service->libelle ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name='envoyer'>Créer</button>
            </div>
        </form>
    </div>
</main>

<?php
// meme principe pour les footer.php aussi
include_once '../../footer.php'
?>