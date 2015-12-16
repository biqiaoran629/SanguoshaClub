<!DOCTYPE html>
<html>

<head>

</head>
<style>
table{
	border-collapse:collapse;
}
table, td, th {
	border: 2px solid;
	border-color:#3399cc;
}
td {
	padding-bottom:10px;
	padding-right:10px;
	padding-top:10px;
	padding-left:5px;	
}</style>

<body>
	<?php
		$user = 'root';
		$pass = '0723';
		$db = 'sanguoshaclub';
	
		$con = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

		$sql = "SELECT * FROM member";
		$result = $con->query($sql);
		if ($result->num_rows > 0) {
			echo '<table><tr> <td><h3>Name</h3></td> <td><h3>Email</h3></td> <td><h3>Faculty</h3></td>';
			while($row = $result->fetch_assoc()) {
				echo '<tr> <td><h3>'.$row["name"].'</h3></td> <td><h3>'.$row["email"].'</h3></td> <td><h3>'.$row["faculty"].'</h3></td></tr>';
			}echo '</table>';
		} else {
			echo "0 result";
		}
	?>

</body>

</html>