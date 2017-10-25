<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Demo</title>
  <!-- <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />  -->
  <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
	<script   src="https://code.jquery.com/jquery-3.2.1.min.js"   
	integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   
	crossorigin="anonymous"></script>
	<script src="semantic/dist/semantic.min.js"></script>
</head>
<body> 

	<!-- <form action='' method='post'>
		<p><label>Country:</label><input type='text' name='country' value='' class='auto'></p>
	</form> -->

	<?php session_start();
	include 'app-class/Autoloader.php';
	
	$seatPlan->planid = 40001;
	$seatPlan->seatid = 50003;
	$seatPlan->venueid = 'Venue 1';

	$_SESSION['seatplan'] = json_encode($seatPlan);

	var_dump($_SESSION['seatplan']);

	

	// $seatingPlan = new SeatingPlan(40001);

	//  $seats = $seatingPlan->getSeating();

	//  $temp = array_keys($seats);

	//  $table = '<table>';
	//  $i = 0;
	//  foreach($seats as $key => $seat){
	// 	 if($i == 0){
	// 		 $row = substr($seat->getSeatName(),0,1);
	// 		 echo $row;
	// 	 }

	// 	 if(strcmp(substr($seat->getSeatName(),0,1), $row) == 0){
	// 		 if($i == 0){
	// 			 $table .= '<tr><td><i class="vertically flipped bordered big archive icon" onclick="seatViewChng(this)" id="' .$seat->getSeatingId() . '"></i></td>'; 
	// 			 $i++;
	// 		 } else if($i > 0){
	// 			 $table .= '<td><i class="vertically flipped bordered big archive icon" onclick="seatViewChng(this)" id="' .$seat->getSeatingId() . '"></i></td>';
	// 			 $i++;
	// 		 }
	// 	 } else {
	// 		 if($i > 0){
	// 			 $table .= '</tr><tr><td><i class="vertically flipped bordered big archive icon" onclick="seatViewChng(this)" id="' .$seat->getSeatingId() . '"></i></td>';
	// 			 $i = 1;
	// 			 $row = substr($seat->getSeatName(),0,1);
	// 			 echo "</br>" . $row;
	// 		 }
	// 	 }
		 
	//  }

	//  $table .= '</tr><table>';

	//  echo $table;

	//echo strcmp('A1', 'B3');

		// $btns = '<div class="ui buttons">';
		// for($i=0; $i<= 5; $i++){
		// 	$btns .= '<button class="ui button" onclick="test(this)" id="btn'. $i .'">'. $i .'</button>';
		// }
		// $btns .= '</div>';

		
	?>

<!-- <div class="ui tiny modal" id="signInMdl">
		<i class="close icon"></i>
		<div class="header">
				Test
		</div>
		<div class="content">
				<p id="res"></p>
		</div>
</div> -->
	
	<script>
		// function test(e){

		// 	$('#res').text(e.id);
		// 	$('#signInMdl').modal(
		// 			'show'
		// 	);
		// }
	</script>

			<img class="ui fluid image" scr="./assets/image/test/screen-1/50001.jpg">
	</br>

<div class="ui search">
  <div class="ui icon input">
    <input class="prompt" type="text" placeholder="Search countries...">
    <i class="search icon"></i>
  </div>
  <div class="results"></div>
</div>

<!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script> -->
<!-- <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>	 -->
<script type="text/javascript">
var content = [
    {title: 'venue 1'},
    {title: 'venue 2'},
    {title: 'venue 3'},
    {title: 'venue 4'},
    {title: 'venue 5'},
    {title: 'venue 6'},
    {title: 'venue 7'},
]

$('.ui.search')
  .search({
    source: content
  })
;
</script>
</body>
</html>