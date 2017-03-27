<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "hw3";
	//Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn)
	{
		echo "Database Connection Error";
	}
	$year = $_GET['year'];
	$gender = $_GET['gender'];
	if (!empty($year) && !empty($gender))
	{
		$sql = "SELECT name, ranking FROM babynames WHERE year = '$year' AND gender = '$gender'";
		$query = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($query) > 0)
		{
			echo "<table border = '1'><tr><th>Names</th><th>Ranking</th></tr>";
			while ($row_users = mysqli_fetch_assoc($query))
			{
				echo "<tr>";
				echo "<td style = 'text-align : center;'>" . $row_users['name'] . "</td>";
				echo "<td style = 'text-align : center;'>" . $row_users['ranking'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
	}
	else if (empty($year) && !empty($gender))
	{
		$sql = "SELECT name, ranking, year FROM babynames WHERE gender = '$gender'";
		$query = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($query) > 0)
		{
			echo "<table border = '1'><tr><th>Names</th><th>Ranking</th><th>Year</th></tr>";
			while ($row_users = mysqli_fetch_assoc($query))
			{
				echo "<tr>";
				echo "<td style = 'text-align : center;'>" . $row_users['name'] . "</td>";
				echo "<td style = 'text-align : center;'>" . $row_users['ranking'] . "</td>";
				echo "<td style = 'text-align : center;'>" . $row_users['year'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
	}
	else if (!empty($year) && empty($gender))
	{
		$sql = "SELECT name, ranking, gender FROM babynames WHERE year = '$year'";
		$query = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($query) > 0)
		{
			echo "<table border = '1'><tr><th>Names</th><th>Ranking</th><th>Gender</th></tr>";
			while ($row_users = mysqli_fetch_assoc($query))
			{
				echo "<tr>";
				echo "<td style = 'text-align : center;'>" . $row_users['name'] . "</td>";
				echo "<td style = 'text-align : center;'>" . $row_users['ranking'] . "</td>";
				echo "<td style = 'text-align : center;'>" . $row_users['gender'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
	}
	else
	{
		echo "Any one list must be selected to see the Result";
	}
	$conn -> close();
?>