<html>
<head>
	<title>Add Users</title>
</head>

<body>
	<a href="index.php">Go to Home</a>
	<br/><br/>

	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr>
				<td>Boekingsnummer</td>
				<td><input type="text" name="Boekingsnummer"></td>
			</tr>
			<tr>
				<td>Titel</td>
				<td><input type="Titel" name="Titel"></td>
			</tr>
			<tr>
				<td>Bestemming</td>
				<td><input type="text" name="Bestemming"></td>
			</tr>
            <tr>
				<td>Omschrijving</td>
				<td><input type="text" name="Omschrijving"></td>
			</tr>
            <tr>
				<td>Begindatum</td>
				<td><input type="text" name="Begindatum"></td>
			</tr>
            <tr>
				<td>Einddatum</td>
				<td><input type="text" name="Einddatum"></td>
			</tr>
            <tr>
				<td>Maximumaantalinschrijvingen</td>
				<td><input type="text" name="Maximumaantalinschrijvingen"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>

	<?php

	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		$name = $_POST['Boekingsnummer'];
		$email = $_POST['Titel'];
		$mobile = $_POST['Bestemming'];
        $mobile = $_POST['Omschrijving'];
        $mobile = $_POST['Begindatum'];
        $mobile = $_POST['Einddatum'];
        $mobile = $_POST['Maximumaantalinschrijvingen'];

		// include database connection file
		include_once("config.php");

		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO users(Boekingsnummer,Titel,Bestemming,Omschrijving,Begindatum,Einddatum,Maximumaantalinschrijvingen) VALUES('$Boekingsnummer','$Titel','$Bestemming','$Omschrijving','$Begindatum','$Einddatum','$Maximumaantalinschrijvingen')");

		// Show message when user added
		echo "User added successfully. <a href='Reistoevoeg.php'>View Users</a>";
	}
	?>
</body>
</html>