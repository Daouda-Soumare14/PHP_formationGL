<?php
require('../../Database/docteurs.php');


if (isset($_GET['id']) and !empty($_GET['id']) and filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
    $resultat = getOneDocteur2($_GET['id']);

    if ($resultat->rowCount() > 0) {
        $docteur = $resultat->fetch();
        $message = "Ce service ne peut-etre supprimer puisqu'il a des docteurs !";
        deleteDocteur($docteur['id']);
        $message = "Le docteur a été supprimée avec succès!";
        header("Location:/views/docteurs/docteurs.php?message=" . $message);
    } else {
        $errorMessage =  'Ce docteur n\'existe pas!';
    }
} else {
    $errorMessage = "L'id du docteur doit être un entier valide supérieur ou égale à 1 !";
}
