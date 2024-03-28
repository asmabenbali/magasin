<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Produit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Ajouter un Nouveau Produit</h1>
    <form action="ajouter.php" method="post" enctype="multipart/form-data">
        <label for="refPdt">Référence :</label>
        <input type="text" id="refPdt" name="refPdt" required><br>
        
        <label for="libPdt">Libellé :</label>
        <input type="text" id="libPdt" name="libPdt" required><br>
        
        <label for="prix">Prix :</label>
        <input type="text" id="prix" name="prix" required><br>
        
        <label for="qte">Quantité :</label>
        <input type="text" id="qte" name="qte" required><br>
        
        <label for="photo">Photo :</label>
        <input type="file" id="photo" name="photo" accept="image/*"><br>
        
        <label for="action">Action :</label>
        <input type="text" id="action" name="action"><br>
        
        <input type="submit" value="Ajouter le produit">
    </form>
</body>
</html>
