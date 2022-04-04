<html>
<head>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<?php //include 'men.inc'  ?>
<?php
echo "
<main>
<div class='topnav'>
    <a href='Home.html'>Home</a></li>
    <a href='signup.htm'>Sign up</a></li>
    <a href='contact.htm'>Contact Us </a></li>
</div>
<h1>Students Marks </h1>
<form action='Student_Marks.php' method='POST'>
     <p>
		<select name='selection'>
			<option>Select an option</option>
			<option value='all'>All Students</option>
		</select>
	</p>
	<p><input type='submit' name='submit' value='Show Marks'></p>
</form><br>
";
$dsn = "mysql:host=localhost;dbname=college";
$username = "root";
$password = "secret";
try{
	$connect = new PDO($dsn, $username, $password);
	echo "<center>Connection successful.";
}catch(PDOException $ex){
	echo "Error Occured: " . $ex->getMessage();
}
if(isset($_POST["submit"])){
	if($_POST["selection"] == "all"){
		$rows = $connect->query("SELECT * FROM student;");
	}else{
		echo "<b>Null Input option Selected!</b>";
	}
	// display the rows of data 
	echo "
		<table>
			<tr>
				<th>Firstname &nbsp;</th>
				<th>Surname &nbsp;</th>
				<th>Algebra &nbsp;</th>
				<th>Calculus &nbsp;</th>
				<th>Programming &nbsp;</th>
				<th>Databases</th>
			</tr>";

		foreach($rows as $row){
			$Firstname  = $row["Firstname"];
			$Surname = $row["Surname"];
			$Algebra = $row["Algebra"];
			$Calculus = $row["Calculus"];
			$Programming = $row["Programming"];
			$Databasess = $row["Databasess"];
			echo "
			<tr>
		          <td>$Firstname &nbsp;</td>
			      <td>&nbsp;$Surname &nbsp;</td>
			      <td>&nbsp;&nbsp;$Algebra&nbsp;</td>
			      <td>&nbsp;&nbsp;$Calculus&nbsp;</td>
				  <td>&nbsp;&nbsp;$Programming&nbsp;</td>
				  <td>&nbsp;&nbsp;$Databasess</td>
		      </tr>";
		}
	echo "</table>
</main>";
}

?>
</body>
  <!--iframe src="task2.txt" height="400" width="1200">   Your browser does not support iframes. </iframe -->
</html