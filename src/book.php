<?php
  // "ocburgermonster@gmail.com"
  $to         = "samjwalston@gmail.com";
  $subject    = "Event Request from Site";
  $request    = $_POST["type"];
  $name       = $_POST["name"];
  $hear       = $_POST["hear"];
  $email      = $_POST["email"];
  $phone      = $_POST["phone"];
  $address    = $_POST["address"];
  $city       = $_POST["city"];
  $zip        = $_POST["zip"];
  $date       = $_POST["date"];
  $start      = $_POST["start"];
  $end        = $_POST["end"];
  $eventName  = $_POST["eventName"];
  $number     = $_POST["number"];
  $company    = $_POST["company"];
  $veggie     = $_POST["veggie"];
  $promo      = $_POST["promo"];

  $message    = "Type of Request: " . $request . "\r\n" . 
                "Contact Name: " . $name . "\r\n" .
                "How did you hear about us?: " . $hear . "\r\n" .
                "Email: " . $email . "\r\n" .
                "Phone Number: " . $phone . "\r\n" .
                "Event Address: " . $address . " " . $city . " " . $zip . "\r\n" .
                "Event Date: " . $date . "\r\n" .
                "Event Time: " . $start . " - " . $end . "\r\n" .
                "Event Name: " . $eventName . "\r\n" .
                "Number of Guests: " . $number . "\r\n" .
                "Company Name: " . $company . "\r\n" .
                "Veggie Option: " . $veggie . "\r\n" .
                "Promo Code: " . $promo . "\r\n";

  $header.= "From: Burger Monster <info@burgermonster.net>\r\n"; 
  $header.= "MIME-Version: 1.0\r\n"; 
  $header.= "Content-Type: text/plain; charset=utf-8\r\n"; 
  $header.= "X-Priority: 1\r\n"; 
  $header.= 'X-Mailer: PHP/' . phpversion();
  $header.= "Reply-To: " . $email . "\r\n";

  /* Function that sends the mail.
     Must have a to, subject, message, and a header with From in it (check your
     host for the right formatting on the header) the from in the header must
     also be an email address on the server. */
  mail($to, $subject, $message, $header);

  // Redirect page.
  header("Location: http://www.burgermonster.net/success");
  exit();
?>