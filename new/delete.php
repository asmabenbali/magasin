<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['ref'])) {
    $delete_id = $_GET['ref'];
    
    // Utilisation d'une requête préparée pour éviter les attaques par injection SQL
    $stmt = $conn->prepare("DELETE FROM Produitt WHERE RefPdt = ?");
    $stmt->bind_param("s", $delete_id);

    if ($stmt->execute()) {
        // Rediriger avec un paramètre de requête pour indiquer le succès de l'opération
        header("location: affichage.php?deleted=true");
        exit();
    } else {
        // Afficher un message d'erreur en cas d'échec de la suppression
        echo "Erreur lors de la suppression du produit: " . $conn->error;
    }

    // Fermer la connexion à la base de données
    $stmt->close();
    $conn->close();
} else {
    // Rediriger en cas de méthode HTTP incorrecte ou de paramètre manquant
    header("location: affichage.php");
    exit();
}
?>
