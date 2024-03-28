<?php
$servername = "localhost"; // Nom du serveur MySQL (généralement 'localhost')
$username = "assma"; // Nom d'utilisateur MySQL
$password = "123"; // Mot de passe MySQL
$database = "produit"; // Nom de la base de données MySQL

// Créer une connexion à la base de données
$conn = new mysqli($servername, $username, $password, $database);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
} 
?>
