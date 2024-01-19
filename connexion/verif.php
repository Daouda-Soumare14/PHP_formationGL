<?php
if (isset($_POST['connexion'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Utilisation des requêtes préparées pour sécuriser la requête SQL
    $sql = "SELECT * FROM utilisateur WHERE login = ? AND password = ?";
    mysqli_stmt_bind_param($stmt, "ss", $login, $password);
    mysqli_stmt_execute($stmt);
    $resultat = mysqli_stmt_get_result($stmt);

    if ($resultat && mysqli_num_rows($resultat) > 0) {
        $ligne = mysqli_fetch_row($resultat);

        // Démarrez la session et enregistrez les données de l'utilisateur
        session_start();
        $_SESSION["prenom"] = $ligne[1];
        $_SESSION["nom"] = $ligne[2];

        // Redirigez vers la page d'accueil
        header('Location: index.php?page=accueil');
        exit;
    } else {
        echo "Identifiant ou mot de passe incorrect.";
    }
}

    