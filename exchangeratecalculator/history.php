<!DOCTYPE html>
<html>
<head>
	<title>Currency Converter - History</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
	<style type="text/css">
		.maginct{
			margin: 20px auto;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <a class="navbar-brand" href="index.html">Currency Converter</a>
		 
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav">
		      <li class="nav-item ">
		        <a class="nav-link" href="index.html">Home</a>
		      </li>
		      <li class="nav-item active">
		        <a class="nav-link text-info" href="history.php">History</a>
		      </li>
		    </ul>
		  </div>
	</nav>


		<div class="col-md-8 maginct text-center">

			<h3>History</h3>
			<br>
			<?php

			require 'connect.php';

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
						
							
							echo "<tr><td>".$row['thb']." THB</td>"
							."<td>".$row['calculated']." ".$row['currency']."</td>"
							."<td>".$row['dateRecord']."</td>"
							."<td>"."<a class='btn btn-outline-danger' href='delete.php?id=".$row['recordID']."'><i class='fas fa-trash'></i> DETELE</a>"."</td></tr>";

						} ?>
						</tbody>

						
				</table>
		</div>


</body>
</html>