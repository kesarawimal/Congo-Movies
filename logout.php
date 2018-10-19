<?php
session_start();
session_destroy();
header("Location: http://localhost/movie/index.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Strict//EN">
<html>
<head>
  <meta charset="utf-8">
  <title>CONGO MOVIES</title>
  <link rel="stylesheet" type="text/css" href="css/movies.css">
  <script src="js/jquery.slides.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div id="container">
	<div id="header">
		 <?php include 'header.php'; ?>
	</div>
	<div id="content">
		<h3>Your are logout from your account!<h3>
	</div>
	<div id="footer">
		 <?php include 'footer.php'; ?>
	</div>
</div>
</body>
</html>