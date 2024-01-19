<?php
require('db_connection.php');

function getAllDocteurs()
{
    global $connexion;
    // pour afficher les services des docteurs dans la page docteur on va devoir modifier notre 
    // requette en faisant une jointure des deux tables docteurs et services
    // et le services.libelle permet d'afficher les libelles des services dans la page docteur
    $query = "SELECT docteurs.id, docteurs.nom, docteurs.prenom, docteurs.email,
    docteurs.adresse, docteurs.telephone, docteurs.service_id,
    services.libelle as service_libelle FROM docteurs
    INNER JOIN services ON services.id = docteurs.service_id";
    $resultat = $connexion->query($query);
    return $resultat;
}

function addDocteur($nom, $prenom, $email, $adresse, $telephone, $service_id)
{
    global $connexion;
    $query = 'INSERT INTO docteurs(nom, prenom, email, adresse, telephone, service_id) values(?,?,?,?,?,?)';
    $stmt = $connexion->prepare($query);
    $stmt->execute(array($nom, $prenom, $email, $adresse, $telephone, $service_id));
    $stmt->closeCursor();
}

function searchServices($search)
{
    global $connexion;
    $query = "SELECT docteurs.id, docteurs.nom, docteurs.prenom, docteurs.email, docteurs.adresse, docteurs.telephone, services.libelle as services_libelle
    FROM docteurs 
    INNER JOIN services ON services.id = docteurs.service_id 
    WHERE services.libelle LIKE '%$search%' ";
    $stmt = $connexion->prepare($query);
    $stmt->execute();
    return $stmt;
}

function getOneDocteur($id)
{
    global $connexion;

    $query = "SELECT * FROM docteurs WHERE id = $id";
    $stmt = $connexion->prepare($query);
    $stmt->execute();
    return $stmt;
}

function updateDocteur($id, $nom, $prenom, $email, $adresse, $telephone, $service_id)
{
    global $connexion;

    $query = "UPDATE docteurs SET nom, prenom, email, adresse, telephone, service_id = ?,?,?,?,?,? WHERE id = ?";
    $stmt = $connexion->prepare($query);
    $stmt->execute(array($id, $nom, $prenom, $email, $adresse, $telephone, $service_id));
    $stmt->closeCursor();
}

function getOneDocteur2($id)
{
    global $connexion;

    $query = "SELECT * FROM docteurs WHERE id = :id";
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    return $stmt;
}

function deleteDocteur($id)
{
    global $connexion;

    $query = "DELETE FROM docteurs WHERE id = ?";
    $stmt = $connexion->prepare($query);
    $stmt->execute(array($id));
    $stmt->closeCursor();
}
