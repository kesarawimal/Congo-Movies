<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
$comment = $errcomment = $pid = $email = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$comment = htmlspecialchars($_POST["comment"]);
	$comment = trim($comment);
	$comment = stripslashes($comment);
	
	$pid = $_POST["pid"];
	if (isset($_SESSION['asd']) == ""){$errcomment = "To post your comments you have to login first! <a href='http://localhost/movie/login.php'>HERE >> LOGIN</a>";}
	else{ $email = $_SESSION['asd']; }
	if (empty($comment)) {
    $errcomment = "Valid content is required to submit your comment";
  }
  if (empty($errcomment)){
	 	  //feed data into database
	  
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "movie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "insert into comment (body,email,postid)
values ('$comment','$email','$pid');";

$conn->query($sql);

$conn->close(); 
	
		header("Location: http://localhost/movie/blog.php");
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Strict//EN">
<html>
<head>
  <meta charset="utf-8">
  <title>CONGO MOVIES</title>
  <link rel="stylesheet" type="text/css" href="css/blog.css">
  <script src="js/jquery.slides.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div id="container">
	<div id="header">
		 <?php include 'header.php'; ?>
	</div>
	<div id="content">
				<?php 
		$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "movie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = 'SELECT p.id,p.title,p.content,p.date,c.body,c.cdate,c.email,c.postid FROM post p left JOIN comment c ON p.id = c.postid ORDER BY p.id DESC, c.postid DESC';
$result = $conn->query($sql);
$previous_post = 0;
while ($data = mysqli_fetch_assoc($result)) {
    if ($previous_post != $data['id']) {
        echo '<h1 id="title">' . $data['title'] . '</h1>';
        echo '<p id="date">By ADMIN | On ' . $data['date'] . '</p>';
		echo '<h3 id="contents">' . $data['content'] . '</h3>';
        $previous_post = $data['id'];
		
			echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
		<br><br><p id="text">Enter Your Comment Below : </p><br><br><textarea name="comment" id="comment" rows="6"></textarea><br><br>
						<input type="hidden" value="'.$data['id'].'" name="pid">
		<p id="errcomment">'.$errcomment.'</p><br>
		<input type="submit" value="POST" id="submit">	
			</form>' ;
    }
    echo '<p id="email">' . $data['email'] . ' said : </p>';
    echo '<p id="cdate">On ' . $data['cdate'] . '</p>';
    echo '<br><p id="body">' . $data['body'] . '</p><br>';
	
}
?>

		


	</div>
	<div id="footer">
		 <?php include 'footer.php'; ?>
	</div>
</div>
</body>
</html>