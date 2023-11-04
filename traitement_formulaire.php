<?php

// Récupérer les informations du formulaire

$nom = $_POST['nom'];

$prenom = $_POST['prenom'];




// Connexion à la base de données

$connexion = new PDO('mysql:host=localhost;dbname=projet_db(2)', 'root', 'root');




// Préparer et exécuter la requête SQL d'insertion

$query = "INSERT INTO diver(Lastname, Firstname) VALUES (:Lastname, :Firstname)";

$statement = $connexion->prepare($query);

$statement->bindParam(':Lastname', $nom);

$statement->bindParam(':Firstname', $prenom);

$statement->execute();




// Fermer la connexion à la base de données

$connexion = null;




// Rediriger l'utilisateur vers une page de confirmation ou afficher un message de succès

// header('Location: confirmation.php');

// exit();

?>