<?php
  $errors     = array();
  $request    = "";
  $name       = "";
  $hear       = "";
  $email      = "";
  $phone      = "";
  $address    = "";
  $city       = "";
  $zip        = "";
  $date       = "";
  $start      = "";
  $end        = "";
  $eventName  = "";
  $count      = "";
  $company    = "";
  $veggie     = False;

  if (isset($_COOKIE["errors"])) {
    $errors   = json_decode($_COOKIE["errors"]);
    $values   = json_decode($_COOKIE["values"]);

    // This is ridiculous. Don't know why I couldn't just access them D:
    foreach($values as $value => $x_value) {
      if ($value === "type") {
        $request = $x_value;
      } else if ($value === "name") {
        $name = $x_value;
      } else if ($value === "hear") {
        $hear = $x_value;
      } else if ($value === "email") {
        $email = $x_value;
      } else if ($value === "phone") {
        $phone = $x_value;
      } else if ($value === "address") {
        $address = $x_value;
      } else if ($value === "city") {
        $city = $x_value;
      } else if ($value === "zip") {
        $zip = $x_value;
      } else if ($value === "date") {
        $date = $x_value;
      } else if ($value === "start") {
        $start = $x_value;
      } else if ($value === "end") {
        $end = $x_value;
      } else if ($value === "eventName") {
        $eventName = $x_value;
      } else if ($value === "count") {
        $count = $x_value;
      } else if ($value === "company") {
        $company = $x_value;
      } else if ($value === "veggie" && $x_value === "Yes") {
        $veggie = True;
      }
    }
  }
?>

