<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<body>
		<h1>Welcome</h1>
		<h3>
			<?php
				if(isset($_SESSION['s_username']) || (trim($_SESSION['s_username']) != '')) 
				{
					echo "Username: ";
					echo $_SESSION["s_username"];
					echo "<br/><br/>";
					echo "Full Name: ";
					echo $_SESSION["s_fullname"];
				}
				else 
				{
					header('Location:login.html');
				}
			?>
		</h3>
		<img src= "img/<?php echo $_SESSION["s_avatar"]; ?>" />
	</body>
</html>