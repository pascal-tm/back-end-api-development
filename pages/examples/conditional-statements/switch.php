<?php

	$option = "pizza";
	
	switch ( $option ) 
	{
		case "pizza":
			$reply = "Nice! I love pizza.";
			break;

		case "spagetti":
			$reply = "Spagetti, hm, don't be skimpy on the meatballs eh.";
			break;

		default:
			$reply = "No pizza or spagetti?! I'm leaving! Don't you know I'm an influencer? I'm going to give this restaurant a 1 ★ review.";
	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/global.css">
	<link rel="stylesheet" type="text/css" href="/css/directory.css">
	<link rel="stylesheet" type="text/css" href="/css/facade.css">
</head>

<body>
	
	<h1>Conditional statements: switch</h1>

	<p>Serving today: <?= $option ?></p>
	<p>- <?= $reply ?></p>
	
</body>
</html>