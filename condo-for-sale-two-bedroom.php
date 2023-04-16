<!DOCTYPE html>
<?php
	define('MyValidation', TRUE);

	$mainpath = "include/";
	include_once $mainpath."myphp.php";
	include_once $mainpath."phpcodes.php";
	include("fb.php");
?>

<html lang="en">
<head>
	<title>Two Bedroom Condo For Sale | Affordable Condo In Eastwood City </title>
	<meta name="description" content="Find two bedroom condo for sale in Eastwood City. Affordable properties for sale in Eastwood City, Libis, Quezon City for investment or personal use.">
	<meta name="keyword" content="condominium for sale eastwood libis, condo for sale in eastwood city, Condominiums for sale One Central Park">
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


<!-- SOCIAL MEDIA LINKS AND SHARES -->

	<div class="row">
		<?php include("include/social.php") ?>
	</div>


<!-- FIRST ROW -->
	<div class="row">
		<?php echo cfg::get('2brsaleHTML');?>				
	</div>
	

<!-- SECOND ROW -->
	<div class="row panel panel-primary">
		<div class="panel-heading">Two Bedroom Condo Units For Sale</div>
		<div class="panel-body">	
					<?php echo cindy('2brsale'); ?>


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