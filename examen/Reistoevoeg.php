<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM Reistoevoeg ORDER BY id DESC");
?>

<html>
<head>
    <title>Homepage</title>
</head>

<body>
<a href="add.php">Add New User</a><br/><br/>

    <table width='80%' border=1>

    <tr>
        <th>Boekingsnummer</th> <th>Titel</th> <th>Bestemming</th> <th>Omschrijving</th> <th>Begindatum</th>  <th>Eindatum</th> <th>Maximumaantalinschrijvingen</th>
    </tr>
    <?php
    while($user_data = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$user_data['Boekingsnummer']."</td>";
        echo "<td>".$user_data['Titel']."</td>";
        echo "<td>".$user_data['Bestemming']."</td>";
        echo "<td>".$user_data['Omschrijving']."</td>";
        echo "<td>".$user_data['Begindatum']."</td>";
        echo "<td>".$user_data['Eindatum']."</td>";
        echo "<td>".$user_data['Maximumaantalinschrijvingen']."</td>";

        echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";
    }
    ?>
    </table>
</body>
</html>