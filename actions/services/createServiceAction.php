<?php
require('../../Database/service_db.php');

// là on verifie si l'utilisateur a cliquer sur le button creer
if (isset($_POST['envoyer'])) {
    // proceder a la validation du formulaire si la variable exist et que le champ n'est pas vide
    if (isset($_POST['libelle']) && !empty($_POST['libelle'])) {
        extract($_POST); // la fonction extract qui permet d'acceder a tous les clés
        addService($libelle); // de ce fait pour afficher le contenu de la clé on appelle la fonction addServises qui va prendre en parametre $libelle pour l'enregistrer en base de donnee
        $message = "Le service a été ajoutée avec succès!"; // on affice un message de succès
        header("Location:services.php?message=" . $message); // apres sauvegarde on gére la navigation en passant par $GET et retourne dans notre fichier service.php pour faire le fonctionnement de $GET
    } else {
        $errorMessage = 'Le libelle est obligatoire !';
    }
}
