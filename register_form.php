<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<?php
		$user = 'root';
		$pass = '0723';
		$db = 'sanguoshaclub';
	
		$con = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

		$name = $_GET["name"];
		$email = $_GET["email"];
		$faculty = $_GET["faculty"];

		$sql = "SELECT * FROM member WHERE email = '$email'";
		$result = $con->query($sql);
		if ($result->num_rows > 0) {
			echo "Email address you entered has already been registered please use another email !!";
		} else {
			if($faculty !=null){
				$insert = "INSERT INTO member (name, email, faculty) 
				VALUES('$name', '$email', '$faculty')";
			}else{
				$insert = "INSERT INTO member (name, email) 
				VALUES('$name', '$email')";
			}
			if($con->query($insert) === TRUE)	{
        		echo '<script>window.location = "joinus.html"</script>';
    		} else {
    			echo "Fail";
    		}
		}
	?>

</body>

</html>