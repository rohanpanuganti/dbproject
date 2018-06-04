<?php
$servername = "cssql.seattleu.edu";
$username = "os_eisipsa";
$password = "66PDYcdf";
$dbname = "os_team10";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//$sql = "SELECT courseCode, courseName FROM Courses";
//$result = mysqli_query($conn, $sql);
?>
