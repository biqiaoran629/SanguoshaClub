<html>
<body>

<?php
	$myid = $_GET["id"];
	$user = 'root';
	$pass = '0723';
	$db = 'sanguoshaclub';
	
	$con = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");
	
	$sql = "delete from members where ID='$myid'";
	if ($con->query($sql) === TRUE) {
		echo "Record deleted successfully";
	} else {
		echo "Error deleting record: " . $con->error;
	}

	$con->close();
?>


</body>
</html>