<?php
    require_once 'configPDO.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $rue = isset($_POST['rue']) ? $_POST['rue'] : null;
        $ville = isset($_POST['ville']) ? $_POST['ville'] : null;
        $pays = isset($_POST['pays']) ? $_POST['pays'] : null;
        $technologie = isset($_POST['email']) ? $_POST['email'] : null;
        $logistique = isset($_POST['tel']) ? $_POST['tel'] : null;
        $logistique = isset($_POST['postal']) ? $_POST['postal'] : null;
        
        $req = "UPDATE location SET rue = :rue, ville = :ville, pays = :pays, email = :email, tel = :tel, postal = :postal WHERE id = 2";

        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':rue', $rue);
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
?>