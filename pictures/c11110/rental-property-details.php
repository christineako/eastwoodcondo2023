<!DOCTYPE html>
<?php

	define('MyValidation', TRUE);
	
if (isset($_GET['listingno']))
 {
   $listingno = @$_GET['listingno'];
   
	include("../eastwoodcondodb.php");
   $sql =  "SELECT * FROM `tbllistings` 
   	LEFT JOIN `tableunit` ON tbllistings.unitcode = tableunit.unitcode 
   	LEFT JOIN `tblcontracts` ON tblcontracts.contract = tbllistings.contract
   	LEFT JOIN `tblpayments` ON tbllistings.paymentterm = tblpayments.paymentterm
   	LEFT JOIN `tblbldgs` ON tableunit.bldgcode = tblbldgs.bldgcode   	
   	WHERE tbllistings.listingno='$listingno'";

   $result = mysql_query($sql);
   $row = mysql_fetch_assoc($result);
   
   $listingno = $row['listingno'];
   $unitcode  = $row['unitcode'];
   $shorttitle = $row['shorttitle'];
   $price = $row['price'];
   $contract = $row['contract'];
   $paymentterm  = $row['paymentterm'];
   $inclusions = $row['inclusions'];
   $capacity = $row['capacity'];
   $pets = $row['pets'];   
   $youtube = $row['youtube'];
   $category = $row['category'];
   $setup = $row['setup'];    
   $bldgcode = $row['bldgcode']; 
   $bldgname = $row['bldgname'];    
   $bldglocation = $row['bldglocation'];    
   $bldgamenities = $row['bldgamenities']; 
   $longtitle = $row['longtitle'];  
   $propertydescription = $row['propertydescription'];
   $contractdescription = $row['contractdescription'];
   $paymentdescription = $row['paymentdescription'];     
   $metakeywords = $row['metakeywords'];

//CREATING PAGE TITLE
   $pagetitle = "Condo in $bldglocation $shorttitle ".number_format($price)."/mo";



   
	$car="";
	$fileko = glob("pictures/$unitcode/*.jpg"); 
	for ($a=0; $a<count($fileko); $a++) {		
					$carS = "
								<li data-target=\"#myCarousel\" data-slide-to=\"$a\"></li>";
						
					$car = $car.$carS;
	}

	if ($youtube!="") {
		$you = "
		<div class=\"row\">
				<div class=\"col-md-12\" align=\"center\">
				<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/".$youtube."?ecver=1\" frameborder=\"0\" allowfullscreen>
				</iframe>
				</div>
		</div>";
	} else {	
		$you = "";
	}

	$pic = "";
	$files = glob("pictures/$unitcode/*.jpg"); 
	for ($i=0; $i<count($files); $i++) {
	$num = $files[$i];

		if ($i == 0) 
		{	$picS = "
					<div class=\"item active\">";	} 
		else 
		{	$picS = "<div class=\"item\">";	}
		
			$picS = $picS."
					<img src=\"".$num."\" width=\"800\" height=\"386\" class=\"img-thumbnail\" alt=\"".$shorttitle."\">
					</div>
					";
		$pic = $pic . $picS;
	 } 
 }
?>

<html lang="en">
<head>
	<title><?php echo ucwords($pagetitle);?></title>
	<meta name="description" content="<?echo  ucwords($propertydescription);?>"></meta>
	<meta name="keyword" content="<?php echo $metakeywords; ?>"></meta>
	<meta name="author" content="Christine Chan"></meta>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
<!--Start of Tawk.to Script
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/58e7b39af7bbaa72709c4ed8/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
End of Tawk.to Script-->

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1013184872102746'); // Insert your pixel ID here.
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1013184872102746&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->

</head>
<body style="margin-top: 10px;">



<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v9.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="1599844413636670"
  theme_color="#0A7CFF">
      </div>

<script>
fbq('track', 'ViewContent', {
value: 1.00,
currency: 'PHP'
});
</script>


<?php include_once("analyticstracking.php") ?>

<!-- FACEBOOK SHARE //-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="container">

<!-- FIRST ROW -->
	<div class="row">
		<?php include("include/mainnav.php"); ?>
	</div>
	
<!-- SECOND ROW -->
	<div class="row">
		<?php include("include/propertydetails.php"); ?>
		<?php include("include/propertydetailscarousel.php"); ?>
	</div>
	
<!-- THIRD ROW -->
	<?php echo $you; ?>

<!-- FOURTH ROW -->
	<div class="row panel panel-primary">
		<?php include("include/otherlinks.php"); ?>
	</div>		

<!-- FIFTH ROW -->
	<div class="row">
		<?php include("include/copyright.php"); ?>
			
<!-- FACEBOOK SHARE CODE //-->
<div align="center" class="fb-like" data-href="https://www.eastwoodcondo.com" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
			
	</div>
</div>

<br><br>
</body>
</html>