<form class="book" method="post" action="book.php">

  <?php
    if ($errors) {
      echo "<div class='alert alert-danger alert-dismissible' role='alert'>";
      echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
      echo "<i class='fa fa-close' aria-hidden='true'></i>";
      echo "</button>";
      echo "<ul>";

      foreach($errors as $error) {
        echo "<li>" . $error . "</li>";
      }

      echo "</ul></div>";
    }
  ?>

  <h1>Book an Event</h1>
  <p class="message">We would love to hear from you! Please fill out this form and we will get in touch within 24 hours.</p>

  <div class="form-group">
    <label class="h4">Type of Request</label>

    <div class="radio">
      <?php
        if ($request === "Event Request") {
          echo "<input type='radio' value='Event Request' name='type' id='type-event' checked required>";
        } else {
          echo "<input type='radio' value='Event Request' name='type' id='type-event' required>";
        }
      ?>
      <label for="type-event">Event Request (Attendees pay)</label>
    </div>

    <div class="radio">
      <?php
        if ($request === "Catering Request") {
          echo "<input type='radio' value='Catering Request' name='type' id='type-catering' checked required>";
        } else {
          echo "<input type='radio' value='Catering Request' name='type' id='type-catering' required>";
        }
      ?>
      <label for="type-catering">Catering Request (Host pays)</label>
    </div>
  </div>

  <div class="form-group">
    <label class="h4" for="name">Name</label>
    <input type="text" name="name" class="form-control" id="name" value="<?php echo $name; ?>" required>
  </div>

  <div class="form-group">
    <label class="h4">How did you Hear About Us? <small>(optional)</small></label>

    <div class="radio">
      <?php
        if ($hear === "Internet Search") {
          echo "<input type='radio' value='Internet Search' name='hear' id='hear-internet' checked>";
        } else {
          echo "<input type='radio' value='Internet Search' name='hear' id='hear-internet'>";
        }
      ?>
      <label for="hear-internet">Internet Search (Google, Bing, Yahoo, etc.)</label>
    </div>

    <div class="radio">
      <?php
        if ($hear === "Yelp") {
          echo "<input type='radio' value='Yelp' name='hear' id='hear-yelp' checked>";
        } else {
          echo "<input type='radio' value='Yelp' name='hear' id='hear-yelp'>";
        }
      ?>
      <label for="hear-yelp">Yelp</label>
    </div>

    <div class="radio">
      <?php
        if ($hear === "Friend or Relative") {
          echo "<input type='radio' value='Friend or Relative' name='hear' id='hear-friend' checked>";
        } else {
          echo "<input type='radio' value='Friend or Relative' name='hear' id='hear-friend'>";
        }
      ?>
      <label for="hear-friend">Referred to by Friend or Relative</label>
    </div>

    <div class="radio">
      <?php
        if ($hear === "Another Truck") {
          echo "<input type='radio' value='Another Truck' name='hear' id='hear-another-truck' checked>";
        } else {
          echo "<input type='radio' value='Another Truck' name='hear' id='hear-another-truck'>";
        }
      ?>
      <label for="hear-another-truck">Referred to from another Truck</label>
    </div>

    <div class="radio">
      <?php
        if ($hear === "Saw or Ate at Truck") {
          echo "<input type='radio' value='Saw or Ate at Truck' name='hear' id='hear-our-truck' checked>";
        } else {
          echo "<input type='radio' value='Saw or Ate at Truck' name='hear' id='hear-our-truck'>";
        }
      ?>
      <label for="hear-our-truck">Saw or Ate at Truck</label>
    </div>

    <div class="radio">
      <?php
        if ($hear === "Other") {
          echo "<input type='radio' value='Other' name='hear' id='hear-other' checked>";
        } else {
          echo "<input type='radio' value='Other' name='hear' id='hear-other'>";
        }
      ?>
      <label for="hear-other">Other</label>
    </div>
  </div>

  <div class="form-group">
    <label for="phone" class="h4">Phone</label>
    <input type="text" name="phone" class="form-control" id="phone" placeholder="(555) 555-5555" value="<?php echo $phone; ?>" required>
  </div>

  <div class="form-group">
    <label for="email" class="h4">Email</label>
    <input type="text" name="email" class="form-control" id="email" placeholder="name@example.com" value="<?php echo $email; ?>" required>
  </div>

  <div class="form-group">
    <label class="h4">Address of Event</label>

    <div class="input-group" id="address">
      <input type="text" name="address" class="form-control" id="address-street" placeholder="Street Address" value="<?php echo $address; ?>" required>
      <input type="text" name="city" class="form-control" id="address-city" placeholder="City" value="<?php echo $city; ?>" required>
      <input type="text" name="zip" class="form-control" id="address-zip" placeholder="Zip Code" value="<?php echo $zip; ?>" required>
    </div>
  </div>

  <div class="form-group">
    <label class="h4">Date of Event</label>
    <input type="text" name="date" class="form-control" id="date" readonly="readonly" value="<?php echo $date; ?>" required>
  </div>

  <div class="form-group">
    <label class="h4">Time of Event</label>

    <div class="time input-group">
      <span class="input-group-addon">Start</span>
      <input type="text" name="start" class="form-control" id="time-start" readonly="readonly" value="<?php echo $start; ?>" required>
      <span class="help-block">Start time between 8am - 11pm.</span>
    </div>

    <div class="time input-group">
      <span class="input-group-addon">End</span>
      <input type="text" name="end" class="form-control" id="time-end" readonly="readonly" value="<?php echo $end; ?>" required>
      <span class="help-block">End time between 10am - 2am.</span>
    </div>
  </div>

  <div class="form-group">
    <label class="h4">Name of Event</label>
    <input type="text" name="eventName" class="form-control" value="<?php echo $eventName; ?>" required>
  </div>

  <div class="form-group">
    <label class="h4">Number of Guests</label>
    <input type="number" name="count" class="form-control" value="<?php echo $count; ?>" min="1" step="1" required>
  </div>

  <div class="form-group">
    <label class="h4">Company Name <small>(optional)</small></label>
    <input type="text" name="company" class="form-control" value="<?php echo $company; ?>" >
  </div>

  <div class="form-group">
    <div class="checkbox">
      <?php
        if ($veggie) {
          echo "<input type='checkbox' value='yes' name='veggie' id='veggie' checked>";
        } else {
          echo "<input type='checkbox' value='yes' name='veggie' id='veggie'>";
        }
      ?>
      <label for="veggie" class="h4">Need Vegetarian Option?</label>
    </div>
    <span class="help-block">CREATURE FROM THE BLACK LAGOON - Portabella Mushroom, sautéed onions, tomatoes, avocado, spinach and herb sauce.</span>
  </div>

  <input type="submit" name="submit" value="Submit" class="btn btn-lg btn-primary">
</form>
