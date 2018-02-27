<?php
		//($_SERVER['HTTP_HOST']=='localhost')
		$DB_SERVER = 'localhost';
		$DB_USER_READER = 'u13580246';
		$DB_PASS_READER = 'NQtn95tVHX';
		$DB_NAME = 'db13580246';

		// echo "localhost";
	// }else{
	// 	//บน server ที่เป็น imsu.co
	// 	$DB_SERVER = 'localhost';
	// 	$DB_USER_READER = 'u13580246';
	// 	$DB_PASS_READER = 'NQtn95tVHX';
	// 	$DB_NAME = 'db642_exchangerate';
	// }

	$conn = new mysqli($DB_SERVER,$DB_USER_READER,$DB_PASS_READER,$DB_NAME);
	//ตรวจสอบว่าต่อสำเร็จหรือไม่

	if (!$conn) {
		die("connection failed".mysqli_connect_error());
	}
	mysqli_set_charset($conn,"utf8");
?>