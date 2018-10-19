<?PHP
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
$mail = $dot = "";
if(isset($_SESSION['asd'])){ $mail = $_SESSION['asd']; }
// DB
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "movie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "select Admin from user where Email = '$mail';";

$dot = mysqli_fetch_row($conn->query($sql));
$dot = $dot[0];
$conn->close();
if ($dot != 1){
	header("Location: http://localhost/movie/index.php");
	  }
?>
<?PHP
$dltidn = $dltidm = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$dltidn = $_POST["dltidn"];
	$dltidm = $_POST["dltidm"];

	
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "movie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if($dltidn != ""){
if($conn->query("DELETE FROM movienow WHERE id='$dltidn';"))
{echo "<p style='color:red'>that movie successfully deleted!</p>";}Else{echo "<p style='color:red'>an error occurred when deleting that movie!</p>";}
}
if($dltidm != ""){
if($conn->query("DELETE FROM movienext WHERE id='$dltidm';"))
{echo "<p style='color:red'>that comment successfully movie!</p>";}Else{echo "<p style='color:red'>an error occurred when deleting that movie!</p>";}
}
}
?>
<html>
<head>
</head>
<body>



<form action="deletemovie.php" method="post">
<h1>Delete Now Showing Movie</h1>
<h3>Enter movie ID which you want to delete:</h3><input type="text" name="dltidn" size="4"><br><br>
<input type="submit" value="DELETE NOW SHOWING MOVIE"><br><br>	
<h1>Delete Up Coming Movie</h1>
<h3>Enter movie ID which you want to delete:</h3><input type="text" name="dltidm" size="4"><br><br>
<input type="submit" value="DELETE UP COMING MOVIE"><br><br>
</form>
<br>
<br>
<br>
<br>
</body>
</html>
<?php 
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "movie";

// Create connection
echo "<h1 style='color:green;'>Now Showing Movies</h1>";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = 'select id,name from movienow;';
$result = $conn->query($sql);
while ($data = mysqli_fetch_assoc($result)) {
		echo '<p style="color:red;">MOVIE ID : ' . $data['id'] . '</p>';
        echo '<h2 id="title">' . $data['name'] . '</h2><br><br>';
}
echo "<h1 style='color:green;'>Up Coming Movies</h1>";
$sql = 'select id,name from movienext;';
$result = $conn->query($sql);
while ($data = mysqli_fetch_assoc($result)) {
		echo '<p style="color:red;">MOVIE ID : ' . $data['id'] . '</p>';
        echo '<h2 id="title">' . $data['name'] . '</h2>';
}
?>