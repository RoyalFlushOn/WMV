<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Demo</title>
  <!-- <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />  -->
  <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
        crossorigin="anonymous"></script>
        <script src="semantic/dist/semantic.min.js"></script>
</head>
<body> 

	<!-- <form action='' method='post'>
		<p><label>Country:</label><input type='text' name='country' value='' class='auto'></p>
	</form> -->

	<?php
	include 'app-class/Autoloader.php';

	$json = '{
		"results": [
		  {
			"title": "Result Title",
			"url": "/optional/url/on/click",
			"image": "optional-image.jpg",
			"price": "Optional Price",
			"description": "Optional Description"
		  },
		  {
			"title": "Result Title",
			"description": "Result Description"
		  }
		],
		// optional action below results
		"action": {
		  "url": "/path/to/results",
		  "text": "View all 202 results"
		}
	  }';
	echo "</br>";
	echo $_SERVER['HTTP_HOST'];
	echo "</br>";
	echo $_SERVER['DOCUMENT_ROOT'];
	echo "</br>";
	echo $_SERVER['SERVER_NAME'];
	echo "</br>";
	echo $_SERVER['SERVER_ADDRESS'];
	echo "</br>";
	// $db = new DataAccess();

	// $passes[] = 'update Users set password = "' . password_hash('pass1', PASSWORD_DEFAULT) . '" where username = "userName1"';
	// $passes[] = 'update Users set password = "' . password_hash('pass2', PASSWORD_DEFAULT) . '" where username = "userName2"';
	// $passes[] = 'update Users set password = "' . password_hash('pass3', PASSWORD_DEFAULT) . '" where username = "userName3"';
	// $passes[] = 'update Users set password = "' . password_hash('pass4', PASSWORD_DEFAULT) . '" where username = "userName4"';
	// $passes[] = 'update Users set password = "' . password_hash('pass5', PASSWORD_DEFAULT) . '" where username = "userName5"';

	// $db->transaction($passes);

	$myObj->a = 1;
	$myObj->b = 2;

	$enJ = json_encode($myObj);
	$temp = json_decode($enJ);;

	echo $temp->a;
	echo "</br>";
	echo $temp->{'b'};


	
	?>

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