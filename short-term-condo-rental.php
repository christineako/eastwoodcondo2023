<!DOCTYPE html>
<?php
	define('MyValidation', TRUE);

	$mainpath = "include/";
	include_once $mainpath."myphp.php";
	include("fb.php");

?>

<html lang="en">
<head>
	<title>Short Term Condo Rentals In Eastwood City Libis Quezon City</title>
	<meta name="description" content="We have condo for rent for short staying guests with per day, weekly and monthly rates. An affordable accommodation for balikbayans, tourist, vacationers.">
	<meta name="keyword" content="eastwood condo for rent per day, short term condo for rent in quezon city, eastwood condo for rent short term">
	<meta name="author" content="<?php echo cfg::get('metaauthor');?>" >
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


<!-- SOCIAL MEDIA LINKS AND SHARES -->

	<div class="row">
		<?php include("include/social.php") ?>
	</div>


<!-- FIRST ROW -->
	<div class="row">
		<?php echo cfg::get('shorttermHTML');?>
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