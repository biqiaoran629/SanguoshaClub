<html>
<body>

<style>
table{
	border-collapse:collapse;
}
table, td, th {
	border: 2px solid;
	border-color:#3399cc;
}
td {
	padding-bottom:20px;
	padding-right:10px;
	padding-top:10px;
	padding-left:5px;	
}</style>

	<h3>Display Options</h3>
	<select id="adminselect" onchange="Javascript:sortTable()">
		<option>Sory by ....</option>	
		<option value ="1">Sort by name</option>  
		<option value ="2">Sort by email</option>  
		<option value ="3">Sort by faculty</option>  
		<option value ="4">Sort by registration date</option>  
	</select>  
	<br>
	<br>

<?php
	$myid = $_GET["id"];
	$user = 'root';
	$pass = '';
	$db = 'sanguoshaclub';
	
	$con = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");	
		
		if($myid==1){
		$sql = "SELECT * FROM members order by name";}
		if($myid==2){
		$sql = "SELECT * FROM members order by email";}
		if($myid==3){
		$sql = "SELECT * FROM members order by faculty";}
		if($myid==4){
		$sql = "SELECT * FROM members";}
		$result = $con->query($sql);
		if ($result->num_rows > 0) {
			echo '<table id="MemList"><tr> <td><h3>ID</h3></td> <td><h3>Name</h3></td> <td><h3>Email</h3></td> <td><h3>Faculty</h3></td> <td><h3>Timestamp</h3></td> <td><h3>Operation</h3></td></tr>';
			while($row = $result->fetch_assoc()) {
				echo '<tr> <td><h3>'.$row["ID"].'</h3></td>';
				echo '<td><h3>'.$row["name"].'</h3></td>';
				echo '<td><h3>'.$row["email"].'</h3></td>';
				echo '<td><h3>'.$row["faculty"].'</h3></td>';
				echo '<td><h3>'.$row["ts"].'</h3></td>';
				echo '<td><input type="button"  value = "Delete this row" onclick="Javascript:deleteMem('.$row["ID"].');"></a></td></tr>';
			}echo '</table>';		}
	 

	$con->close();
?>


</body>
</html>