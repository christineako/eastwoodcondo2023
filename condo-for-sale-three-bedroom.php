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
	<title>Three Bedroom Condo For Sale | Eastwood City Libis Quezon City</title>
	<meta name="description" content="Find three bedroom condo for sale in Eastwood City. We have several condo apartments for sale in Quezon City at very good prices. See our list of condo for sale.">
	<meta name="keyword" content="condominiums for sale one orchard road, condo for sale in eastwood libis, apartment for sale in eastwood libis">
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
		<?php echo cfg::get('3brsaleHTML');?>				
	</div>
	

<!-- SECOND ROW -->
	<div class="row panel panel-primary">
		<div class="panel-heading">Studio Type Condo Units For Sale</div>
		<div class="panel-body">	
					<?php echo cindy('3brsale'); ?>


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