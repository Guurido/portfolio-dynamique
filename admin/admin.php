<?php
    require_once 'configPDO.php';

    $resultat = $pdo->query('SELECT * FROM users');
    $row = $resultat->fetch();

    $usrname = $row['username'];
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backoffice</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/admin.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/main.css">
</head>
<body>
    <a href="../index.php" class="button">Retour à l'accueil</a>
    <div class="contneur">
        <div class="sousCont">
            <h1 class="title">Bonjour <?php echo $usrname;?></h1>
            <div class="lonk">
                <a href="aPropos.php" class="aa">Modifier à propos</a>
                <a href="projetsAdmin.php" class="aa">Modifier projet</a>
                <a href="adresse.php" class="aa">Modifier adresse</a>
                <a href="message.php" class="aa">Messages</a>
                <a href="deconnexion.php" class="aa">Déconnexion</a>
            </div>
        </div>
    </div>
</body>
</html>