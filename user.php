<?php
  	//database connection.
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "movie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "select ";

$conn->query($sql);

$conn->close();
}
}
?>
 <?php
$servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

?> 