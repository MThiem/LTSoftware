<?php
    if(isset($_POST["submit"])) {
        
        $email = test_input($_POST["email"]);
        $visitor = test_input($_POST["visitor"]);
        $message = test_input($_POST["message"]);

        $mailto = "michael.thiem@ltsoftware.de";
        $headers = "From: ".$email;
        
        mail($mailto, "Kontaktanfrage über LTSoftware.de", $message, $headers);
        header("Location: index.html#contact");
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
?>