<?php

	$thb = $_GET['thb'];
	$typecal = $_GET['typecal'];
	$result;

	if ($typecal == "US") {
		$typecal = "USD";
		$result = $thb/31.2273;
	}elseif ($typecal == "JP") {
		$typecal = "JPY";
		$result = $thb/28.9814;
	}elseif ($typecal == "KR") {
		$typecal = "KRW";
		$result = $thb/0.0293;
	}elseif ($typecal == "GB") {
		$typecal = "GBP";
		$result = $thb/43.3292;
	}elseif ($typecal == "EU") {
		$typecal = "EUR";
		$result = $thb/38.2737;
	}

	require 'connect.php';

	$sql = "INSERT INTO exch242_history(thb,calculated,currency) VALUES( $thb,$result,'$typecal')";

	$sql_exe = $conn -> query($sql);

?>


<!DOCTYPE html>
<html>
<head>
	<title>Currency Converter - Result</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
	<style type="text/css">
		.maginct{
			margin: 0px auto;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <a class="navbar-brand" href="index.html">Currency Converter</a>
		 
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav">
		      <li class="nav-item active">
		        <a class="nav-link text-info" href="index.html">Home</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="history.php">History</a>
		      </li>
		    </ul>
		  </div>
	</nav>

	<br>

	<div class="col-md-12 text-center">
		
		<div class="card maginct bg-dark text-white" style="width: 40rem;">
			<div class="card-header bg-info text-light">
		    	<h3>Currency Converter Result</h3>
		  	</div>
		  <div class="card-body">
		    <h6><?php echo number_format( $thb, 2 ) ?> THB</h6>
		    <span class="text-info"><i class="fas fa-arrow-circle-down"></i></span>
		    <br>
			<h3><?php echo number_format( $result , 2 )." ".$typecal ?></h3>
			<br>
		    <a href="index.html" class="btn btn-primary">Back to calculate</a>
		  </div>
		</div>

		<br>

		<div class="col-md-8 maginct">

			<h3>History</h3>
			<br>

			<?php

			$sql = "SELECT * FROM exch242_history ORDER BY dateRecord DESC";

			$sql_exe = $conn -> query($sql);

			?>
				<table class="table table-striped table-dark text-left">
						<thead class="bg-info text-white">
							<th>THB</th>
							<th>Calculated</th>
							<th>Datetime</th>
							<th>Delete</th>
						</thead>
						<tbody>
						<?php
						while($row = mysqli_fetch_assoc($sql_exe)) {
						
							
							echo "<tr><td>".number_format( $row['thb'], 2 )." THB</td>"
							."<td>".number_format( $row['calculated'], 2 )." ".$row['currency']."</td>"
							."<td>".$row['dateRecord']."</td>"
							."<td>"."<a class='btn btn-outline-danger' href='delete.php?id=".$row['recordID']."'><i class='fas fa-trash'></i> DETELE</a>"."</td></tr>";

						} ?>
						</tbody>

						
				</table>
		</div>

	</div>

</body>
</html>