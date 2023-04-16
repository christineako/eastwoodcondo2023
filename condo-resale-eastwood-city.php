<!DOCTYPE html>
<?php
	define('MyValidation', TRUE);

	$mainpath = "include/";
	include_once $mainpath."myphp.php";
	include_once $mainpath."phpcodes.php";
	include("fb.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Eastwood City Condominium | Buying Condo in the Philippines</title>
	<meta name="description" content="Looking to buy condo in Eastwood City Philippines? I have several affordable condo properties for sale in Eastwood City. Negotiable prices, installment payment.">
	<meta name="keyword" content="eastwood city condo for sale, condo for sale in eastwood city philippines, eastwood parkview condo for sale">
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
		<?php echo cfg::get('saleHTML');?>
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