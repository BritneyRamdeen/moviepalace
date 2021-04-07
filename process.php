<?php
	//connect to the server and select database
	$con = mysqli_connect("localhost", "root", "", "login");
	//mysql_select_db("login");
	
	// get values pass from form in login.php file
	$username = $_POST['uname'];
	$password = $_POST['psw'];
	
	// to prevent mysql injection
	$username = stripcslashes($username);
	$password = stripcslashes($password);
	$username = mysqli_real_escape_string($con, $username);
	$password = mysqli_real_escape_string($con, $password);
	
	//query the database for user_error
	$result = mysqli_query($con, "select * from users where username = '$username' and password = '$password'")
				or die("failed to query database " .mysql_error());
	$row = mysqli_fetch_array($result);
	if ($row['username'] == $username && $row ['password'] == $password){
		header ("Location:tbooking.html");
	} else {
		echo "Failed to login!";
	}
?>