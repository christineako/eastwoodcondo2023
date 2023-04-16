<!DOCTYPE html>
<?php
	define('MyValidation', TRUE);

	$mainpath = "include/";
	include_once $mainpath."myphp.php";

?>

<html lang="en">
<head>
	<title>Metro Manila Properties | BGC Mckinley Hill Rockwell | Megaworld DMCI Rockwell SMDC Robinsons Land Ayala</title>
	<meta name="description" content="Find properties for rent and for sale in Metro Manila. Furnished and unfurnished, condominiums, house and lots, vacant lots, offices, warehouses, farms.">
	<meta name="keyword" content="Condo rental, Condo sales, Offices, Eastwood City properties, Resorts, Apartments, Lots, Farms">
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
		<?php echo cfg::get('otherpropHTML');?>
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