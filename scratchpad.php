<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Demo</title>
  <!-- <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />  -->
</head>
<body> 

	<!-- <form action='' method='post'>
		<p><label>Country:</label><input type='text' name='country' value='' class='auto'></p>
	</form> -->

	<?php
	include 'app-class/Autoloader.php';
		// $val = 'cheese';
	
		// switch($val){
		// 	case 'cheese':
		// 		echo "found " . $val;
		// 	break;
		// }

		$ven = new Venue(10001, 'Venue 1', 60001, 'Type1', 30001, 1, 25, 20001);
		// $plan = new Seat(40001);

		// $db = new DataAccess();

		// $a1 = 40001;
		
		// $stmt = $db->returnQuery('select * from Seating where seating_plan_id = ' . $a1);

		// $seats = $stmt->fetchAll(PDO::FETCH_ASSOC);

		// foreach($seats as $seat){
			
		// 	echo $seat['seating_id']; 
		// 	echo'</br>';
		// 	echo $seat['seat_name']; 
		// 	echo'</br>';
		// 	echo $seat['rating'];
		// 	echo'</br>';
		// 	echo $seat['image_path'];
		// 	echo'</br>';
		// }

		echo $ven->getVenueId();
		echo '</br>';
		echo $ven->getPostcode();
		echo '</br>';
		$seating = $ven->getSeatingProf();
		echo $seating->getSeatingProfId();
		echo '</br>';
		$seatPlan = $seating->getSeatingPlan();
		var_dump($seatPlan);

		//var_dump($ven);
		//var_dump($plan);
	?>

<!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script> -->
<!-- <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>	 -->
<script type="text/javascript">
$(function() {
	
	// //autocomplete
	// $(".auto").autocomplete({
	// 	source: "./services/venue-rest.php",
	// 	minLength: 1
	// });				
});
</script>
</body>
</html>