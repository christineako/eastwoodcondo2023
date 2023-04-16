<!DOCTYPE html>
<?php
	define('MyValidation', TRUE);

	$mainpath = "include/";
	include_once $mainpath."myphp.php";
	include_once $mainpath."phpcodes.php";
?>

<html lang="en">
<head>
	<title>Eastwood City Condominium | Condo Leasing | Rental Prices</title>
	<meta name="description" content="Looking to rent condo in Eastwood City Philippines? I have several available condo properties for rent in Eastwood City, for short-term or long-term rentals.">
	<meta name="keyword" content="Eastwood city Philippines condo for rent, condo for rent in eastwood quezon city, eastwood condo for rent">
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
		<?php echo cfg::get('carouselHTML');?>
	</div>

<!-- SECOND ROW -->
	<div class="row">
		<?php echo cfg::get('leasingHTML');?>
	</div>		


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