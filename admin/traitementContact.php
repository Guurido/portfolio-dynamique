<?php
require_once 'configPDO.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $mail = $_POST["mail"];
    $msg = $_POST["msg"];

    if (empty($nom)) {
        $error_message = "Le champ nom est obligatoire.";
    } elseif (empty($mail)) {
        $error_message = "Le champ email est obligatoire.";
    } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $error_message = "L'email saisi n'est pas valide.";
    } elseif (empty($msg)) {
        $error_message = "Le champ message est obligatoire.";
    } else {
        try {
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "INSERT INTO contact (nom, mail, msg) VALUES (:nom, :mail, :msg)";
            $stmt = $pdo->prepare($query);

            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':mail', $mail);
            $stmt->bindParam(':msg', $msg);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $to = 'ychatelet03@gmail.com';
                $subject = 'Nouveau message de ' . $nom;
                $message = 'Vous avez reçu un nouveau message de ' . $nom . ' (' . $mail . ') : ' . $msg;
                $headers = 'From: ' . $mail . "\r\n" .
                    'Reply-To: ' . $mail . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
                    
                ini_set('SMTP', 'smtp.gmail.com');
                ini_set('smtp_port', 587);
                ini_set('sendmail_from', $mail);
                
                mail($to, $subject, $message, $headers);
                header("Location: ../index.php");
                if ($sent) {
                    header("Location: ../index.php?success=true");
                } else {
                    $error_message = "Une erreur s'est produite lors de l'envoi de votre message. Veuillez réessayer plus tard.";
                }
            } else {
                $error_message = "Une erreur s'est produite lors de l'envoi de votre message. Veuillez réessayer plus tard.";
            }
        } catch(PDOException $e) {
            $error_message = "Erreur : " . $e->getMessage();
        }
    }
}
?>
