<?php
    require_once 'configPDO.php';

    $resultat = $pdo->query('SELECT * FROM skills');
    $row = $resultat->fetch();

    $prjet = $row['projets'];
    $frtend = $row['frontend'];
    $bckend = $row['backend'];
    $tchno = $row['techno'];
    $lgistique = $row['logistique'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $projets = isset($_POST['projets']) ? $_POST['projets'] : null;
        $frontend = isset($_POST['frontend']) ? $_POST['frontend'] : null;
        $backend = isset($_POST['backend']) ? $_POST['backend'] : null;
        $technologie = isset($_POST['technologie']) ? $_POST['technologie'] : null;
        $logistique = isset($_POST['logistique']) ? $_POST['logistique'] : null;
        
        $req = "UPDATE skills SET projets = :projets, frontend = :frontend, backend = :backend, techno = :technologie, logistique = :logistique WHERE id = 1";

        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':projets', $projets);
        $stmt->bindParam(':frontend', $frontend);
        $stmt->bindParam(':backend', $backend);
        $stmt->bindParam(':technologie', $technologie);
        $stmt->bindParam(':logistique', $logistique);
        
        if ($stmt->execute()) {
            header("Location: projetsAdmin.php");
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
    <a href="projetsAdmin.php">Retour au backoffice</a> <br><br>

    <h1>Modifier table skills</h1>

    <form action="editSkills.php" method="POST">
        <label for="projets">Projet:</label>
        <textarea name="projets" id="projets" cols="30" rows="5"><?php echo $prjet; ?></textarea>

        <label for="frontend">Frontend:</label>
        <textarea name="frontend" id="frontend" cols="30" rows="5"><?php echo $frtend; ?></textarea>

        <label for="backend">Backend:</label>
        <textarea name="backend" id="backend" cols="30" rows="5"><?php echo $bckend; ?></textarea>

        <label for="technologie">Technologie:</label>
        <textarea name="technologie" id="technologie" cols="30" rows="5"><?php echo $tchno; ?></textarea>

        <label for="logistique">Logistique:</label>
        <textarea name="logistique" id="logistique" cols="30" rows="5"><?php echo $lgistique; ?></textarea>

        <input type="submit" value="Modifier">
    </form>
</body>
</html>
