<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $target_directory = "uploads/"; // Dossier cible où les fichiers seront stockés
    $target_file = $target_directory . basename($_FILES["file"]["name"]); // Chemin complet du fichier cible
    
    // Vérifie si le fichier est un fichier image réel ou une fausse image
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        // Vérifie si le fichier existe déjà
        if (file_exists($target_file)) {
            echo "Désolé, le fichier existe déjà.";
        } else {
            // Déplace le fichier téléchargé vers le dossier uploads
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                echo "Le fichier " . htmlspecialchars(basename($_FILES["file"]["name"])) . " a été téléchargé avec succès.";
            } else {
                echo "Une erreur s'est produite lors du téléchargement du fichier.";
            }
        }
    } else {
        echo "Le fichier n'est pas une image valide.";
    }
}
?>
