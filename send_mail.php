<?php
    if(isset($_POST["submit"])) {
        
        // Ihre Google reCAPTCHA v3-Schlüssel
        $recaptcha_secret_key = "HIER SECRET KEY EINTRAGEN";

        // Überprüfen Sie das reCAPTCHA-Ergebnis
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$recaptcha_secret_key."&response=".$_POST['token']);
        $response = json_decode($response, true);

        if ($response["success"] === true) {

            $email = test_input($_POST["email"]);
            $visitor = test_input($_POST["visitor"]);
            $message = test_input($_POST["message"]);

            $mailto = "info@ltsoftware.de";
            $headers = "From: ".$email;
            
            if(mail($mailto, "Kontaktanfrage über LTSoftware.de", $message, $headers)) {
                $MailSuccess = "Ihre Nachricht wurde erfolgreich versendet, wir werden uns in kürze bei Ihnen melden.";
            }
            else {
                $MailError = "Es ist ein Fehler beim versenden der Nachricht aufgetreten. Versuchen Sie es zu einen späteren Zeitpunkt erneut.";
            }
        }
        else {
            $MailError = "reCAPTCHA-Überprüfung fehlgeschlagen. Bitte versuchen Sie es erneut.";
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
?>