<?php include './scripts/mysql_start.php'; ?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Personal Information</title>
</head>
<body>
<h1>Personal Information</h1>
<form action="application-info.php" method="POST">
  <label class="fmt" for="fn">First name</label><input type="text" id="fn" name="first_name"><br>
  <label class="fmt" for="ln">Last name</label><input type="text" id="ln" name="last_name"><br>
  <label class="fmt" for="pn">Preferred Name</label><input type="text" id="pn" name="pref_name"><br>
  <label class="fmt3" for="dob">Date of Birth</label><input type="date" id="dob" name="birth_date"><br>
  <br>
  <fieldset>
    <legend>Mailing Address</legend>
    <label class="fmt2" for="adr">Street Address</label>
    <input type="text" id="adr" name="address">
    <br>
    <label class="fmt2" for="city">City</label>
    <input type="text" id="city" name="city">
    <br>
    <label for="state">State</label>
    <select id="state" name='state_id'>
      <?php
      $states = mysqli_query($conn, "SELECT * FROM state;");
      while($row = mysqli_fetch_assoc($states)) {
        echo "<option value='".$row["state_id"]."'>".$row["state_code"]."</option>\n";
      }
      mysqli_free_result($states);
      ?>
    </select>

    <label id="pc" for="zip">Postal Code</label>
    <input type="text" id="zip" name="postal_code">
  </fieldset>
  <br>

  <label class="fmt3" for="pf">Preferred Phone</label><input type="text" id="pf" name="pref_phone" placeholder="2061234567"><br>

  <br>
  <span>Are you a US Citizen?</span><br>
  <input type='radio' name='us_citizen' value='yes'>Yes<br>
	<input type='radio' name='us_citizen' value='no'>No<br>
  <br>

  <span>Is English your native language?</span><br>
  <input type='radio' name='english_native' value='yes'>Yes<br>
	<input type='radio' name='english_native' value='no'>No<br>
  <br>

  <span>Gender:</span><br>
  <input type='radio' name='gender' value='male'>Male<br>
	<input type='radio' name='gender' value='female'>Female<br>
  <br>

  <label class="fmt" for="vet">Veteran status</label>
  <select id="vet" name='veteran_id'>
    <?php
    $veterans = mysqli_query($conn, "SELECT * FROM veteran;");
    while($row = mysqli_fetch_assoc($veterans)) {
      echo "<option value='".$row["veteran_id"]."'>".$row["veteran_name"]."</option>\n";
    }
    mysqli_free_result($veterans);
    ?>
  </select><br>

  <label class="fmt" for="mil">Military branch</label>
  <select id="mil" name='military_id'>
    <?php
    $militaries = mysqli_query($conn, "SELECT * FROM military;");
    while($row = mysqli_fetch_assoc($militaries)) {
      echo "<option value='".$row["military_id"]."'>".$row["military_name"]."</option>\n";
    }
    mysqli_free_result($militaries);
    ?>
  </select><br>

  <span>Are you of Hispanic/Latino origin?</span><br>
  <input type='radio' name='hisp_latino' value='yes'>Yes<br>
	<input type='radio' name='hisp_latino' value='no'>No<br>
  <br>

  <span>Please mark all that apply:</span><br>
  <?php
  $ethnicities = mysqli_query($conn, "SELECT * FROM ethnicity;");
  while($row = mysqli_fetch_assoc($ethnicities)) {
    echo "<input type='checkbox' name='app_ethnicity' value='".$row["ethnicity_id"]."'>".$row["ethnicity_name"]."<br>\n";
  }
  mysqli_free_result($ethnicities);
  ?>
  <br>
<input type="submit" value="Next">

</form>



</body>
</html>
<?php include './scripts/mysql_close.php'; ?>
