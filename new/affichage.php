<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage des Produits</title>

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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        table th, table td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }

        table tbody tr:hover {
            background-color: #f5f5f5;
        }

        table img {
            max-width: 100px;
            height: auto;
        }

        table a {
            text-decoration: none;
            color: #007bff;
        }

        table a:hover {
            text-decoration: underline;
            color: #0056b3;
        }
        
        .button {
            display: inline-block;
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
            gap: 10;
        }
        
        .button:hover {
            background-color: #0056b3;
           
        }
        
        .delete-btn {
            background-color: #dc3545;
        
        }
        
        .modify-btn {
            background-color: #ffc107;
        
        }
        
        .details-btn {
            background-color: #28a745;
        }
    </style>
</head>
<body>
    <h1>Liste des Produits</h1>
    <a href="add.php" class="button">Ajouter un produit</a>
    <table>
        <thead>
            <tr>
                <th>Référence</th>
                <th>Libellé</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Type</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'config.php';

            $sql = "SELECT * FROM Produitt";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["RefPdt"] . "</td>";
                    echo "<td>" . $row["libPdt"] . "</td>";
                    echo "<td>" . $row["prix"] . "€</td>";
                    echo "<td>" . $row["Qte"] . "</td>";
                    echo "<td>" . $row["type"] . "</td>";
                    echo "<td><img src='" . $row["image_src"] . "' alt='Image du produit'></td>";
                    echo "<td>";
                    echo "<button class='button delete-btn' onclick='deleteProduct(\"".$row["RefPdt"]."\")'>Supprimer</button>";
                    echo "<a href='details.php?id=" . $row["RefPdt"] . "' class='button details-btn'>Détails</a>";
                    echo "<a href='modify.php?ref=" . $row["RefPdt"] . "' class='button modify-btn'>Modifier</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Aucun produit trouvé.</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>

    <script>
        function deleteProduct(ref) {
            if (confirm("Êtes-vous sûr de vouloir supprimer ce produit?")) {
                window.location.href = "delete.php?ref=" + ref;
            }
        }
    </script>
</body>
</html>
