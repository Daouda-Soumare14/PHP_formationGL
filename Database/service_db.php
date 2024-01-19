<?php
require('db_connection.php');

// on creer un fonction qui permet de recuperer tous les services
function getAllServices()
{
    global $connexion;
    $query = "SELECT * FROM services";
    $resultat = $connexion->query($query);
    return $resultat;
}

// on creer un fonction qui permet d'ajouter des services
function addService($libelle)
{
    global $connexion;
    $query = "INSERT INTO services(libelle) VALUES(:libelle)";
    // on gere la securité. pour ce faire on utilise des requete preparer avec un stmt comme declaration
    $stmt = $connexion->prepare($query); // prepare verifie la requete
    $stmt->execute(['libelle' => $libelle]); // execute va charger de l'execution
    $stmt->closeCursor(); // on ferme la connexion
}

function getOneService($id)
{
    global $connexion;

    $query = "SELECT * FROM services WHERE id = $id";
    $stmt = $connexion->prepare($query);
    $stmt->execute();
    return $stmt;
}

function getOneService2($id)
{
    global $connexion;

    $query = "SELECT * FROM services WHERE id = :id";
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    return $stmt;
}

function updateService($id, $libelle)
{
    global $connexion;

    $query = "UPDATE services SET libelle = ? WHERE id = ?";
    $stmt = $connexion->prepare($query);
    $stmt->execute(array($libelle, $id));
    $stmt->closeCursor();
}

function deleteService($id)
{
    global $connexion;

    $query = "DELETE FROM services WHERE id = ?";
    $stmt = $connexion->prepare($query);
    $stmt->execute(array($id));
    $stmt->closeCursor();
}

function getOneServiceAllDocteurs($id)
{
    global $connexion;
    // empecher la suppression d'un service s'il existe un docteur qui y a ce service
    $query = "SELECT docteurs.id, docteurs.nom, docteurs.prenom
    FROM services
    INNER JOIN docteurs ON services.id = docteurs.service_id
    WHERE services.id = $id";
    $stmt = $connexion->prepare($query);
    $stmt->execute();
    return $stmt;
}
