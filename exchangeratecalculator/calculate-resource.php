<!-- calculate-resource.php -->
<?php

	//1.รับค่าจากหน้าที่แล้วมา โดยส่งค่ามาเป็น post
	// $thb = $_POST['thb'];
	// $type = $_POST['type'];

	// echo "จำนวนเงินที่กรอก ".$thb;
	// echo "<br>";
	// echo "สกุลเงิน".$type;
	// echo "<br>";
	// // echo "<br>";


	// if ($type == "usd"){
	// 	$result = $thb/31.2273;
	// }
	// elseif ($type == "jyp"){
	// 	$result = $thb/28.9814;
	// }
	// elseif ($type == "krw"){
	// 	$result = $thb * 0.0290;
	// }
	// elseif ($type == "gbp"){
	// 	$result = $thb/43.3292;
	// }
	// elseif ($type == "eur"){
	// 	$result = $thb/38.2737;
	// }
	// echo "result".$result;

	// require 'connect.php';
	// $sql = "INSERT INTO exch642_history(thb, calculated,currency) VALUES($thb	, $result, '$type')";
	// $sql_exe=$conn -> query($sql);
	// print($sql_exe);
	// $sql_exe = $conn -> query($sql);
	

	// //แบบ 2

	// if ($type == "usd"){
	// 	$rate = 31.2273; 
	// }
	// elseif ($type == "jyp"){
	// 	$rate = 28.9814;
	// }
	// elseif ($type == "krw"){
	// 	$rate = 0.0290;
	// }
	// elseif ($type == "gbp"){
	// 	$rate = 43.3292;
	// }
	// elseif ($type == "eur"){
	// 	$rate = 38.2737;
	// }
	// echo "Result = ".$thb*$rate;

	//แบบ 3
	// switch ($type) {
	// 	case 'usd':
	// 		$rate = 31.2273;
	// 		break;
	// 	case 'jyp':
	// 		$rate = 28.9814;
	// 		break;
	// 	case 'krw':
	// 		$rate = 0.0290;
	// 		break;
	// 	case 'gbp':
	// 		$rate = 43.3292;
	// 		break;
	// 	case 'eur':
	// 		$rate = 38.2737;
	// 		break;
	// 	default:
	// 		$rate = 0;
	// 		break;
	// }
	// echo "Result = ".$thb*$rate;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Resource</title>
	<script type="text/javascript" src="js/vue.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

	<div class="app">
	<div class="container">
	<div class="col-md-12">
		<div class="row text-center">
			<br><br>
			<div class="col-md-4 col-md-offset-4 well">
			<?php
				$thb = $_POST['thb'];
				$type = $_POST['type'];

				echo "<b> ".$thb." (THB)";
				echo "<br>";
				echo "Exchange to : ".$type;
				echo "<br></b>";

				if ($type == "usd"){
					$result = $thb/31.2273;
				}
				elseif ($type == "jyp"){
					$result = $thb/28.9814;
				}
				elseif ($type == "krw"){
					$result = $thb * 0.0290;
				}
				elseif ($type == "gbp"){
					$result = $thb/43.3292;
				}
				elseif ($type == "eur"){
					$result = $thb/38.2737;
				}
				echo "<h2>= ".$result." </h2>";

				require 'connect.php';
				$sql = "INSERT INTO exch642_history(thb, calculated,currency) VALUES($thb	, $result, '$type')";
				$sql_exe=$conn -> query($sql);
				//print($sql_exe);
			?><!-- end คำนวณ -->
			</div>
		</div><!-- end คำนวณ -->

		<br>

		<div class="row text-center"> <!-- row ผล -->

		<?php 
		     $sql = "SELECT * FROM exch642_history ORDER BY dateRecord DESC";
		     $sql_exe = $conn -> query($sql);
		?>

		  <table class="table table-striped table-hover">
		  		<thead>
				    <tr>
				     <th class="text-center" colspan="5">Exchange History</th>
				     <br>
				    </tr>
				    <tr>
				     <th>Money</th>
				     <th>Currency</th>
				     <th>Calculated</th>
				     <th>Date Time</th>
				     <th>Delete</th>
				    </tr>
		   		</thead>

		  <?php 
		   

		   while ($row = mysqli_fetch_assoc($sql_exe)) {
		         // $array['key/field name'];
		    echo "<tr>
		         <td>".$row['thb']."</td>
		      <td>"." exchage to ".$row['currency']."</td>
		      <td>".$row['calculated']."</td>
		      <td>".$row['dateRecord']."</td>";

		  ?>
		  <td><a class="btn btn-danger"  href="delete.php?id=<?php echo $row['recordID']?> &thb=<?php echo $row['thb'] ?>">Delete</a></td>
		  </tr>
		  <?php

		   }
		   $conn->close();
		  ?>
		  </table>



		</div><!-- row ผล -->

	</div>
	</div>
	</div>

</body>
</html>