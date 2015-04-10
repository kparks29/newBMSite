<?php
  $to = "ocburgermonster@gmail.com";
  $subject = "Event Request from Site";
  $request = $_POST["event"];
  $name = $_POST["name"];
  $hear = $_POST["hear"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $address = $_POST["address"];
  $city = $_POST["city"];
  $zip = $_POST["zip"];
  $date = $_POST["date"];
  $start = $_POST["start"];
  $end = $_POST["end"];
  $eventName = $_POST["eventName"];
  $number = $_POST["number"];
  $company = $_POST["company"];
  $veggie = $_POST["veggie"];
  $promo = $_POST["promo"];
  $message = $subject . "\r\n";
  $header = "To: Burger Monster <ocburgermonster@gmail.com>\r\n";
  $header.= "From: " . $name . " <" . $email . ">\r\n"; 
  $header.= "MIME-Version: 1.0\r\n"; 
  $header.= "Content-Type: text/plain; charset=utf-8\r\n"; 
  $header.= "X-Priority: 1\r\n"; 
  $header.= 'X-Mailer: PHP/' . phpversion();
  $header.= "Reply-To: " . $email . "\r\n";
  //function that sends the mail
  //much have a to, subject, message, and a header with From in it (check your host for the right formatting on the header)
  //the from in the header must also be an email address on the server
  mail($to, $subject, $message, $header);
  //redirect page
  header( "Location: http://www.burgermonster.net/success" );
  exit();
?>