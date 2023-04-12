<?php
    require_once 'configPDO.php';

    $resultat = $pdo->query('SELECT * FROM projects');
    $row = $resultat->fetch();

    $ttre = $row['titre'];
    $dscr = $row['descr'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $titre = isset($_POST['titre']) ? $_POST['titre'] : '';
        $descr = isset($_POST['descr']) ? $_POST['descr'] : '';
        var_dump($_POST);

        if (!empty($titre) && !empty($descr)) {
            echo $titre;
            $req = "UPDATE projects SET titre = :titre, descr = :descr WHERE id = 1";
            echo $req;
            $stmt = $pdo->prepare($req);
            $stmt->bindParam(':titre', $titre);
            $stmt->bindParam(':descr', $descr);
            
            if ($stmt->execute()) {
                header("Location: admin.php");
            } else {
                echo "Une erreur est survenue lors de la modification des données.";
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
    <title>Modifier les données</title>
</head>
<body>
    <a href="projetsAdmin.php">Retour au backoffice</a> <br><br>

    <h1>Modifier table skills</h1>

    <form action="editProjets.php" method="POST">
        <label for="titre">Titre:</label>
        <textarea name="titre" id="titre" cols="30" rows="5"><?php echo $ttre;?></textarea>

        <label for="descr">Description:</label>
        <textarea name="descr" id="descr" cols="30" rows="5"><?php echo $dscr;?></textarea>
        <input type="submit" value="Modifier">
    </form>
</body>
</html>
