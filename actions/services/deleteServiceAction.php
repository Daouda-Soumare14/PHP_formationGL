<?php
require('../../Database/service_db.php');


if (isset($_GET['id']) and !empty($_GET['id']) and filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
    $resultat = getOneService2($_GET['id']);

    if ($resultat->rowCount() > 0) {
        $service = $resultat->fetch();
        $check = getOneServiceAllDocteurs($service['id']);
        if ($check->rowCount() > 0) {
            // pour la suppression du service on verifi si le nombre de ligne est superieur a 0 ce qui veut dire qu'il y a un docteur qui utilise se service  
            $message = "Ce service ne peut-etre supprimer puisqu'il a des docteurs !";
        } else {
            deleteService($service['id']);
            $message = "Le service a été supprimée avec succès!";
        }
        header("Location:/views/services/services.php?message=" . $message);
    } else {
        $errorMessage =  'Ce service n\'existe pas!';
    }
} else {
    $errorMessage = "L'id du service doit être un entier valide supérieur ou égale à 1 !";
}
