<?php
include 'config.php';

// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assurez-vous que les données ont été correctement soumises
    if (isset($_POST["refPdt"]) && isset($_POST["libPdt"]) && isset($_POST["prix"]) && isset($_POST["qte"])) {
        // Récupérez les données du formulaire
        $refPdt = $_POST["refPdt"];
        $libPdt = $_POST["libPdt"];
        $prix = $_POST["prix"];
        $qte = $_POST["qte"];

        // Vérifiez si une photo a été téléchargée
        if ($_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
            $photo_temp = $_FILES["photo"]["tmp_name"];
            $photo_name = $_FILES["photo"]["name"];
            $photo_path = "uploads/" . $photo_name;
            move_uploaded_file($photo_temp, $photo_path);
        } else {
            echo "Erreur lors du téléchargement de l'image.";
            exit(); // Quittez le script si le téléchargement de l'image a échoué
        }

        // Éventuellement, récupérez également l'action si nécessaire
        $action = isset($_POST["action"]) ? $_POST["action"] : "";

        // Préparez et exécutez la requête d'insertion dans la base de données
        $sql = "INSERT INTO Produitt (RefPdt, libPdt, prix, Qte, image_src, type) 
                VALUES ('$refPdt', '$libPdt', '$prix', '$qte', '$photo_path', '$action')";
        if ($conn->query($sql) === TRUE) {
            // Rediriger vers la page d'affichage après l'ajout réussi
            header("Location: affichage.php");
            exit(); // Assurez-vous de terminer le script après la redirection
        } else {
            echo "Erreur lors de l'ajout du produit: " . $conn->error;
        }
    } else {
        echo "Tous les champs requis ne sont pas remplis.";
    }
} else {
    echo "Une erreur s'est produite lors de la soumission du formulaire.";
}
?>
