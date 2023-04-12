<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back office</title>
    <link rel="stylesheet" href="../assets/css/projet.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="back.css">
</head>
<body>
    <a href="admin.php" class="button">Retour Back Office</a>
    <div class="tab">
        <?php 
            require_once 'configPDO.php';

            $req = 'SELECT * FROM about';

            $msql = $pdo->query($req);
            $msql = $msql->fetch();

            $id = $msql['id'];
            $nom = $msql['nom'];
            $texte = $msql['texte'];
            $photo = $msql['photo'];

            echo'<table>';
                echo'<thead>';
                    echo'<tr>';
                        echo'<th>ID</th>';
                        echo'<th>Nom</th>';
                        echo'<th>Texte</th>';
                        echo'<th>Photo</th>';
                        echo '<tr>';
                            echo'<td>' . $id .'</td>';
                            echo'<td>' . $nom .'</td>';
                            echo'<td>' . $texte .'</td>';
                            echo "<td><img class='imgTab' src='../images/".$photo."'></td>";
                            echo '<td><a href="editAbout.php"><button class="small-button">Modifier</button></a></td>';
                    echo '</tr>';
                echo '</tbody>';
            echo '</table>';
        ?>
    </div>
</body>
</html>