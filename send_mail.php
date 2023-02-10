<?php

    if(isset($_POST["submit"])) {
        
        $email = $_POST["email"];
        $visitor = $_POST["visitor"];
        $message = $_POST["message"];

        $mailto = "michael.thiem@ltsoftware.de";
        $headers = "From: ".$email;
        
        mail($mailto, "Kontaktanfrage über LTSoftware.de", $message, $headers);
        header("Location: index.html#contact");
    }
?>