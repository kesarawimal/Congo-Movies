<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Strict//EN">
<html>
<head>
  <meta charset="utf-8">
  <title>CONGO MOVIES</title>
  <link rel="stylesheet" type="text/css" href="css/tickets.css">
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
	</div><br><br>
	<div id="content">
	<div id="wrap">
	<p id="step">STEP 1 - Make Your Selection</p><hr id="hr">
		  <form target="#"  method="post" id="form">
    <div class="form-group">
     <br><br> <select class="form-control" id="sel1" required="">
        <option selected="selected">Choose Your Favorite Movie</option>
        <?php 
		$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "movie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

  if($result = $conn->query("select name,image,link,imdb,category from movienow order by ID desc;")){
    if($count = $result->num_rows){
      while($row = $result->fetch_object()){
?>
       <option><?php echo $row->name; ?></option> 
<?php          
      }
    $result->free();
    }
  }
?>
      </select><br><p id="movie"></p><br><br>
	  <select class="form-control" id="sel2" required="">
        <option selected="selected">Select Your Movie Time</option>
        <option>10.30 AM</option>
        <option>02.30 PM</option>
        <option>6.30 PM</option>
      </select><br><p id="movie"></p><br><br>
	  <select class="form-control" id="datemenu1" required="">
        <option selected="selected">Choose Your Date</option>
      </select><br><p id="movie"></p><br><br>
	  	<select class="form-control" id="sel3" required="">
        <option selected="selected">Select Your Seats Category</option>
        <option>ODC - Rs.500.00</option>
        <option>Balcony - Rs.800.00</option>
        <option>Box - Rs.1000.00</option>
      </select><br><p id="movie"></p><br><br>
	  <select class="form-control" id="sel4" required="">
        <option selected="selected">Number of Tickets</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
      </select><br><p id="movie"></p><br><br>
    </div>
	<div id="button"> <button type="button" class="myButton" onclick="p();">STEP 2 >></button></div>
	</form>
	</div>
	
	
	
	
	
	
	
	
	

	
	
	
	</div>
	<script>
            function formatDate(date) {
                var d = new Date(date),
                        month = '' + (d.getMonth() + 1),
                        day = '' + d.getDate(),
                        year = d.getFullYear();

                if (month.length < 2)
                    month = '0' + month;
                if (day.length < 2)
                    day = '0' + day;

                return [year, month, day].join('-');
            }

            var options = "";
            var curr = new Date;
            var first = curr.getDate()
            var firstday = (new Date(curr.setDate(first))).toString();
            for (var i = 0; i < 7; i++) {
                var next = new Date(curr.getTime());
                next.setDate(first + i);
                options += '<option>' + formatDate((next.toString())) + '</option>';
            }
			$("#datemenu1").append(options);
			
			
			var text,me,te,ce,ne ;
			function p(){
			var e = document.getElementById("datemenu1");
			 text = e.options[e.selectedIndex].text;
			var m = document.getElementById("sel1");
			 me = m.options[m.selectedIndex].text;
			var t = document.getElementById("sel2");
			 te = t.options[t.selectedIndex].text;
			var c = document.getElementById("sel3");
			 ce = c.options[c.selectedIndex].text;
			var n = document.getElementById("sel4");
			 ne = n.options[n.selectedIndex].text;
			
			
			var html = ' <div id="wrap2"> <p id="step">STEP 2 - Pick Your Seats</p><hr id="hr"> <form target="#" method="post" id="form2"> <div id="ck-button"> <table width="100%" class="box"> <caption>Box - Rs.1000.00</caption> <tr> <td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>A1</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>A2</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>A3</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>A4</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>A5</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>A6</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>A7</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>A8</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>A9</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>A10</span> </label></td> </tr> </table><br><br> <table width="100%" class="balcony"> <caption>Balcony - Rs.800.00</caption> <tr> <td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>B1</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>B2</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>B3</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>B4</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>B5</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>B6</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>B7</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>B8</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>B9</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>B10</span> </label></td> </tr><tr> <td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>C1</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>C2</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>C3</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>C4</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>C5</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>C6</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>C7</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>C8</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>C9</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>C10</span> </label></td> </tr><tr> <td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>D1</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>D2</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>D3</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>D4</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>D5</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>D6</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>D7</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>D8</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>D9</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>D10</span> </label></td> </tr> </table><br><br> <table width="100%" class="odc"> <caption>ODC - Rs.500.00</caption> <tr> <td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>E1</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>E2</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>E3</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>E4</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>E5</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>E6</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>E7</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>E8</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>E9</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>E10</span> </label></td> </tr><tr> <td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>F1</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>F2</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>F3</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>F4</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>F5</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>F6</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>F7</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>F8</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>F9</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>F10</span> </label></td> </tr><tr> <td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>G1</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>G2</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>G3</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>G4</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>G5</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>G6</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>G7</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>G8</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>G9</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>G10</span> </label></td> </tr><tr> <td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>H1</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>H2</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>H3</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>H4</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>H5</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>H6</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>H7</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>H8</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>H9</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>H10</span> </label></td> </tr><tr> <td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>I1</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>I2</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>I3</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>I4</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>I5</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>I6</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>I7</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>I8</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>I9</span> </label></td><td><label> <input type="checkbox" value="1" style="position: relative;" hidden><span>I10</span> </label></td> </tr> </table><br><br> <p id="screen">SCREEN IS HERE</p> </div> <div id="button"> <button type="button" class="myButton" onclick="u();">STEP 3 >></button></div> </form> </div>';
			
			document.getElementById("content").innerHTML = html;
			}
			var sum;
			function u() {
			var html = ' <div id="wrap"> <p id="step">STEP 3 - Pay Your Bill</p><hr id="hr"> <form target="#" method="post" id="form"> <div class="form-group"> <select class="form-control" id="sel4" required=""> <option selected="selected">Select Your Payment Method</option> <option>Credit Card</option> <option>Debit Card</option> <option>PayPal</option> <option>Easy Cash</option> </select><br><p id="movie"></p><br><br> </div> <div id="bill"><br><br> <p id="names">Movie Name :</p><p id="name" class="next"></p><br><br> <p id="names">Movie Time :</p><p id="time" class="next"></p><br><br> <p id="names">Date :</p><p id="date" class="next"></p><br><br> <p id="names">Seats Category :</p><p id="category" class="next"></p><br><br> <p id="names">No of Tickets :</p><p id="num" class="next"></p><br><br> <p id="amount">Total Amount :</p><p class="next">Rs.<p id="sum"></p></p> </div><br><br><br> <div id="button"> <button type="button" class="myButton" onclick="w();">PAY NOW</button></div> </form> </div>';
			
			document.getElementById("content").innerHTML = html;
			
			document.getElementById("name").innerHTML = me;
			document.getElementById("time").innerHTML = te;
			document.getElementById("date").innerHTML = text;
			document.getElementById("category").innerHTML = ce;
			document.getElementById("num").innerHTML = ne;
			
			if (ce == "ODC - Rs.500.00") {
				sum = 500*ne;
			}
			else if (ce == "Balcony - Rs.800.00") {
				sum = 800*ne;
			}
			else {
				sum = 1000*ne;
			}
			document.getElementById("sum").innerHTML = sum;
			}
			function w() {
				location.href = 'index.php';
			}
			
        </script>
	<div id="footer">
		 <?php include 'footer.php'; ?>
	</div>
</div>
</body>
</html>