<?php

	
		$DB_SERVER = 'localhost';
		$DB_USER_READER = 'u13580242';
		$DB_USER_PASS = '60AnWJrRTC';
		$DB_NAME = 'db13580242';
	
	
	//คำสั่งที่ต่อกับฐานข้อมูล
	$conn = new mysqli($DB_SERVER,$DB_USER_READER,$DB_USER_PASS,$DB_NAME);

	//ตรวจสอบ
	if ($conn -> connect_error) {
		die("connection failed ".$conn -> connect_error);
	}

	mysqli_set_charset($conn, "utf8");
	date_default_timezone_set("Asia/Bangkok");

?>
