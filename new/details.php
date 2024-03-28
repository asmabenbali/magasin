<?php
include 'config.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM Produitt WHERE RefPdt = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $libelle = $row['libPdt'];
        $prix = $row['prix'];
        $quantite = $row['Qte'];
        $type = $row['type'];
        $image = $row['image_src'];

        echo "<div>";
        echo "<img src='" . $image . "' alt='Image du produit' style='width: 300px; height: 300px;'>";
        echo "<h2>Détails du Produit</h2>";
        echo "<p><strong>Référence:</strong> " . $id . "</p>";
        echo "<p><strong>Libellé:</strong> " . $libelle . "</p>";
        echo "<p><strong>Prix:</strong> " . $prix . "€</p>";
        echo "<p><strong>Quantité:</strong> " . $quantite . "</p>";
        echo "<p><strong>Type:</strong> " . $type . "</p>"; 
        echo "</div>";
    } else {
        echo "Produit non trouvé.";
    }
} else {
    echo "Paramètre manquant.";
}
?>
