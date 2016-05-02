<?php
  $errors   = array();
  $name     = "";
  $email    = "";
  $subject  = "";
  $body     = "";

  if (isset($_COOKIE["errors"])) {
    $errors   = json_decode($_COOKIE["errors"]);
    $values   = json_decode($_COOKIE["values"]);

    // This is ridiculous. Don't know why I couldn't just access them D:
    foreach($values as $value => $x_value) {
      if ($value === "name") {
        $name = $x_value;
      } else if ($value === "email") {
        $email = $x_value;
      } else if ($value === "subject") {
        $subject = $x_value;
      } else if ($value === "message") {
        $body = $x_value;
      }
    }
  }
?>

<form method="post" action="contact.php" class="contact">

  <?php
    if ($errors) {
      echo "<div class='alert alert-danger alert-dismissible' role='alert'>";
      echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
      echo "<ul>";

      foreach($errors as $error) {
        echo "<li>" . $error . "</li>";
      }

      echo "</ul></div>";
    }
  ?>

  <h1>Contact Us</h1>

  <div class="form-group">
    <label class="h4" for="name">Name</label>
    <input type="text" name="name" class="form-control" id="name" value="<?php echo $name; ?>" required>
  </div>

  <div class="form-group">
    <label class="h4" for="email">Email</label>
    <input type="text" name="email" class="form-control" id="email" value="<?php echo $email; ?>" required>
  </div>

  <div class="form-group">
    <label class="h4" for="subject">Subject</label>
    <input type="text" name="subject" class="form-control" id="subject" value="<?php echo $subject; ?>" required>
  </div>

  <div class="form-group">
    <label class="h4" for="message">Message</label>
    <textarea name="message" class="form-control" id="message" required><?php echo $body; ?></textarea>
  </div>

  <button type="submit" class="btn btn-lg btn-primary">Submit</button>

  <p>You can request The Burger Monster Truck for your event <a href="/#/book">online</a> or call us at (714) 886-9627.</p>
</form>
