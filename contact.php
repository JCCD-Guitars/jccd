<?php
 
if($_POST) {
    $visitor_name = "";
    $visitor_email = "";
    $email_title = "Mensaje de la Web Lauderia JCCD";
    $visitor_message = "";
     
    if(isset($_POST['visitor_name'])) {
      $visitor_name = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['visitor_email'])) {
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
    }
     
    if(isset($_POST['visitor_message'])) {
        $visitor_message = htmlspecialchars($_POST['visitor_message']);
    }
     
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";
    .'To: ' . $email_to = "omegamikeleviathan@gmail.com";
     
    if(mail($recipient, $email_title, $visitor_message, $headers)) {
        echo "<p>Gracias por tu mensaje, $visitor_name.</p>";
    } else {
        echo '<p>Hubo un error, uelve a intentar más tarde.</p>';
    }
     
} else {
    echo '<p>Hubo un error.</p>';
}
 
?>