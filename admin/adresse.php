<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back office</title>
    <link rel="stylesheet" href="../assets/css/projet.css">
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
    <a href="admin.php" class="button">Retour Back Office</a>
    <div class="tab">
        <?php 
            require_once 'configPDO.php';

            $req = 'SELECT * FROM location';

            $msql = $pdo->query($req);
            $msql = $msql->fetch();

            $id = $msql['id'];
            $rue = $msql['rue'];
            $ville = $msql['ville'];
            $pays = $msql['pays'];
            $email = $msql['email'];
            $tel = $msql['tel'];
            $postal = $msql['postal'];

            echo'<table>';
                echo'<thead>';
                    echo'<tr>';
                        echo'<th>ID</th>';
                        echo'<th>Rue</th>';
                        echo'<th>Ville</th>';
                        echo'<th>Pays</th>';
                        echo'<th>Email</th>';
                        echo'<th>Téléphone</th>';
                        echo'<th>Code Postal</th>';
                        echo '<tr>';
                            echo'<td>' . $id .'</td>';
                            echo'<td>' . $rue .'</td>';
                            echo'<td>' . $ville .'</td>';
                            echo'<td>' . $pays .'</td>';
                            echo'<td>' . $email .'</td>';
                            echo'<td>' . $tel .'</td>';
                            echo'<td>' . $postal .'</td>';
                            echo '<td><a href="location.php"><button class="small-button">Modifier</button></a></td>';
                    echo '</tr>';
                echo '</tbody>';
            echo '</table>';
        ?>
    </div>