<?php 
    require_once('configPDO.php');
    $resultat = $pdo->query('SELECT * FROM location');
    $row = $resultat->fetch();

    $ru = $row['rue'];
    $city = $row['ville'];
    $pys = $row['pays'];
    $ml = $row['email'];
    $tail = $row['tel'];
    $pstal = $row['postal'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $titre = isset($_POST['rue']) ? $_POST['rue'] : '';
        $ville = isset($_POST['ville']) ? $_POST['ville'] : '';
        $pays = isset($_POST['pays']) ? $_POST['pays'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $tel = isset($_POST['tel']) ? $_POST['tel'] : '';
        $postal = isset($_POST['postal']) ? $_POST['postal'] : '';

        if (!empty($titre) && !empty($ville) && !empty($pays) && !empty($email) && !empty($tel) && !empty($postal)) {
            echo $titre;
            $req = "UPDATE location SET rue = :rue, ville = :ville, pays = :pays, email = :email, tel = :tel, postal = :postal WHERE id = 2";
            $stmt = $pdo->prepare($req);
            $stmt->bindParam(':rue', $titre);
            $stmt->bindParam(':ville', $ville);
            $stmt->bindParam(':pays', $pays);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':tel', $tel);
            $stmt->bindParam(':postal', $postal);
            
            if ($stmt->execute()) {
                header("Location: adresse.php");
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
    <a href="adresse.php">Retour en arrière</a> <br><br>

    <h1>Modifier table location</h1>

    <form action="location.php" method="POST">
        <label for="rue">Rue:</label>
        <textarea name="rue" id="rue" cols="30" rows="5"><?php echo $ru; ?></textarea>

        <label for="ville">Ville:</label>
        <textarea name="ville" id="ville" cols="30" rows="5"><?php echo $city; ?></textarea>

        <label for="pays">Pays:</label>
        <textarea name="pays" id="pays" cols="30" rows="5"><?php echo $pys; ?></textarea>

        <label for="email">Adresse email:</label>
        <textarea name="email" id="email" cols="30" rows="5"><?php echo $ml; ?></textarea>

        <label for="tel">Téléphone:</label>
        <textarea name="tel" id="tel" cols="30" rows="5"><?php echo $tail; ?></textarea>

        <label for="postal">Code Postal:</label>
        <textarea name="postal" id="postal" cols="30" rows="5"><?php echo $pstal; ?></textarea>

        <input type="submit" value="Modifier">
    </form>
</body>
</html>