<?php
require('../../Database/docteur_db.php');

// là on verifie si l'utilisateur a cliquer sur le button creer
if (isset($_POST['envoyer'])) {
    // proceder a la validation du formulaire si les champs ne sont pas vide
    if (
        !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email'])
        && !empty($_POST['adresse']) && !empty($_POST['telephone']) && !empty($_POST['service_id'])
    ) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            extract($_POST); // la fonction extract qui permet d'acceder a tous les clés 
            addDocteur($nom, $prenom, $email, $adresse, $telephone, $service_id);
            $message = "Le docteur a été ajoutée avec succès!"; // on affice un message de succès
            header("Location:docteurs.php?message=" . $message); // apres sauvegarde on gére la navigation en passant par $GET et retourne dans notre fichier service.php pour faire le fonctionnement de $GET  
        } else {
            $errorMessage = 'Veuillez saisir un email valide !';
        }
    } else {
        $errorMessage = ' Veuillez remplir tous les champs !';
    }
}
