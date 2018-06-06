<?php include './scripts/mysql_start.php'; ?>
<?php 

$stmt = mysqli_prepare($conn, "INSERT INTO personal_info (app_id, first_name, last_name, pref_name, birth_date, address, city, state_id, postal_code, pref_phone, us_citizen, english_native, veteran_id, military_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,)")
mysqli_bind_param($stmt, 'ssssssssssssssss', $app_id, $first_name, $last_name, $pref_name, $birth_date, $address, $city, $state_id, $postal_code, $pref_name, $us_citizen, $english_native, $gender_id, $veteran_id, $military_id, $hisp_latino)
$app_id = $_POST["app_id"];
$first_name = $_POST['first_name'];
$last_name = $_POST["last_name"];
$pref_name = $_POST["pref_name"];
$birth_date = $_POST["birth_date"];
$address = $_POST["address"];
$city = $_POST["city"];
$state_id = $_POST["state_id"];
$postal_code = $_POST["postal_code"];
$pref_phone = $_POST["pref_phone"];
$us_citizen = $_POST["us_citizen"];
$english_native = $_POST["english_native"];
$gender_id = $_POST["gender_id"];
$veteran_id = $_POST["veteran_id"];
$military_id = $_POST["military_id"];
$hisp_latino = $_POST["hisp_latino"];

msqli_stmt_execute($stmt);

?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Application Information</title>
</head>
<body>
<h1>Application Information</h1>
<form action="confirm.php" method="POST">

  Are you applying for financial aid?<br><br>
	<input type='radio' name='financial_aid' value='yes'>Yes<br>
	<input type='radio' name='financial_aid' value='no'>No<br>
	<br>

	Do you have employer tuition assistance?<br><br>
	<input type='radio' name='tuition_assistance' value='yes'>Yes<br>
	<input type='radio' name='tuition_assistance' value='no'>No<br>
	<br>

	Are you also applying to other programs?<br><br>
	<input type='radio' name='other_programs' value='yes'>Yes<br>
	<input type='radio' name='other_programs' value='no'>No<br>
	<br>

	Have you ever been convicted of a felony or a gross misdemeanor?<br><br>
	<input type='radio' name='convictions' value='yes'>Yes<br>
	<input type='radio' name='convictions' value='no'>No<br>
	<br>

	A conviction will not necessarily bar admission but <br>
	will require additional documentation prior to a <br>
  decision. You will be contacted shortly via email <br>
  with instructions on reporting the nature of your <br>
  conviction.<br><br>

	Have you ever been placed on probation, suspended <br>
	from, dismissed from or otherwise sanctioned by (for <br>
	any period of time) any higher education institution?<br><br>
	<input type='radio' name='probation' value='yes'>Yes<br>
	<input type='radio' name='probation' value='no'>No<br>
	<br>
  <input type="submit" value="Submit">

</form>
</body>
</html>
<?php include './scripts/mysql_close.php'; ?>
