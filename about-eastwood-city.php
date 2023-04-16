<!DOCTYPE html>
<?php
	define('MyValidation', TRUE);

	$mainpath = "include/";
	include_once $mainpath."myphp.php";
?>

<html lang="en">
<head>
	<title>Real Estate Broker | Eastwood City | Rental and Sales</title>
	<meta name="description" content="Licensed real estate broker specializing in Eastwood City condo rental and sales . I can help you rent out or sell your condo. I also do property managment.">
	<meta name="keyword" content="buy condominiums eastwood city, rent condo in eastwood city, real properties in eastwood city">
	<meta name="author" content="<?php echo cfg::get('metaauthorHTML');?>" >
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo $mainpath; ?>eastwoodcondo.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="margin-top: 10px;">

<div class="container">
	<div class="row">
		<?php echo cfg::get('navHTML');?>
	</div>


<!-- FIRST ROW -->
	<div class="row">
		<?php echo cfg::get('abouteastwoodHTML');?>
	</div>		


<!-- SECOND ROW -->
	<div class="row">
		<?php echo cfg::get('carouselHTML');?>
	</div>
	<br>
	

<!-- THIRD ROW -->
	<div class="row panel panel-primary">
		<?php echo cfg::get('linksHTML');?>		
	</div>


<!-- FOURTH ROW -->
	<div class="row">
		<?php echo cfg::get('copyrightHTML');?>		
	</div>
	</div>
</div>


<br><br>
</body>
</html>