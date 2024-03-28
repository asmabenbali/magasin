<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs soumises par le formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Requête pour vérifier les identifiants dans la base de données
    $sql = "SELECT * FROM utilisateurs WHERE login = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    // Vérifier si une ligne correspondante a été trouvée
    if ($result->num_rows == 1) {
        // Rediriger l'utilisateur vers la page d'affichage
        header("Location: affichage.php");
        exit();
    } else {
        // Rediriger vers la page de connexion avec un message d'erreur
        header("Location: connexion.php?error=1");
        exit();
    }
}
?>
