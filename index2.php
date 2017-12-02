<!--

Link do bilbioteki http://simplehtmldom.sourceforge.net/
-->

<!DOCTYPE html>
<html>
<head>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<meta charset="UTF-8">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 105%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

table.extra {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 50%;
}

td.extra, th.extra {
    border: 1px solid #c2e09f;
    text-align: left;
    padding: 8px;
}

tr.extra:nth-child(even) {
    background-color: #c2e09f;
}
body{
	background-image: "1.jpg";
    opacity:0.95;
}
div.elo{
width:800px;
max-width: 400px;
width: 100%;
margin:0 auto;
margin-top: 20px;
background: #F9F9F9;
padding: 25px;
position: relative;
box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
</style>
<body>
<!-- <center>
<button type="button" disabled>E</button>
<button type="button" disabled>T</button>
<button type="button" disabled>L</button>
<p style="color: grey; font-style: italic;"> np. 38939904 38939904 39684857</p>
</center>
</form> -->
<div class="container">
	<nav class="navbar navbar-default">	
	    <ul class="nav navbar-nav">
	      <li><a href="index2.php">Home</a></li>
		      <li><a href="https://github.com/toxwow/Ekipa-z-Trolejbusa"> Repo </a></li>	
	    </ul>
	    </nav>
	  </div>

<div class="container elo">
	<div class="col-sm-12">
		<form action="index2.php?show.php" method="post">
    		<div class="form-group">
      			<input type="text" class="form-control" id="id_product" pattern="\d*" placeholder="Podaj id produktu" name="id_product" required>
    		</div>
    		<center>
    		<button type="submit" class="btn btn-secondary disabled">E</button>
    		<button type="submit" class="btn btn-success">T</button>
    		<button type="submit" class="btn btn-secondary disabled">L</button>
  			</center>
  		</form>
</div>

	</div>

<?php 
$book="./show.php";
include_once($book);


?>
</body>
</html>