<html>
<body>

<?php
	$myid = $_GET["id"];

	$user = 'root';
	$pass = '';
	$db = 'sanguoshaclub';
	
	$con = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");
	
	mysql_select_db("my_db", $con);

	mysql_query("DELETE FROM members WHERE ID='$myid'");

	mysql_close($con);
?>


</body>
</html>