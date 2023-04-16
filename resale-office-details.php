<!DOCTYPE html>
<?php
	define('MyValidation', TRUE);

	$mainpath = "include/";
	include_once $mainpath."myphp.php";
	include_once $mainpath."phpcodes.php";
	include_once '../eastwoodcondoconnect.php';

	
if (isset($_GET['adno'])) {

	$adno = @$_GET['adno'];  

	$sql =  "SELECT * FROM tblads 
		   	JOIN tblunit ON tblads.unitcode = tblunit.unitcode 
		   	JOIN tblbldg ON tblbldg.bldgcode = tblunit.bldgcode
		   	JOIN tblcategory ON tblcategory.categorycode = tblunit.categorycode
		   	JOIN tblmincontract ON tblmincontract.mincontractcode = tblads.mincontractcode
		    JOIN tblsetup ON tblsetup.setupcode = tblunit.setupcode
		    WHERE tblads.adno ='".$adno."'";

	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);

	$adno = $row['adno'];
	$unitcode  = $row['unitcode'];
	$adtitle = $row['adtitle'];
	$addescription = $row['addescription'];
	$adprice = $row['adprice']; 
	$adtypecode = $row['adtypecode']; 
	$youtube = $row['youtube'];  
	$metakeywords = $row['metakeywords'];

	$unitdescription = $row['unitdescription'];

	$bldgname = $row['bldgname'];
	$bldglocation = $row['bldglocation'];
	$bldgamenities = $row['bldgamenities'];

	$categorydescription  = $row['categorydescription'];

	$mincontractdescription = $row['mincontractdescription'];

	$setupdescription = $row['setupdescription'];
}


//CREATING PAGE META
	$pagetitle="";
	$propertydescription = "";
	$pagetitle = $categorydescription." ".$adtypecode." in ".$bldgname." ".$bldglocation." ".number_format($adprice)."/mo";
	$propertydescription = $adtitle." ".$addescription." ".$unitdescription;
echo $adtypecode;

//CREATING CAROUSEL   
	$carousel="";
	$fileko = glob("pictures/$unitcode/*.jpg"); 
	for ($a=0; $a<count($fileko); $a++) {		
		$carousel .= "
				<li data-target='#myCarousel' data-slide-to='".$a."'></li>";						
	}

//CREATING YOUTUBE
	if ($youtube!="") {
		$you = "<div class='row'>
					<div class='col-md-12' align='center'>
						<iframe width='560' height='315' src='https://www.youtube.com/embed/".$youtube."?ecver=1' frameborder='0' allowfullscreen>
						</iframe>
					</div>
				</div>";
	} else {	
		$you = "";
	}

//CREATING PHOTO DISPLAY
	$pic = "";
	$files = glob("pictures/$unitcode/*.jpg"); 
	for ($i=0; $i<count($files); $i++) {
	$num = $files[$i];

		if ($i == 0) 
		{	$picS = "
					<div class='item active'>";	} 
		else 
		{	$picS = "<div class='item'>";	}
		
			$picS = $picS."
					<img src='".$num."' width='800' height='386' class='img-thumbnail' alt='".ucwords($bldgname)." ".ucwords($bldglocation)."'>
					</div>";
			$pic = $pic . $picS;
	 	} 

//CREATING PROPERTY DETAILS

	if ($bldgamenities="") {
		$bamenities = "";
	} else {
		$bamenities = "
				<tr>
					<td>Amenities:</td>
					<td>".ucwords($bldgamenities)."</td>
				</tr>
		";
	}

 	$details = "
	 		<div class='col-md-5' align='center'>
				<h2>".strtoupper($adtypecode)."</h2>
				<h3>".ucwords(strtolower($adtitle)."</h3>
				<table class='table'>
				<tr>
					<td>Ad Title:</td>
					<td>".ucwords($addescription)."</td>
				</tr>
				<tr>
					<td>Unit Description:</td>
					<td>".ucwords($unitdescription)."</td>
				</tr>
				<tr>
					<td>Rent:</td>
					<td>".number_format($adprice,2)."</td>
				</tr>
				<tr>
					<td>Contract:</td>
					<td>".ucwords($mincontractdescription)."</td>
				</tr>
				<tr>
					<td>Building Name:</td>
					<td>".ucwords($bldgname)."</td>
				</tr>
				<tr>
					<td>Building Location:</td>
					<td>".ucwords($bldglocation)."</td>
				</tr>
				".ucwords($bldgamenities)."
			</table>
			</div>
	";

//CREATING PHOTO CAROUSEL // NOT SURE WHAT THIS IS FOR
$carouselarrow = "
			<div class='col-md-7' align='center'>
				<div id='myCarousel' class='carousel slide' data-ride='carousel'>
				<!-- Indicators -->


					<ol class='carousel-indicators'>"
						.$carousel.
					"</ol>

				<!-- Wrapper for slides -->
					<div class='carousel-inner'>".$pic."</div>

				<!-- Left and right controls -->
	 				<a class='left carousel-control' href='#myCarousel' data-slide='prev'>
						<span class='glyphicon glyphicon-chevron-left'></span>
						<span class='sr-only'>Previous</span>
					</a>
					<a class='right carousel-control' href='#myCarousel' data-slide='next'>
						<span class='glyphicon glyphicon-chevron-right'></span>
						<span class='sr-only'>Next</span>
					</a>
				</div>
			</div>
	";
?>


<html lang="en">
<head>
	<title><?php echo ucwords(strtolower($pagetitle));?></title>
	<meta name="description" content="<?echo  ucwords(strtolower($propertydescription));?>"></meta>
	<meta name="keyword" content="<?php echo ucfirst($metakeywords); ?>"></meta>
	<meta name="author" content="<?php echo cfg::get('metaauthor');?>"></meta>
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
		<div><button onclick="history.back()">⬅️ Go Back</button></div>
		<?php echo $details; ?>
		<?php echo $carouselarrow ?>
	</div>


<!-- SECOND ROW -->
	<br><br>
	<?php echo $you; ?>
	<br><br>


<!-- THIRD ROW -->
	<div class="row panel panel-primary">
		<?php echo cfg::get('linksHTML');?>		
	</div>


<!-- FOURTH ROW -->
	<div class="row">
		<?php echo cfg::get('copyrightHTML');?>		
	</div>

</div>

<br><br>
</body>
</html>