<?php
require('../../Database/docteur_db.php');


if (isset($_GET['id']) and !empty($_GET['id']) and filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
    $resultat = getOneDocteur($_GET['id']);

    if ($resultat->rowCount() > 0) {
        $docteur = $resultat->fetch();
        $nom = $docteur['nom'];
        $prenom = $docteur['prenom'];
        $email = $docteur['email'];
        $adresse = $docteur['adresse'];
        $telephone = $docteur['telephone'];
        $service_id = $docteur['service_id'];
    } else {
        $errorMessage =  'Ce docteur n\'existe pas!';
    }
} else {
    $errorMessage = "L'id du docteur doit être un entier valide supérieur ou égale à 1 !";
}

if (isset($_POST['envoyer'])) {
    if (
        isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['adresse']) && isset($_POST['telephone']) && isset($_POST['service_id'])
        && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['adresse']) && !empty($_POST['telephone']) && !empty($_POST['service_id'])
    ) {
        extract($_POST);
        updateDocteur($docteur['id'], $nom, $prenom, $email, $adresse, $telephone, $service_id);
        $message = "Le docteur a été modifié avec succès!";
        header("Location:docteurs.php?message=" . $message);
    } else {
        $errorMessage = 'Tous les champs sont obligatoire !';
    }
}
