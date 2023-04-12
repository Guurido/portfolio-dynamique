<?php
require_once('configPDO.php');
try {
    $id = $_GET['id'];
    $req = "DELETE FROM contact WHERE id = :id";
    $stmt = $pdo->prepare($req);
    $stmt->bindParam(':id', $id);
    
    if ($stmt->execute()) {
        header('Location: message.php');
    } else {
        echo "Une erreur est survenue lors de la suppression des données.";
    }
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
