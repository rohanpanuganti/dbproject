<?php include './scripts/mysql_start.php'; ?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>New Application</title>
</head>
<body>
<h1>New Application</h1>
<form action="personal-info.php" method="POST">
  <p>What type of student are you?</p>
  <select name='student_type'>
    <?php
    $student_types = mysqli_query($conn, "SELECT * FROM student_type;");
    while($row = mysqli_fetch_assoc($student_types)) {
      echo "<option value='".$row["student_type_id"]."'>".$row["student_type_name"]."</option>\n";
    }
    ?>
  </select>

  <p>Which college are you applying to?</p>
  <select name='college'>
    <?php
    $colleges = mysqli_query($conn, "SELECT * FROM college;");
    while($row = mysqli_fetch_assoc($colleges)) {
      echo "<option value='".$row["college_id"]."'>".$row["college_name"]."</option>\n";
    }
    mysqli_free_result($colleges);
    ?>
  </select>

  <p>What type of degree are you applying for?</p>
  <select name='degree'>
    <?php
    $degrees = mysqli_query($conn, "SELECT * FROM degree;");
    while($row = mysqli_fetch_assoc($degrees)) {
      echo "<option value='".$row["degree_id"]."'>".$row["degree_name"]."</option>\n";
    }
    mysqli_free_result($degrees);
    ?>
  </select>

  <p>What type of major are you applying for?</p>
  <select name='major'>
    <?php
    $majors = mysqli_query($conn, "SELECT * FROM major;");
    while($row = mysqli_fetch_assoc($majors)) {
      echo "<option value='".$row["major_id"]."'>".$row["major_name"]."</option>\n";
    }
    mysqli_free_result($majors);
    ?>
  </select>



  <p>What term?</p>
  <select name='term'>
    <?php
    $terms = mysqli_query($conn, "SELECT * FROM term;");
    while($row = mysqli_fetch_assoc($terms)) {
      echo "<option value='".$row["term_id"]."'>".$row["term_name"]."</option>\n";
    }
    mysqli_free_result($terms);
    ?>
  </select>
  <br><br><br>
  <input type="submit" value="Next"></input>
</form>
</body>
</html>
<?php include './scripts/mysql_close.php'; ?>
