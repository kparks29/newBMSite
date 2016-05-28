<?php
  // Sanitizes input values.
  function sanitize($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);

    return $value;
  }

  function phone_validator($value) {
    $value = preg_replace("/[^x\d]/", "", $value);

    return !preg_match("/\A(\d{10})(x\d{4})?\z/", $value);
  }

  // Checks the request method.
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors     = array();
    $request    = sanitize($_POST["type"]);
    $name       = sanitize($_POST["name"]);
    $hear       = sanitize($_POST["hear"]);
    $email      = sanitize($_POST["email"]);
    $phone      = sanitize($_POST["phone"]);
    $address    = sanitize($_POST["address"]);
    $city       = sanitize($_POST["city"]);
    $zip        = sanitize($_POST["zip"]);
    $date       = sanitize($_POST["date"]);
    $start      = sanitize($_POST["start"]);
    $end        = sanitize($_POST["end"]);
    $eventName  = sanitize($_POST["eventName"]);
    $count      = intval(sanitize($_POST["count"]));
    $company    = sanitize($_POST["company"]);
    $veggie     = sanitize($_POST["veggie"]);

    // Validations for input fields.
    if (empty($request)) {
      array_push($errors, "Request type needs to be selected.");
    }

    if (empty($name)) {
      array_push($errors, "Name cannot be blank.");
    }

    if (empty($email)) {
      array_push($errors, "Email cannot be blank.");
    } else if (!preg_match("/\A[\w\d._-]+@[\w\d.-]+\.[\w\d.]+\z/", $email)) {
      array_push($errors, "Email is invalid.");
    }

    if (empty($phone)) {
      array_push($errors, "Phone cannot be blank.");
    } else if (phone_validator($phone)) {
      array_push($errors, "Phone is invalid.");
    }

    if (empty($address)) {
      array_push($errors, "Address cannot be blank.");
    }

    if (empty($city)) {
      array_push($errors, "City cannot be blank.");
    }

    if (empty($zip)) {
      array_push($errors, "Zip Code cannot be blank.");
    }

    if (empty($date)) {
      array_push($errors, "Date needs to be selected.");
    }

    if (empty($start)) {
      array_push($errors, "Start time needs to be selected.");
    }

    if (empty($end)) {
      array_push($errors, "End time needs to be selected.");
    }

    if (empty($eventName)) {
      array_push($errors, "Event name cannot be blank.");
    }

    if (empty($count)) {
      array_push($errors, "Number of guests cannot be blank.");
    } else if ($count <= 0) {
      array_push($errors, "Number of guests must be greater than 0.");
    }

    if (empty($veggie)) {
      $veggie = "No";
    } else {
      $veggie = "Yes";
    }

    // If there are any errors then set cookies.
    if ($errors) {
      $values = array(
        "type"      => $request,
        "name"      => $name,
        "hear"      => $hear,
        "email"     => $email,
        "phone"     => $phone,
        "address"   => $address,
        "city"      => $city,
        "zip"       => $zip,
        "date"      => $date,
        "start"     => $start,
        "end"       => $end,
        "eventName" => $eventName,
        "count"     => $count,
        "company"   => $company,
        "veggie"    => $veggie
      );

      setcookie("errors", json_encode($errors), time() + 360, "/");
      setcookie("values", json_encode($values), time() + 360, "/");

      // Redirect page.
      header("Location: http://www.burgermonster.net/#/book");
      exit();

    // Otherwise send the email.
    } else {
      setcookie("errors", "", time() - 360, "/");
      setcookie("values", "", time() - 360, "/");

      $to         = "ocburgermonster@gmail.com";
      $subject    = "Event Request from Site";
      $message    = "Type of Request: " . $request . "\r\n" .
                    "Contact Name: " . $name . "\r\n" .
                    "How did you hear about us?: " . $hear . "\r\n" .
                    "Email: " . $email . "\r\n" .
                    "Phone Number: " . $phone . "\r\n" .
                    "Event Address: " . $address . " " . $city . " " . $zip . "\r\n" .
                    "Event Date: " . $date . "\r\n" .
                    "Event Time: " . $start . " - " . $end . "\r\n" .
                    "Event Name: " . $eventName . "\r\n" .
                    "Number of Guests: " . $count . "\r\n" .
                    "Company Name: " . $company . "\r\n" .
                    "Veggie Option: " . $veggie . "\r\n";

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
    }
  }
?>