<?php
require_once 'configPDO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = isset($_POST['titre']) ? $_POST['titre'] : '';
    $descr = isset($_POST['descr']) ? $_POST['descr'] : '';

    if (!empty($titre) && !empty($descr)) {
        $req = "INSERT INTO projects (titre, descr) VALUES (:titre, :descr)";

        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':descr', $descr);

        if ($stmt->execute()) {
            header('Location: projetsAdmin.php');
        } else {
            echo "Une erreur est survenue lors de l'ajout des données.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css">
    <title>Ajouter des données</title>
</head>
<body>
    <a href="projetsAdmin.php">Retour au backoffice</a><br><br>

    <form action="add.php" method="POST">
        <label for="titre">Titre:</label>
        <input type="text" name="titre" id="titre">

        <label for="descr">Description:</label>
        <textarea name="descr" id="descr" cols="30" rows="5"></textarea>

        <input type="submit" value="Ajouter">
    </form>
</body>
</html>