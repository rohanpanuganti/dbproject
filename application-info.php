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
