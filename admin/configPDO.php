<?php

    header("Cache-Control: no-cache, must-revalidate");
    header("Content-type: text/html; charset=utf-8");

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "chatelet_portfolio";

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->query("SET NAMES utf8");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Erreur de connexion à la base de données: " . $e->getMessage();
    }

?>