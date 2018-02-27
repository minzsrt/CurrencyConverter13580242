<?php

	$id = $_REQUEST['id'];

	$sql = "DELETE FROM exch242_history WHERE recordID = $id";
	require 'connect.php';

	$sql_exe = $conn -> query($sql);

	if($sql_exe) {
		include_once 'index.html';
	}else{
		echo "Delete failed";
	}

?>