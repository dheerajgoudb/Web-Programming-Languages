<?php
$conn = mysqli_connect("localhost", "root", "root", "pw5");
if (!$conn)
{
	die("Connection Failed: " . mysqli_connect_error());
}
else
{
	$query = "SELECT title, year, price, category FROM book";
	$result = mysqli_query($conn, $query);
	
	if (!$result)
	{
		echo "No Data Found";
		exit();
	}
	else
	{
		$bookarray = array();
		while($row = mysqli_fetch_assoc($result))
		{
			$bookarray[] = $row;
		}
		echo json_encode($bookarray);
	}
}
mysqli_close($conn);
?>