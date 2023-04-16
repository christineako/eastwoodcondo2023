<!DOCTYPE html>
<?php
	define('MyValidation', TRUE);

	$mainpath = "include/";
	include_once $mainpath."myphp.php";

?>

<head>
	<title>Condo Property Management | Rental Income From Your Condo</title>
	<meta name="description" content="Our property management service will take care of your condo leasing, upkeep, housekeeping and expenses. Turn you condo into an income-generating property. ">
	<meta name="keyword" content="real estate broker in quezon city, eastwood city broker, condo leasing in eastwood city">
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
		<?php echo cfg::get('propmgtHTML');?>
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