<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Strict//EN">
<html>
<head>
  <meta charset="utf-8">
  <title>CONGO MOVIES</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
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
		<div id="half-l">
			<p id="upper">Now Showing</p>
	<!-- test -->
		<?php 
		$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "movie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

  if($result = $conn->query("select Name, image from movienow order by ID desc;")){
    if($count = $result->num_rows){
      while($row = $result->fetch_object()){
?>
        <div class = "jumbotron">
          <p id="m-name"> <a href="http://localhost/movie/movies.php#now"> <?php echo $row->Name; ?></a><br></p>
          <a href="http://localhost/movie/movies.php#now"><img id="m-img" src="<?php echo $row->image; ?>" height="400px" width="300px" href="http://localhost/movie/movies.php"/><a/><br><br>
		  <a href="http://localhost/movie/tickets.php#content" class="myButton" style=" text-decoration: none; ">GET TICKETS</a>
        </div>
<?php          
      }
    $result->free();
    }
  }
?>
		</div>
		<div id="half-r">
			<p id="upper">Up Coming Movies</p>
			<!-- test -->
		<?php 
		$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "movie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

  if($result = $conn->query("select Name, image from movienext order by ID desc;")){
    if($count = $result->num_rows){
      while($row = $result->fetch_object()){
?>
        <div class = "jumbotron">
          <p id="m-name"><a href="http://localhost/movie/movies.php#next"><?php echo $row->Name; ?><br><a/></p>
          <a href="http://localhost/movie/movies.php#next"><img id="m-img" src="<?php echo $row->image; ?>" height="400px" width="300px"/></a><br><br>
		  <a href="http://localhost/movie/tickets.php#content" class="myButton" style=" text-decoration: none; ">GET TICKETS</a>
        </div>
<?php          
      }
    $result->free();
    }
  }
?>
		</div>
		
		<script>
			//$("#half-r").height($("#half-l").height());
		</script>
		
	</div>
	<div id="footer">
		 <?php include 'footer.php'; ?>
	</div>
</div>
</body>
</html>