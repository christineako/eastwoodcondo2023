<!DOCTYPE html>
<?php
	define('MyValidation', TRUE);

	$mainpath = "include/";
	include_once $mainpath."myphp.php";
	include_once $mainpath."phpcodes.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>List your property | Eastwood City | Rental and Sales</title>
	<meta name="description" content="Let a licensed real estate broker help you sell or rent your condo. List your property in EastwoodCondo.com. We can help you find tenant or buyer of your condo">
	<meta name="keyword" content="eastwood city condominiums, condo for sale in eastwood city, condo for rent in eastwood city">
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


<!-- FIRST ROW -->
	<div class="row">
		<?php echo cfg::get('contactusHTML');?>
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