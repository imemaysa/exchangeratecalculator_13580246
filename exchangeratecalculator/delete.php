<!-- delete.php -->
<!DOCTYPE html>
<html>
<head>
	<title>Delete Status</title>
	<script type="text/javascript" src="js/vue.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="app">
		<div class="container">
			<br><br>
			<div class="well">
			<?php
				require 'connect.php';
				$id = $_REQUEST['id'];
				$thb = $_REQUEST['thb'];
				$sql = "DELETE FROM `exch642_history` WHERE `exch642_history`.`recordID` = 	'$id'";
				$sql_exe = $conn -> query($sql);
				if($sql_exe) {
					echo "<h3>Delete Complet</h3>"."<br>"."YOUR ID = ".$id."<br>"."THB = ".$thb;
					header("Refresh:3; url=index.html",true,60);
				}else{
					echo "Delete Failed".$sql;
				}
			?>
			</div>
			
		</div>
	</div>

</body>
</html>