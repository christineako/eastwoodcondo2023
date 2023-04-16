<!DOCTYPE html>
<?php
	define('MyValidation', TRUE);

	$mainpath = "include/";
	include($mainpath."myphp.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Condo For Rent | Condo For Sale | Eastwood City Libis QC </title>
	<meta name="description" content="">
	<meta name="keyword" content="">
	<meta name="author" content="Christine Chan" >
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
		<?php echo cfg::get('indexmainHTML');?>
	</div>		


<!-- THIRD ROW -->
	<div class="row panel panel-primary">
		<div class="panel-heading">Studio Type Condo Units</div>
		<div class="panel-body">	
			<div class="row">
				<!--<?php echo $a; ?>-->
			</div>
		</div>
		<div class="col-sm-12">
			<ul class="pager">studioNext</ul>
		</div>
	</div>	


<!-- FOURTH ROW -->
	<div class="row panel panel-primary">
		<div class="panel-heading">One Bedroom Condo Units</div>
		<div class="panel-body">	
			<div class="row">
				<!--<?php echo $b; ?>-->
			</div>
		</div>
		<div class="col-sm-12">
			<ul class="pager">studioNext</ul>
		</div>
	</div>	


<!-- FIFTH ROW -->
	<div class="row">
		<?php echo cfg::get('indexbottomHTML');?>
	</div>
	<br>

<!-- SIXTH ROW -->
	<div class="row">
		<?php echo cfg::get('copyrightHTML');?>		
	</div>

<br>

</div>
<br><br>

</body>
</html>