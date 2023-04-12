<?php
    require_once 'configPDO.php';

    $resultat = $pdo->query('SELECT * FROM about');
    $row = $resultat->fetch();

    $nm = $row['nom'];
    $txt = $row['texte'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nom = isset($_POST['nom']) ? $_POST['nom'] : null;
        $texte = isset($_POST['texte']) ? $_POST['texte'] : null;
        $photo = isset($_POST['photo']) ? $_POST['photo'] : null;
        
        $req = "UPDATE about SET nom = :nom, texte = :texte, photo = :photo WHERE id = 2";

        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':texte', $texte);
        $stmt->bindParam(':photo', $photo);
        
        if ($stmt->execute()) {
            header("Location: editAbout.php");
        } else {
            echo "Une erreur est survenue lors de la modification des données.";
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
    <title>Modifier les données</title>
</head>
<body>
    <a href="admin.php">Retour au backoffice</a> <br><br>

    <h1>Modifier table skills</h1>

    <form action="editAbout.php" method="POST">
        <label for="nom">Nom:</label>
        <textarea name="nom" id="nom" cols="30" rows="5"><?php echo $nm;?></textarea>

        <label for="texte">Texte:</label>
        <textarea name="texte" id="texte" cols="30" rows="5"><?php echo $txt;?></textarea>

        <label for="photo">Photo:</label>
        <input type="file" name="photo" id="photo" cols="30" rows="5">

        <input type="submit" value="Modifier">
    </form>
</body>
</html>
