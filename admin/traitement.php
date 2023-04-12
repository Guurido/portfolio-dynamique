<?php

// traitement connexion
require_once 'configPDO.php';

if(isset($_POST['username']) && isset($_POST['mdp'])) {
    $username = $_POST['username'];
    $mdp = $_POST['mdp'];

    $req = $pdo->prepare('SELECT username, mdp FROM users WHERE username = :username AND mdp = :mdp');
    $req->execute(array('username' => $username, 'mdp' => $mdp));
    $resultat = $req->fetch();
  
    if(!$resultat) {
        header('Location: admin.php');
    } else {
        $isPasswordCorrect = password_verify($mdp, $resultat['mdp']);
        if($isPasswordCorrect) {
            session_start();
            $_SESSION['username'] = $resultat['username'];
            header('Location: admin.php');
        } else {
            header('Location: admin.php');
        }
    }
}
?>