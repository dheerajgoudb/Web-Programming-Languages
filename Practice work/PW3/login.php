<?php
	session_start();
	$conn = new mysqli("localhost", "root", "root", "pw3");

	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$username=$_POST["username"];
		$password=$_POST["password"];
	}

	if ( $username == "" || $password == "") 
	{
		header("Location:login.html"); 
	} 
	else
	{	
		$sql = "SELECT username,fullname,avatar FROM users WHERE username='$username' AND password='$password'"; 
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($query);

		if (mysqli_num_rows($query) > 0)
		{
			$_SESSION["s_username"]=$row["username"];
			$_SESSION["s_fullname"]=$row["fullname"];
			$_SESSION["s_avatar"]=$row["avatar"];
			header("Location:welcome.php");
		}
		else
		{
			header("Location:login.html");
			  
		}
	}
	mysqli_close($conn);
?>