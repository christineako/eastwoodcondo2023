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
	<title>Two Bedroom Condo For Rent |  Eastwood Libis Condo For Rent  </title>
	<meta name="description" content="Find two bedroom condo for rent in Eastwood City. Furnished and unfurnished two bedroom condo property for rent in Eastwood City, Libis, Quezon City.">
	<meta name="keyword" content="Condominiums for rent One Central Park, condominium for rent eastwood libis, condo for rent in eastwood city">
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
		<?php echo cfg::get('2brrentHTML');?>				
	</div>
	

<!-- SECOND ROW -->
	<div class="row panel panel-primary">
		<div class="panel-heading">Two Bedroom Condo Units For Rent</div>
		<div class="panel-body">	
					<?php echo cindy('2brrent'); ?>


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