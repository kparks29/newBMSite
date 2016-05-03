<?php
  // Sanitizes input values.
  function sanitize($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);

    return $value;
  }

  // Checks the request method.
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors   = array();
    $subject  = sanitize($_POST["subject"]);
    $name     = sanitize($_POST["name"]);
    $body     = sanitize($_POST["message"]);
    $email    = sanitize($_POST["email"]);

    // Validations for input fields.
    if (empty($name)) {
      array_push($errors, "Name cannot be blank.");
    }

    if (empty($email)) {
      array_push($errors, "Email cannot be blank.");
    } else if (!preg_match("/\A[\w\d._-]+@[\w\d.-]+\.[\w\d.]+\z/", $email)) {
      array_push($errors, "Email is invalid.");
    }

    if (empty($subject)) {
      array_push($errors, "Subject cannot be blank.");
    }

    if (empty($body)) {
      array_push($errors, "Message cannot be blank.");
    }

    // If there are any errors then set cookies.
    if ($errors) {
      $values = array(
        "name"    => $name,
        "email"   => $email,
        "subject" => $subject,
        "message" => $body
      );

      setcookie("errors", json_encode($errors), time() + 360, "/");
      setcookie("values", json_encode($values), time() + 360, "/");

      // Redirect page.
      // header("Location: http://www.burgermonster.net/#/contact");
      header("Location: http://localhost:8000/#/contact");
      exit();

    // Otherwise send the email.
    } else {
      setcookie("errors", "", time() - 360, "/");
      setcookie("values", "", time() - 360, "/");

      // $to       = "ocburgermonster@gmail.com"
      $to       = "samjwalston@gmail.com";
      $subject  = "Contact Request from Site: " . $subject;
      $message  = $body . "\r\nReply To: " . $name . " " . $email . "\r\n";

      $header.= "From: Burger Monster <info@burgermonster.net>\r\n"; 
      $header.= "MIME-Version: 1.0\r\n"; 
      $header.= "Content-Type: text/plain; charset=utf-8\r\n"; 
      $header.= "X-Priority: 1\r\n"; 
      $header.= 'X-Mailer: PHP/' . phpversion();
      $header.= "Reply-To: ". $email . "\r\n";

      /* Function that sends the mail.
         Must have a to, subject, message, and a header with From in it (check your
         host for the right formatting on the header) the from in the header must
         also be an email address on the server. */
      mail($to, $subject, $message, $header);

      // Redirect page.
      // header("Location: http://www.burgermonster.net");
      header("Location: http://localhost:8000");
      exit();
    }
  }
?>