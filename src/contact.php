<?php
  // "ocburgermonster@gmail.com"
  $to       = "samjwalston@gmail.com";
  $subject  = "Contact Request from Site: " . $_POST["subject"];
  $name     = $_POST["name"];
  $body     = $_POST["message"];
  $email    = $_POST["email"];
  $message  = $body . "\r\nReply To: " . $name . " " . $email . "\r\n";

  $header.= "From: Burger Monster <info@burgermonster.net>\r\n"; 
  $header.= "MIME-Version: 1.0\r\n"; 
  $header.= "Content-Type: text/plain; charset=utf-8\r\n"; 
  $header.= "X-Priority: 1\r\n"; 
  $header.= 'X-Mailer: PHP/' . phpversion();
  $header.= "Reply-To: ". $email . "\r\n";

  // Function that sends the mail.
  // Must have a to, subject, message, and a header with From in it (check your
  // host for the right formatting on the header) the from in the header must
  // also be an email address on the server.
  mail($to, $subject, $message, $header);
  // Redirect page.
  header( "Location: http://www.burgermonster.net" );
  exit();
?>