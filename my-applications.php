<?php include './scripts/mysql_start.php'; ?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>My Application</title>
</head>
<body>
	<?php echo "Welcome ".&usename; ?>
<h1>My Application</h1>

<?php

$sql = "SELECT app_id, student_type_name, college_name, degree_name, major_name, term_name FROM application, student_type, college, degree, major, term WHERE application.student_type_id = student_type.student_type_id && application.college_id = college.college_id && application.degree_id = degree.degree_name && application.major_id = major.major_name && application.term_id = term.term_id && user_id = ".$user_id.";";

$result = mysqli_query($conn,$sql);

if(msqli_num_row($result) > 0){
	echo "<table border = '1'>\n";

	echo "<tr>\n";
	echo "<th>App ID</th><th>Student Type</th><th>College</th><th>Degree</th><th>Major</th><th>Term</th>";
	echo "</tr>\n";

	while($row = mysqli_fetch_row($result)){
		echo "<tr>\n";
		echo "<td>".$row[0]."</td>\n"."<td>".$row[1]."</td>\n"."<td>".$row[2]."</td>\n"."<td>".$row[3]."</td>\n"."<td>".$row[4]."</td>\n"."<td>".$row[5]."</td>\n";
		echo "</tr>\n";
	}
}

else {
	echo "No Applications"
} 

?>

</body>
</html>
<?php include './scripts/mysql_close.php'; ?>
