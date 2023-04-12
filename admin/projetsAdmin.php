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

            $req = 'SELECT * FROM skills';

            $msql = $pdo->query($req);
            $msql = $msql->fetch();

            $id = $msql['id'];
            $projets = $msql['projets'];
            $frontend = $msql['frontend'];
            $backend = $msql['backend'];
            $technologie = $msql['techno'];
            $links = $msql['links'];
            $logistique = $msql['logistique'];

            echo'<table>';
                echo'<thead>';
                    echo'<tr>';
                        echo'<th>ID</th>';
                        echo'<th>Projet</th>';
                        echo'<th>Frontend</th>';
                        echo'<th>Backend</th>';
                        echo'<th>Technologie</th>';
                        echo'<th>Logistique</th>';
                        echo '<tr>';
                            echo'<td>' . $id .'</td>';
                            echo'<td>' . $projets .'</td>';
                            echo'<td>' . $frontend .'</td>';
                            echo'<td>' . $backend .'</td>';
                            echo'<td>' . $technologie .'</td>';
                            echo'<td>' . $logistique .'</td>';
                            echo '<td><a href="editSkills.php"><button class="small-button">Modifier</button></a></td>';
                    echo '</tr>';
                echo '</tbody>';
            echo '</table>';
        ?>
    </div>

    <div class="tab2">
        <?php
            $stmt = $pdo->query('SELECT * FROM projects');
        
            echo'<table>';
            echo'<thead>';
                echo'<tr>';
                    echo'<th>ID</th>';
                    echo'<th>Titre</th>';
                    echo'<th>Description</th>';
                    echo'<th>Actions</th>';
                echo'</tr>';
            echo'</thead>';
            echo'<tbody>';
            foreach ($stmt as $row) {
                echo '<tr>';
                    echo'<td>' . $row['id'] .'</td>';
                    echo'<td>' . $row['titre'] .'</td>';
                    echo'<td>' . $row['descr'] .'</td>';
                    echo '<td>';
                    echo '<a href="delete.php?id=' . $row['id'] . '" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer cet élément ?\')"><button class="small-button">Supprimer</button></a>';
                    echo '<a href="editProjets.php?id=' . $row['id'] . '"><button class="small-button">Modifier</button></a>';
                    echo '</td>';
                echo '</tr>';
            }
            echo '<tr>';
                echo '<td colspan="3"></td>';
                echo '<td><a href="add.php"><button class="small-button">Ajouter</button></a></td>';
            echo '</tr>';
            echo '</tbody>';
            echo '</table>';

        ?>
    </div>
</body>
</html>