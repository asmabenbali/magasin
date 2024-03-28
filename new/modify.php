<?php
include 'config.php';

// Check if product reference is provided in the URL
if(isset($_GET['ref'])) {
    $ref = $_GET['ref'];

    // Fetch product details based on the reference
    $sql = "SELECT * FROM Produitt WHERE RefPdt = '$ref'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the product details
        $row = $result->fetch_assoc();
        $libelle = $row['libPdt'];
        $prix = $row['prix'];
        $quantite = $row['Qte'];
        $type = $row['type'];
        $image = $row['image_src'];
    } else {
        echo "Product not found.";
        exit();
    }
} else {
    echo "Product reference not provided.";
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $libPdt = $_POST["libPdt"];
    $prix = $_POST["prix"];
    $qte = $_POST["qte"];
    $type = $_POST["type"];

    // Update the product details in the database
    $sql = "UPDATE Produitt SET libPdt='$libPdt', prix='$prix', Qte='$qte', type='$type' WHERE RefPdt='$ref'";
    if ($conn->query($sql) === TRUE) {
        // Redirect to affichage.php after successful modification
        header("Location: affichage.php");
        exit(); // Ensure no further code execution after redirection
    } else {
        echo "Error updating product: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Produit</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <h1>Modifier le Produit</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- Hidden input field to store the product reference -->
        <input type="hidden" name="refPdt" value="<?php echo $ref; ?>">

        <label for="libPdt">Libellé :</label>
        <input type="text" id="libPdt" name="libPdt" value="<?php echo $libelle; ?>" required><br><br>
        
        <label for="prix">Prix :</label>
        <input type="text" id="prix" name="prix" value="<?php echo $prix; ?>" required><br><br>
        
        <label for="qte">Quantité :</label>
        <input type="text" id="qte" name="qte" value="<?php echo $quantite; ?>" required><br><br>
        
        <!-- Optional: If you need an action field -->
        <label for="type">Type :</label>
        <input type="text" id="type" name="type" value="<?php echo $type; ?>"><br><br>
        
        <input type="submit" value="Modifier le produit">
    </form>
</body>
</html>
