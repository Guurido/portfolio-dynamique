<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <link rel="stylesheet" href="../assets/css/projet.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="back.css">
</head>
<body>
    <a href="admin.php" class="button">Retour Back Office</a>
    <div class="tab">
        <?php 
            require_once 'configPDO.php';

            $stmt = $pdo->query('SELECT * FROM contact');


            echo'<table>';
            echo'<thead>';
                echo'<tr>';
                    echo'<th>ID</th>';
                    echo'<th>Nom</th>';
                    echo'<th>Email</th>';
                    echo'<th>Message</th>';
                echo'</tr>';
            echo'</thead>';
            echo'<tbody>';
            foreach ($stmt as $row) {
                echo '<tr>';
                    echo'<td>' . $row['id'] .'</td>';
                    echo'<td>' . $row['nom'] .'</td>';
                    echo'<td>' . $row['mail'] .'</td>';
                    echo'<td>' . $row['msg'] .'</td>';
                    echo '<td>';
                    echo '<a href="deleteC.php?id=' . $row['id'] . '" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer cet élément ?\')"><button class="small-button">Supprimer</button></a>';
                    echo '</td>';
                echo '</tr>';
            }
            echo '<tr>';
            echo '</tr>';
            echo '</tbody>';
            echo '</table>';

        ?>
    </div>
</body>
</html>