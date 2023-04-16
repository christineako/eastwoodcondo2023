<?php
if(!defined('MyValidation')) {
	exit("<h2 align='center'>You are not allowed to see content of this page!</h2><div align='center'><a href='https://www.eastwoodcondo.com'>www.eastwoodcondo.com</a></div>"); }

function cindy($x) {

	include_once '../eastwoodcondoconnect.php';
	switch ($x) {

/////////////////////////// RETRIEVE STUDIO FOR RENT UNITS ///////////////////////////

	 	case 'studiorent':	

//Get total number ONE BEDROOM UNITS */
	$mysqlp    = "SELECT count(*) FROM `tblads` 
		JOIN tblunit ON tblunit.unitcode = tblads.unitcode
		JOIN tblbldg ON tblbldg.bldgcode = tblunit.bldgcode
		JOIN tblcategory ON tblcategory.categorycode = tblunit.categorycode
		JOIN tblmincontract ON tblmincontract.mincontractcode = tblads.mincontractcode
		WHERE tblads.adstatus =  'yes'
		AND tblunit.categorycode = 'studio'
		AND tblads.adtypecode = 'For Rent'
		AND tblads.adpayment != 'transient'
		";
   
	$retval1brp = mysqli_query($conn,$mysqlp);
		if (!$retval1brp) { die('Could not get data 1: ' . mysql_error());	}

	$rowp = mysqli_fetch_array($retval1brp,MYSQLI_NUM);
	$total_count = $rowp[0];
 				
	$current_page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
				
//record per Page($per_page)	
	$per_page = 12;
		
//it gets the result of total_count over per page
	$total_pages = $total_count/$per_page;

//get the off set current page minus 1 multiply by record per page	
	$offset = ($current_page - 1) * $per_page;

//move to previous record by subtracting one into the current record
	$previous_page = $current_page - 1;

//mvove to next record by incrementing the current page by one		
	$next_page = $current_page + 1;

//check if previous record is still greater than one then it returns to true
	$has_previous_page =  $previous_page >= 1 ? true : false;

//check if Next record is still lesser than one total pages then it returns to true
	  $has_next_page = $current_page < $total_pages ? true : false;

	$string1="";
	if (is_float($total_pages)) { $total_pages=$total_pages+1;}
	for($i = 1; $i <= $total_pages; $i++){				//it loops to all pages
		if ($i == $current_page){							//check if the value of i is set to current page
			$string1 = $string1."<li class='active'><span>". $i." </span></li>";	//then it sset the i to be active or focused
		} 
		else {
			$string1 = $string1."<li><a href='condo-for-rent-studio?page=".$i."'> ". $i ." </a></li>";				//display the page number
		}
	}
	
	$Previous="";
	$Next="";
	if ($total_pages > 1){
		if ($has_next_page){
			$Next = "<li class='next'><a href='condo-for-rent-studio?page=".$next_page."'>Show more units</a></li>";
		}				

		if ($has_previous_page)
			{ $Previous = "<li class='previous'><a href='condo-for-rent-studio?page=".$previous_page."'>Previous</a></li>"; }

		if ($has_next_page)
			{ $Next = "<li class='next'><a href='condo-for-rent-studio?page=".$next_page."'>Next</a></li>"; }
	}

	$paginer = "</div>
			<div class='col-sm-12'>
				<ul class='pager'>".$string1." ".$Next." ".$Previous."</ul>		
			</div>			
		</div>	";			


	$mysql = "SELECT * FROM tblads
		JOIN tblunit ON tblunit.unitcode = tblads.unitcode
		JOIN tblbldg ON tblbldg.bldgcode = tblunit.bldgcode
		JOIN tblcategory ON tblcategory.categorycode = tblunit.categorycode
		JOIN tblmincontract ON tblmincontract.mincontractcode = tblads.mincontractcode
		WHERE tblads.adstatus =  'yes'
		AND tblunit.categorycode = 'studio'
		AND tblads.adtypecode = 'For Rent'
		AND tblads.adpayment != 'transient'
		ORDER BY tblads.addate desc
		LIMIT {$per_page} OFFSET {$offset}
		";
		
	$result = mysqli_query($conn,$mysql);
	
	if (mysqli_num_rows($result) > 0) {

		$retrieve = "";
		$i=0;

		while($row = mysqli_fetch_array($result)) {

		    $adno = $row['adno'];
		    $adprice = $row['adprice'];
		    $adtitle = $row['adtitle'];
		    $adtypecode = $row['adtypecode'];
		    $unitcode = $row['unitcode'];
		    $bldgname = $row['bldgname'];
		    $mincontractdescription = $row['mincontractdescription'];
		    $categorydescription = $row['categorydescription'];

		    $retrieve .= "
				<div class='col-sm-3'>
					<div class='thumbnail trythumb'>
						<a href=\"rental-property-details?adno=".$adno."\">
							<img src='pictures/".strtolower($unitcode)."/".strtolower($unitcode).".jpg' class='responsive rounded img-fluid' alt='".$adtitle."'>
						<div class='caption'>
							<p>".$adtypecode." in ".$bldgname." ".$mincontractdescription."</p>
							<p align='right'>Php".number_format($adprice,2)."</p>					
						</div>
		      			</a>
							<div align='right'><a href=\"rental-property-details?adno=".$adno."\" class='buttons'>Read more</a></div>
		    		</div>
				</div>";	

	  		$i++;
	  	}
	  	$retrieve.=$paginer;
   		return $retrieve; 
	}
	else{
		$retrieve="<br><br><div class='nothingtoshow'>😯 There is no property listed here at the moment. Please check back again soon.</div>".$paginer;
   		return $retrieve; 
	}

	break;

/////////////////////////// RETRIEVE ONE BEDROOM FOR RENT UNITS ///////////////////////////

	 	case '1brrent':	

//Get total number ONE BEDROOM UNITS */
	$mysqlp    = "SELECT count(*) FROM `tblads` 
		JOIN tblunit ON tblunit.unitcode = tblads.unitcode
		JOIN tblbldg ON tblbldg.bldgcode = tblunit.bldgcode
		JOIN tblcategory ON tblcategory.categorycode = tblunit.categorycode
		JOIN tblmincontract ON tblmincontract.mincontractcode = tblads.mincontractcode
		WHERE tblads.adstatus =  'yes'
		AND tblunit.categorycode = '1br'
		AND tblads.adtypecode = 'For Rent'
		AND tblads.adpayment != 'transient'
		";
   
	$retval1brp = mysqli_query($conn,$mysqlp);
		if (!$retval1brp) { die('Could not get data 1: ' . mysql_error());	}

	$rowp = mysqli_fetch_array($retval1brp,MYSQLI_NUM);
	$total_count = $rowp[0];
 				
	$current_page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
				
	$per_page = 12;
	$total_pages = $total_count/$per_page;
	$offset = ($current_page - 1) * $per_page;
	$previous_page = $current_page - 1;
	$next_page = $current_page + 1;
	$has_previous_page =  $previous_page >= 1 ? true : false;
	  $has_next_page = $current_page < $total_pages ? true : false;

	$string1="";
	if (is_float($total_pages)) { $total_pages=$total_pages+1;}
	for($i = 1; $i <= $total_pages; $i++){				
		if ($i == $current_page){							
			$string1 = $string1."<li class='active'><span>". $i." </span></li>";	
		} 
		else {
			$string1 = $string1."<li><a href='condo-for-rent-one-bedroom?page=".$i."'> ". $i ." </a></li>";				
		}
	}
	
	$Previous="";
	$Next="";
	if ($total_pages > 1){
		if ($has_next_page){
			$Next = "<li class='next'><a href='condo-for-rent-one-bedroom?page=".$next_page."'>Show more units</a></li>";
		}				

		if ($has_previous_page)
			{ $Previous = "<li class='previous'><a href='condo-for-rent-one-bedroom?page=".$previous_page."'>Previous</a></li>"; }

		if ($has_next_page)
			{ $Next = "<li class='next'><a href='condo-for-rent-one-bedroom?page=".$next_page."'>Next</a></li>"; }
	}

	$paginer = "</div>
			<div class='col-sm-12'>
				<ul class='pager'>".$string1." ".$Next." ".$Previous."</ul>		
			</div>			
		</div>	";			


	$mysql = "SELECT * FROM tblads
		JOIN tblunit ON tblunit.unitcode = tblads.unitcode
		JOIN tblbldg ON tblbldg.bldgcode = tblunit.bldgcode
		JOIN tblcategory ON tblcategory.categorycode = tblunit.categorycode
		JOIN tblmincontract ON tblmincontract.mincontractcode = tblads.mincontractcode
		WHERE tblads.adstatus =  'yes'
		AND tblunit.categorycode = '1br'
		AND tblads.adtypecode = 'For Rent'
		AND tblads.adpayment != 'transient'
		LIMIT {$per_page} OFFSET {$offset}
		";
		
	$result = mysqli_query($conn,$mysql);
	
	if (mysqli_num_rows($result) > 0) {

		$retrieve = "";
		$i=0;

		while($row = mysqli_fetch_array($result)) {

		    $adno = $row['adno'];
		    $adprice = $row['adprice'];
		    $adtitle = $row['adtitle'];
		    $adtypecode = $row['adtypecode'];
		    $unitcode = $row['unitcode'];
		    $bldgname = $row['bldgname'];
		    $mincontractdescription = $row['mincontractdescription'];
		    $categorydescription = $row['categorydescription'];

		    $retrieve .= "
				<div class='col-sm-3'>
					<div class='thumbnail trythumb'>
						<a href=\"rental-property-details?adno=".$adno."\">
							<img src='pictures/".$unitcode."/".$unitcode.".jpg' class='responsive rounded img-fluid' alt='".$adtitle."'>
						<div class='caption'>
							<p>".$adtypecode." in ".$bldgname." ".$mincontractdescription."</p>
							<p align='right'>Php".number_format($adprice,2)."</p>					
						</div>
		      			</a>
							<div align='right'><a href=\"rental-property-details?adno=".$adno."\" class='buttons'>Read more</a></div>
		    		</div>
				</div>";	

	  		$i++;
	  	}
	  	$retrieve.=$paginer;
   		return $retrieve; 
	}
	else{
		$retrieve="<br><br><div class='nothingtoshow'>😯 There is no property listed here at the moment. Please check back again soon.</div>".$paginer;
   		return $retrieve; 
	}

	break;

/////////////////////////// RETRIEVE TWO BEDROOM FOR RENT UNITS ///////////////////////////

	 	case '2brrent':	

//Get total number ONE BEDROOM UNITS */
	$mysqlp    = "SELECT count(*) FROM `tblads` 
		JOIN tblunit ON tblunit.unitcode = tblads.unitcode
		JOIN tblbldg ON tblbldg.bldgcode = tblunit.bldgcode
		JOIN tblcategory ON tblcategory.categorycode = tblunit.categorycode
		JOIN tblmincontract ON tblmincontract.mincontractcode = tblads.mincontractcode
		WHERE tblads.adstatus =  'yes'
		AND tblunit.categorycode = '2br'
		AND tblads.adtypecode = 'For Rent'
		AND tblads.adpayment != 'transient'
		";
   
	$retval1brp = mysqli_query($conn,$mysqlp);
		if (!$retval1brp) { die('Could not get data 1: ' . mysql_error());	}

	$rowp = mysqli_fetch_array($retval1brp,MYSQLI_NUM);
	$total_count = $rowp[0];
 				
	$current_page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
				
	$per_page = 12;
	$total_pages = $total_count/$per_page;
	$offset = ($current_page - 1) * $per_page;
	$previous_page = $current_page - 1;
	$next_page = $current_page + 1;
	$has_previous_page =  $previous_page >= 1 ? true : false;
	  $has_next_page = $current_page < $total_pages ? true : false;

	$string1="";
	if (is_float($total_pages)) { $total_pages=$total_pages+1;}
	for($i = 1; $i <= $total_pages; $i++){				
		if ($i == $current_page){							
			$string1 = $string1."<li class='active'><span>". $i." </span></li>";	
		} 
		else {
			$string1 = $string1."<li><a href='condo-for-rent-two-bedroom?page=".$i."'> ". $i ." </a></li>";			
		}
	}
	
	$Previous="";
	$Next="";
	if ($total_pages > 1){
		if ($has_next_page){
			$Next = "<li class='next'><a href='condo-for-rent-two-bedroom?page=".$next_page."'>Show more units</a></li>";
		}				

		if ($has_previous_page)
			{ $Previous = "<li class='previous'><a href='condo-for-rent-two-bedroom?page=".$previous_page."'>Previous</a></li>"; }

		if ($has_next_page)
			{ $Next = "<li class='next'><a href='condo-for-rent-two-bedroom?page=".$next_page."'>Next</a></li>"; }
	}

	$paginer = "</div>
			<div class='col-sm-12'>
				<ul class='pager'>".$string1." ".$Next." ".$Previous."</ul>		
			</div>			
		</div>	";			


	$mysql = "SELECT * FROM tblads
		JOIN tblunit ON tblunit.unitcode = tblads.unitcode
		JOIN tblbldg ON tblbldg.bldgcode = tblunit.bldgcode
		JOIN tblcategory ON tblcategory.categorycode = tblunit.categorycode
		JOIN tblmincontract ON tblmincontract.mincontractcode = tblads.mincontractcode
		WHERE tblads.adstatus =  'yes'
		AND tblunit.categorycode = '2br'
		AND tblads.adtypecode = 'For Rent'
		AND tblads.adpayment != 'transient'
		LIMIT {$per_page} OFFSET {$offset}
		";
		
	$result = mysqli_query($conn,$mysql);
	
	if (mysqli_num_rows($result) > 0) {

		$retrieve = "";
		$i=0;

		while($row = mysqli_fetch_array($result)) {

		    $adno = $row['adno'];
		    $adprice = $row['adprice'];
		    $adtitle = $row['adtitle'];
		    $adtypecode = $row['adtypecode'];
		    $unitcode = $row['unitcode'];
		    $bldgname = $row['bldgname'];
		    $mincontractdescription = $row['mincontractdescription'];
		    $categorydescription = $row['categorydescription'];

		    $retrieve .= "
				<div class='col-sm-3'>
					<div class='thumbnail trythumb'>
						<a href=\"rental-property-details?adno=".$adno."\">
							<img src='pictures/".$unitcode."/".$unitcode.".jpg' class='responsive rounded img-fluid' alt='".$adtitle."'>
						<div class='caption'>
							<p>".$adtypecode." in ".$bldgname." ".$mincontractdescription."</p>
							<p align='right'>Php".number_format($adprice,2)."</p>					
						</div>
		      			</a>
							<div align='right'><a href=\"rental-property-details?adno=".$adno."\" class='buttons'>Read more</a></div>
		    		</div>
				</div>";	

	  		$i++;
	  	}
	  	$retrieve.=$paginer;
   		return $retrieve; 
	}
	else{
		$retrieve="<br><br><div class='nothingtoshow'>😯 There is no property listed here at the moment. Please check back again soon.</div>".$paginer;
   		return $retrieve; 
	}

	break;

/////////////////////////// RETRIEVE THREE BEDROOM FOR RENT UNITS ///////////////////////////

	 	case '3brrent':	

//Get total number THREE BEDROOM UNITS */
	$mysqlp    = "SELECT count(*) FROM `tblads` 
		JOIN tblunit ON tblunit.unitcode = tblads.unitcode
		JOIN tblbldg ON tblbldg.bldgcode = tblunit.bldgcode
		JOIN tblcategory ON tblcategory.categorycode = tblunit.categorycode
		JOIN tblmincontract ON tblmincontract.mincontractcode = tblads.mincontractcode
		WHERE tblads.adstatus =  'yes'
		AND tblunit.categorycode = '3br'
		AND tblads.adtypecode = 'For Rent'
		AND tblads.adpayment != 'transient'
		";
   
	$retval1brp = mysqli_query($conn,$mysqlp);
		if (!$retval1brp) { die('Could not get data 1: ' . mysql_error());	}

	$rowp = mysqli_fetch_array($retval1brp,MYSQLI_NUM);
	$total_count = $rowp[0];
 				
	$current_page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
				
	$per_page = 12;
	$total_pages = $total_count/$per_page;
	$offset = ($current_page - 1) * $per_page;
	$previous_page = $current_page - 1;
	$next_page = $current_page + 1;
	$has_previous_page =  $previous_page >= 1 ? true : false;
	$has_next_page = $current_page < $total_pages ? true : false;

	$string1="";
	if (is_float($total_pages)) { $total_pages=$total_pages+1;}
	for($i = 1; $i <= $total_pages; $i++){				
		if ($i == $current_page){						
			$string1 = $string1."<li class='active'><span>". $i." </span></li>";	
		} 
		else {
			$string1 = $string1."<li><a href='condo-for-rent-three-bedroom?page=".$i."'> ". $i ." </a></li>";				
		}
	}
	
	$Previous="";
	$Next="";
	if ($total_pages > 1){
		if ($has_next_page){
			$Next = "<li class='next'><a href='condo-for-rent-three-bedroom?page=".$next_page."'>Show more units</a></li>";
		}				

		if ($has_previous_page)
			{ $Previous = "<li class='previous'><a href='condo-for-rent-three-bedroom?page=".$previous_page."'>Previous</a></li>"; }

		if ($has_next_page)
			{ $Next = "<li class='next'><a href='condo-for-rent-three-bedroom?page=".$next_page."'>Next</a></li>"; }
	}

	$paginer = "</div>
			<div class='col-sm-12'>
				<ul class='pager'>".$string1." ".$Next." ".$Previous."</ul>		
			</div>			
		</div>	";			


	$mysql = "SELECT * FROM tblads
		JOIN tblunit ON tblunit.unitcode = tblads.unitcode
		JOIN tblbldg ON tblbldg.bldgcode = tblunit.bldgcode
		JOIN tblcategory ON tblcategory.categorycode = tblunit.categorycode
		JOIN tblmincontract ON tblmincontract.mincontractcode = tblads.mincontractcode
		WHERE tblads.adstatus =  'yes'
		AND tblunit.categorycode = '3br'
		AND tblads.adtypecode = 'For Rent'
		AND tblads.adpayment != 'transient'
		LIMIT {$per_page} OFFSET {$offset}
		";
		
	$result = mysqli_query($conn,$mysql);
	
	if (mysqli_num_rows($result) > 0) {

		$retrieve = "";
		$i=0;

		while($row = mysqli_fetch_array($result)) {

		    $adno = $row['adno'];
		    $adprice = $row['adprice'];
		    $adtitle = $row['adtitle'];
		    $adtypecode = $row['adtypecode'];
		    $unitcode = $row['unitcode'];
		    $bldgname = $row['bldgname'];
		    $mincontractdescription = $row['mincontractdescription'];
		    $categorydescription = $row['categorydescription'];

		    $retrieve .= "
				<div class='col-sm-3'>
					<div class='thumbnail trythumb'>
						<a href=\"rental-property-details?adno=".$adno."\">
							<img src='pictures/".$unitcode."/".$unitcode.".jpg' class='responsive rounded img-fluid' alt='".$adtitle."'>
						<div class='caption'>
							<p>".$adtypecode." in ".$bldgname." ".$mincontractdescription."</p>
							<p align='right'>Php".number_format($adprice,2)."</p>					
						</div>
		      			</a>
							<div align='right'><a href=\"rental-property-details?adno=".$adno."\" class='buttons'>Read more</a></div>
		    		</div>
				</div>";	

	  		$i++;
	  	}
	  	$retrieve.=$paginer;
   		return $retrieve; 
	}
	else{
		$retrieve="<br><br><div class='nothingtoshow'>😯 There is no property listed here at the moment. Please check back again soon.</div>".$paginer;
   		return $retrieve; 
	}

	break;

/////////////////////////// RETRIEVE STUDIO FOR SALE UNITS ///////////////////////////

	 	case 'studiosale':	

	$mysqlp    = "SELECT count(*) FROM `tblads` 
		JOIN tblunit ON tblunit.unitcode = tblads.unitcode
		JOIN tblbldg ON tblbldg.bldgcode = tblunit.bldgcode
		JOIN tblcategory ON tblcategory.categorycode = tblunit.categorycode
		JOIN tblmincontract ON tblmincontract.mincontractcode = tblads.mincontractcode
		WHERE tblads.adstatus =  'yes'
		AND tblunit.categorycode = 'studio'
		AND tblads.adtypecode = 'For Sale'
		AND tblads.adpayment != 'transient'
		";
   
	$retvalp = mysqli_query($conn,$mysqlp);
		if (!$retvalp) { die('Could not get data 1: ' . mysql_error());	}

	$rowp = mysqli_fetch_array($retvalp,MYSQLI_NUM);
	$total_count = $rowp[0];
 				
	$current_page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
				
	$per_page = 12;
	$total_pages = $total_count/$per_page;
	$offset = ($current_page - 1) * $per_page;
	$previous_page = $current_page - 1;
	$next_page = $current_page + 1;
	$has_previous_page =  $previous_page >= 1 ? true : false;
	$has_next_page = $current_page < $total_pages ? true : false;

	$pageno="";
	if (is_float($total_pages)) { $total_pages=$total_pages+1;}
	for($i = 1; $i <= $total_pages; $i++){				
		if ($i == $current_page){						
			$pageno = $pageno."<li class='active'><span>". $i." </span></li>";	
		} 
		else {
			$pageno = $pageno."<li><a href='condo-for-sale-studio?page=".$i."'> ". $i ." </a></li>";	
		}
	}
	
	$Previous="";
	$Next="";
	if ($total_pages > 1){
		if ($has_next_page){
			$Next = "<li class='next'><a href='condo-for-sale-studio?page=".$next_page."'>Show more units</a></li>";
		}				

		if ($has_previous_page)
			{ $Previous = "<li class='previous'><a href='condo-for-sale-studio?page=".$previous_page."'>Previous</a></li>"; }

		if ($has_next_page)
			{ $Next = "<li class='next'><a href='condo-for-sale-studio?page=".$next_page."'>Next</a></li>"; }
	}

	$paginer = "</div>
			<div class='col-sm-12'>
				<ul class='pager'>".$pageno." ".$Next." ".$Previous."</ul>		
			</div>			
		</div>	";			


	$mysql = "SELECT * FROM tblads
		JOIN tblunit ON tblunit.unitcode = tblads.unitcode
		JOIN tblbldg ON tblbldg.bldgcode = tblunit.bldgcode
		JOIN tblcategory ON tblcategory.categorycode = tblunit.categorycode
		JOIN tblmincontract ON tblmincontract.mincontractcode = tblads.mincontractcode
		WHERE tblads.adstatus =  'yes'
		AND tblunit.categorycode = 'studio'
		AND tblads.adtypecode = 'For Sale'
		AND tblads.adpayment != 'transient'
		LIMIT {$per_page} OFFSET {$offset}
		";
	
	$result = mysqli_query($conn,$mysql);
	
	if (mysqli_num_rows($result) > 0) {

		$retrieve = "";
		$i=0;

		while($row = mysqli_fetch_array($result)) {

		    $adno = $row['adno'];
		    $adprice = $row['adprice'];
		    $adtitle = $row['adtitle'];
		    $adtypecode = $row['adtypecode'];
		    $unitcode = $row['unitcode'];
		    $bldgname = $row['bldgname'];
		    $mincontractdescription = $row['mincontractdescription'];
		    $categorydescription = $row['categorydescription'];

		    $retrieve .= "
				<div class='col-sm-3'>
					<div class='thumbnail trythumb'>
						<a href=\"resale-property-details?adno=".$adno."\">
							<img src='pictures/".$unitcode."/".$unitcode.".jpg' class='responsive rounded img-fluid' alt='".$adtitle."'>
						<div class='caption'>
							<p>".$adtypecode." in ".$bldgname." ".$mincontractdescription."</p>
							<p align='right'>Php".number_format($adprice,2)."</p>					
						</div>
		      			</a>
							<div align='right'><a href=\"resale-property-details?adno=".$adno."\" class='buttons'>Read more</a></div>
		    		</div>
				</div>";	

	  		$i++;
	  	}
	  	$retrieve.=$paginer;
   		return $retrieve; 
	}
	else{
		$retrieve="<br><br><div class='nothingtoshow'>😯 There is no property listed here at the moment. Please check back again soon.</div>".$paginer;
   		return $retrieve; 
	}

	break;

/////////////////////////// RETRIEVE ONE BEDROOM FOR SALE UNITS ///////////////////////////

	 	case '1brsale':	

	$mysqlp    = "SELECT count(*) FROM `tblads` 
		JOIN tblunit ON tblunit.unitcode = tblads.unitcode
		JOIN tblbldg ON tblbldg.bldgcode = tblunit.bldgcode
		JOIN tblcategory ON tblcategory.categorycode = tblunit.categorycode
		JOIN tblmincontract ON tblmincontract.mincontractcode = tblads.mincontractcode
		WHERE tblads.adstatus =  'yes'
		AND tblunit.categorycode = '1br'
		AND tblads.adtypecode = 'For Sale'
		AND tblads.adpayment != 'transient'
		";
   
	$retvalp = mysqli_query($conn,$mysqlp);
		if (!$retvalp) { die('Could not get data 1: ' . mysql_error());	}

	$rowp = mysqli_fetch_array($retvalp,MYSQLI_NUM);
	$total_count = $rowp[0];
 				
	$current_page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
				
	$per_page = 12;
	$total_pages = $total_count/$per_page;
	$offset = ($current_page - 1) * $per_page;
	$previous_page = $current_page - 1;
	$next_page = $current_page + 1;
	$has_previous_page =  $previous_page >= 1 ? true : false;
	$has_next_page = $current_page < $total_pages ? true : false;

	$pageno="";
	if (is_float($total_pages)) { $total_pages=$total_pages+1;}
	for($i = 1; $i <= $total_pages; $i++){				
		if ($i == $current_page){						
			$pageno = $pageno."<li class='active'><span>". $i." </span></li>";	
		} 
		else {
			$pageno = $pageno."<li><a href='condo-for-sale-one-bedroom?page=".$i."'> ". $i ." </a></li>";	
		}
	}
	
	$Previous="";
	$Next="";
	if ($total_pages > 1){
		if ($has_next_page){
			$Next = "<li class='next'><a href='condo-for-sale-one-bedroom?page=".$next_page."'>Show more units</a></li>";
		}				

		if ($has_previous_page)
			{ $Previous = "<li class='previous'><a href='condo-for-sale-one-bedroom?page=".$previous_page."'>Previous</a></li>"; }

		if ($has_next_page)
			{ $Next = "<li class='next'><a href='condo-for-sale-one-bedroom?page=".$next_page."'>Next</a></li>"; }
	}

	$paginer = "</div>
			<div class='col-sm-12'>
				<ul class='pager'>".$pageno." ".$Next." ".$Previous."</ul>		
			</div>			
		</div>	";			


	$mysql = "SELECT * FROM tblads
		JOIN tblunit ON tblunit.unitcode = tblads.unitcode
		JOIN tblbldg ON tblbldg.bldgcode = tblunit.bldgcode
		JOIN tblcategory ON tblcategory.categorycode = tblunit.categorycode
		JOIN tblmincontract ON tblmincontract.mincontractcode = tblads.mincontractcode
		WHERE tblads.adstatus =  'yes'
		AND tblunit.categorycode = '1br'
		AND tblads.adtypecode = 'For Sale'
		AND tblads.adpayment != 'transient'
		LIMIT {$per_page} OFFSET {$offset}
		";
		
	$result = mysqli_query($conn,$mysql);
	
	if (mysqli_num_rows($result) > 0) {

		$retrieve = "";
		$i=0;

		while($row = mysqli_fetch_array($result)) {

		    $adno = $row['adno'];
		    $adprice = $row['adprice'];
		    $adtitle = $row['adtitle'];
		    $adtypecode = $row['adtypecode'];
		    $unitcode = $row['unitcode'];
		    $bldgname = $row['bldgname'];
		    $mincontractdescription = $row['mincontractdescription'];
		    $categorydescription = $row['categorydescription'];

		    $retrieve .= "
				<div class='col-sm-3'>
					<div class='thumbnail trythumb'>
						<a href=\"resale-property-details?adno=".$adno."\">
							<img src='pictures/".$unitcode."/".$unitcode.".jpg' class='responsive rounded img-fluid' alt='".$adtitle."'>
						<div class='caption'>
							<p>".$adtypecode." in ".$bldgname." ".$mincontractdescription."</p>
							<p align='right'>Php".number_format($adprice,2)."</p>					
						</div>
		      			</a>
							<div align='right'><a href=\"resale-property-details?adno=".$adno."\" class='buttons'>Read more</a></div>
		    		</div>
				</div>";	

	  		$i++;
	  	}
	  	$retrieve.=$paginer;
   		return $retrieve; 
	}
	else{
		$retrieve="<br><br><div class='nothingtoshow'>😯 There is no property listed here at the moment. Please check back again soon.</div>".$paginer;
   		return $retrieve; 
	}

	break;

/////////////////////////// RETRIEVE TWO BEDROOM FOR SALE UNITS ///////////////////////////

	 	case '2brsale':	

	$mysqlp    = "SELECT count(*) FROM `tblads` 
		JOIN tblunit ON tblunit.unitcode = tblads.unitcode
		JOIN tblbldg ON tblbldg.bldgcode = tblunit.bldgcode
		JOIN tblcategory ON tblcategory.categorycode = tblunit.categorycode
		JOIN tblmincontract ON tblmincontract.mincontractcode = tblads.mincontractcode
		WHERE tblads.adstatus =  'yes'
		AND tblunit.categorycode = '2br'
		AND tblads.adtypecode = 'For Sale'
		AND tblads.adpayment != 'transient'
		";
   
	$retvalp = mysqli_query($conn,$mysqlp);
		if (!$retvalp) { die('Could not get data 1: ' . mysql_error());	}

	$rowp = mysqli_fetch_array($retvalp,MYSQLI_NUM);
	$total_count = $rowp[0];
 				
	$current_page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
				
	$per_page = 12;
	$total_pages = $total_count/$per_page;
	$offset = ($current_page - 1) * $per_page;
	$previous_page = $current_page - 1;
	$next_page = $current_page + 1;
	$has_previous_page =  $previous_page >= 1 ? true : false;
	$has_next_page = $current_page < $total_pages ? true : false;

	$pageno="";
	if (is_float($total_pages)) { $total_pages=$total_pages+1;}
	for($i = 1; $i <= $total_pages; $i++){				
		if ($i == $current_page){						
			$pageno = $pageno."<li class='active'><span>". $i." </span></li>";	
		} 
		else {
			$pageno = $pageno."<li><a href='condo-for-sale-two-bedroom?page=".$i."'> ". $i ." </a></li>";	
		}
	}
	
	$Previous="";
	$Next="";
	if ($total_pages > 1){
		if ($has_next_page){
			$Next = "<li class='next'><a href='condo-for-sale-two-bedroom?page=".$next_page."'>Show more units</a></li>";
		}				

		if ($has_previous_page)
			{ $Previous = "<li class='previous'><a href='condo-for-sale-two-bedroom?page=".$previous_page."'>Previous</a></li>"; }

		if ($has_next_page)
			{ $Next = "<li class='next'><a href='condo-for-sale-two-bedroom?page=".$next_page."'>Next</a></li>"; }
	}

	$paginer = "</div>
			<div class='col-sm-12'>
				<ul class='pager'>".$pageno." ".$Next." ".$Previous."</ul>		
			</div>			
		</div>	";			


	$mysql = "SELECT * FROM tblads
		JOIN tblunit ON tblunit.unitcode = tblads.unitcode
		JOIN tblbldg ON tblbldg.bldgcode = tblunit.bldgcode
		JOIN tblcategory ON tblcategory.categorycode = tblunit.categorycode
		JOIN tblmincontract ON tblmincontract.mincontractcode = tblads.mincontractcode
		WHERE tblads.adstatus =  'yes'
		AND tblunit.categorycode = '2br'
		AND tblads.adtypecode = 'For Sale'
		AND tblads.adpayment != 'transient'
		LIMIT {$per_page} OFFSET {$offset}
		";
		
	$result = mysqli_query($conn,$mysql);
	
	if (mysqli_num_rows($result) > 0) {

		$retrieve = "";
		$i=0;

		while($row = mysqli_fetch_array($result)) {

		    $adno = $row['adno'];
		    $adprice = $row['adprice'];
		    $adtitle = $row['adtitle'];
		    $adtypecode = $row['adtypecode'];
		    $unitcode = $row['unitcode'];
		    $bldgname = $row['bldgname'];
		    $mincontractdescription = $row['mincontractdescription'];
		    $categorydescription = $row['categorydescription'];

		    $retrieve .= "
				<div class='col-sm-3'>
					<div class='thumbnail trythumb'>
						<a href=\"resale-property-details?adno=".$adno."\">
							<img src='pictures/".$unitcode."/".$unitcode.".jpg' class='responsive rounded img-fluid' alt='".$adtitle."'>
						<div class='caption'>
							<p>".$adtypecode." in ".$bldgname." ".$mincontractdescription."</p>
							<p align='right'>Php".number_format($adprice,2)."</p>					
						</div>
		      			</a>
							<div align='right'><a href=\"resale-property-details?adno=".$adno."\" class='buttons'>Read more</a></div>
		    		</div>
				</div>";	

	  		$i++;
	  	}
	  	$retrieve.=$paginer;
   		return $retrieve; 
	}
	else{
		$retrieve="<br><br><div class='nothingtoshow'>😯 There is no property listed here at the moment. Please check back again soon.</div>".$paginer;
   		return $retrieve; 
	}

	break;

/////////////////////////// RETRIEVE THREE BEDROOM FOR SALE UNITS ///////////////////////////

	 	case '3brsale':	

	$mysqlp    = "SELECT count(*) FROM `tblads` 
		JOIN tblunit ON tblunit.unitcode = tblads.unitcode
		JOIN tblbldg ON tblbldg.bldgcode = tblunit.bldgcode
		JOIN tblcategory ON tblcategory.categorycode = tblunit.categorycode
		JOIN tblmincontract ON tblmincontract.mincontractcode = tblads.mincontractcode
		WHERE tblads.adstatus =  'yes'
		AND tblunit.categorycode = '3br'
		AND tblads.adtypecode = 'For Sale'
		AND tblads.adpayment != 'transient'
		";
   
	$retvalp = mysqli_query($conn,$mysqlp);
		if (!$retvalp) { die('Could not get data 1: ' . mysql_error());	}

	$rowp = mysqli_fetch_array($retvalp,MYSQLI_NUM);
	$total_count = $rowp[0];
 				
	$current_page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
				
	$per_page = 12;
	$total_pages = $total_count/$per_page;
	$offset = ($current_page - 1) * $per_page;
	$previous_page = $current_page - 1;
	$next_page = $current_page + 1;
	$has_previous_page =  $previous_page >= 1 ? true : false;
	$has_next_page = $current_page < $total_pages ? true : false;

	$pageno="";
	if (is_float($total_pages)) { $total_pages=$total_pages+1;}
	for($i = 1; $i <= $total_pages; $i++){				
		if ($i == $current_page){						
			$pageno = $pageno."<li class='active'><span>". $i." </span></li>";	
		} 
		else {
			$pageno = $pageno."<li><a href='condo-for-sale-three-bedroom?page=".$i."'> ". $i ." </a></li>";	
		}
	}
	
	$Previous="";
	$Next="";
	if ($total_pages > 1){
		if ($has_next_page){
			$Next = "<li class='next'><a href='condo-for-sale-three-bedroom?page=".$next_page."'>Show more units</a></li>";
		}				

		if ($has_previous_page)
			{ $Previous = "<li class='previous'><a href='condo-for-sale-three-bedroom?page=".$previous_page."'>Previous</a></li>"; }

		if ($has_next_page)
			{ $Next = "<li class='next'><a href='condo-for-sale-three-bedroom?page=".$next_page."'>Next</a></li>"; }
	}

	$paginer = "</div>
			<div class='col-sm-12'>
				<ul class='pager'>".$pageno." ".$Next." ".$Previous."</ul>		
			</div>			
		</div>	";			


	$mysql = "SELECT * FROM tblads
		JOIN tblunit ON tblunit.unitcode = tblads.unitcode
		JOIN tblbldg ON tblbldg.bldgcode = tblunit.bldgcode
		JOIN tblcategory ON tblcategory.categorycode = tblunit.categorycode
		JOIN tblmincontract ON tblmincontract.mincontractcode = tblads.mincontractcode
		WHERE tblads.adstatus =  'yes'
		AND tblunit.categorycode = '3br'
		AND tblads.adtypecode = 'For Sale'
		AND tblads.adpayment != 'transient'
		LIMIT {$per_page} OFFSET {$offset}
		";
		
	$result = mysqli_query($conn,$mysql);
	
	if (mysqli_num_rows($result) > 0) {

		$retrieve = "";
		$i=0;

		while($row = mysqli_fetch_array($result)) {

		    $adno = $row['adno'];
		    $adprice = $row['adprice'];
		    $adtitle = $row['adtitle'];
		    $adtypecode = $row['adtypecode'];
		    $unitcode = $row['unitcode'];
		    $bldgname = $row['bldgname'];
		    $mincontractdescription = $row['mincontractdescription'];
		    $categorydescription = $row['categorydescription'];

		    $retrieve .= "
				<div class='col-sm-3'>
					<div class='thumbnail trythumb'>
						<a href=\"resale-property-details?adno=".$adno."\">
							<img src='pictures/".$unitcode."/".$unitcode.".jpg' class='responsive rounded img-fluid' alt='".$adtitle."'>
						<div class='caption'>
							<p>".$adtypecode." in ".$bldgname." ".$mincontractdescription."</p>
							<p align='right'>Php".number_format($adprice,2)."</p>					
						</div>
		      			</a>
							<div align='right'><a href=\"resale-property-details?adno=".$adno."\" class='buttons'>Read more</a></div>
		    		</div>
				</div>";	

	  		$i++;
	  	}
	  	$retrieve.=$paginer;
   		return $retrieve; 
	}
	else{
		$retrieve="<br><br><div class='nothingtoshow'>😯 There is no property listed here at the moment. Please check back again soon.</div>".$paginer;
   		return $retrieve; 
	}

	break;

/////////////////////////// RETRIEVE OFFICE FOR RENT UNITS ///////////////////////////

	 	case 'officerent':	

	$mysqlp    = "SELECT count(*) FROM `tblads` 
		JOIN tblunit ON tblunit.unitcode = tblads.unitcode
		JOIN tblbldg ON tblbldg.bldgcode = tblunit.bldgcode
		JOIN tblcategory ON tblcategory.categorycode = tblunit.categorycode
		JOIN tblmincontract ON tblmincontract.mincontractcode = tblads.mincontractcode
		WHERE tblads.adstatus =  'yes'
		AND tblunit.categorycode = 'office'
		AND tblads.adtypecode = 'For Rent'
		AND tblads.adpayment != 'transient'
		";
   
	$retvalp = mysqli_query($conn,$mysqlp);
		if (!$retvalp) { die('Could not get data 1: ' . mysql_error());	}

	$rowp = mysqli_fetch_array($retvalp,MYSQLI_NUM);
	$total_count = $rowp[0];
 				
	$current_page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
				
	$per_page = 12;
	$total_pages = $total_count/$per_page;
	$offset = ($current_page - 1) * $per_page;
	$previous_page = $current_page - 1;
	$next_page = $current_page + 1;
	$has_previous_page =  $previous_page >= 1 ? true : false;
	$has_next_page = $current_page < $total_pages ? true : false;

	$pageno="";
	if (is_float($total_pages)) { $total_pages=$total_pages+1;}
	for($i = 1; $i <= $total_pages; $i++){				
		if ($i == $current_page){						
			$pageno = $pageno."<li class='active'><span>". $i." </span></li>";	
		} 
		else {
			$pageno = $pageno."<li><a href='condo-for-rent-office-spaces?page=".$i."'> ". $i ." </a></li>";	
		}
	}
	
	$Previous="";
	$Next="";
	if ($total_pages > 1){
		if ($has_next_page){
			$Next = "<li class='next'><a href='condo-for-rent-office-spaces?page=".$next_page."'>Show more units</a></li>";
		}				

		if ($has_previous_page)
			{ $Previous = "<li class='previous'><a href='condo-for-rent-office-spaces?page=".$previous_page."'>Previous</a></li>"; }

		if ($has_next_page)
			{ $Next = "<li class='next'><a href='condo-for-rent-office-spaces?page=".$next_page."'>Next</a></li>"; }
	}

	$paginer = "</div>
			<div class='col-sm-12'>
				<ul class='pager'>".$pageno." ".$Next." ".$Previous."</ul>		
			</div>			
		</div>	";			


	$mysql = "SELECT * FROM tblads
		JOIN tblunit ON tblunit.unitcode = tblads.unitcode
		JOIN tblbldg ON tblbldg.bldgcode = tblunit.bldgcode
		JOIN tblcategory ON tblcategory.categorycode = tblunit.categorycode
		JOIN tblmincontract ON tblmincontract.mincontractcode = tblads.mincontractcode
		WHERE tblads.adstatus =  'yes'
		AND tblunit.categorycode = 'office'
		AND tblads.adtypecode = 'For Rent'
		AND tblads.adpayment != 'transient'
		LIMIT {$per_page} OFFSET {$offset}
		";
		
	$result = mysqli_query($conn,$mysql);
	
	if (mysqli_num_rows($result) > 0) {

		$retrieve = "";
		$i=0;

		while($row = mysqli_fetch_array($result)) {

		    $adno = $row['adno'];
		    $adprice = $row['adprice'];
		    $adtitle = $row['adtitle'];
		    $adtypecode = $row['adtypecode'];
		    $unitcode = $row['unitcode'];
		    $bldgname = $row['bldgname'];
		    $mincontractdescription = $row['mincontractdescription'];
		    $categorydescription = $row['categorydescription'];

		    $retrieve .= "
				<div class='col-sm-3'>
					<div class='thumbnail trythumb'>
						<a href=\"rental-office-details?adno=".$adno."\">
							<img src='pictures/".$unitcode."/".$unitcode.".jpg' class='responsive rounded img-fluid' alt='".$adtitle."'>
						<div class='caption'>
							<p>".$adtypecode." in ".$bldgname." ".$mincontractdescription."</p>
							<p align='right'>Php".number_format($adprice,2)."</p>					
						</div>
		      			</a>
							<div align='right'><a href=\"rental-office-details?adno=".$adno."\" class='buttons'>Read more</a></div>
		    		</div>
				</div>";	

	  		$i++;
	  	}
	  	$retrieve.=$paginer;
   		return $retrieve; 
	}
	else{
		$retrieve="<br><br><div class='nothingtoshow'>😯 There is no property listed here at the moment. Please check back again soon.</div>".$paginer;
   		return $retrieve; 
	}

	break;

/////////////////////////// RETRIEVE OFFICE FOR SALE UNITS ///////////////////////////

	 	case 'officesale':	

	$mysqlp    = "SELECT count(*) FROM `tblads` 
		JOIN tblunit ON tblunit.unitcode = tblads.unitcode
		JOIN tblbldg ON tblbldg.bldgcode = tblunit.bldgcode
		JOIN tblcategory ON tblcategory.categorycode = tblunit.categorycode
		JOIN tblmincontract ON tblmincontract.mincontractcode = tblads.mincontractcode
		WHERE tblads.adstatus =  'yes'
		AND tblunit.categorycode = 'office'
		AND tblads.adtypecode = 'For Sale'
		AND tblads.adpayment != 'transient'
		";
   
	$retvalp = mysqli_query($conn,$mysqlp);
		if (!$retvalp) { die('Could not get data 1: ' . mysql_error());	}

	$rowp = mysqli_fetch_array($retvalp,MYSQLI_NUM);
	$total_count = $rowp[0];
 				
	$current_page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
				
	$per_page = 12;
	$total_pages = $total_count/$per_page;
	$offset = ($current_page - 1) * $per_page;
	$previous_page = $current_page - 1;
	$next_page = $current_page + 1;
	$has_previous_page =  $previous_page >= 1 ? true : false;
	$has_next_page = $current_page < $total_pages ? true : false;

	$pageno="";
	if (is_float($total_pages)) { $total_pages=$total_pages+1;}
	for($i = 1; $i <= $total_pages; $i++){				
		if ($i == $current_page){						
			$pageno = $pageno."<li class='active'><span>". $i." </span></li>";	
		} 
		else {
			$pageno = $pageno."<li><a href='condo-for-sale-office-spaces?page=".$i."'> ". $i ." </a></li>";	
		}
	}
	
	$Previous="";
	$Next="";
	if ($total_pages > 1){
		if ($has_next_page){
			$Next = "<li class='next'><a href='condo-for-sale-office-spaces?page=".$next_page."'>Show more units</a></li>";
		}				

		if ($has_previous_page)
			{ $Previous = "<li class='previous'><a href='condo-for-sale-office-spaces?page=".$previous_page."'>Previous</a></li>"; }

		if ($has_next_page)
			{ $Next = "<li class='next'><a href='condo-for-sale-office-spaces?page=".$next_page."'>Next</a></li>"; }
	}

	$paginer = "</div>
			<div class='col-sm-12'>
				<ul class='pager'>".$pageno." ".$Next." ".$Previous."</ul>		
			</div>			
		</div>	";			


	$mysql = "SELECT * FROM tblads
		JOIN tblunit ON tblunit.unitcode = tblads.unitcode
		JOIN tblbldg ON tblbldg.bldgcode = tblunit.bldgcode
		JOIN tblcategory ON tblcategory.categorycode = tblunit.categorycode
		JOIN tblmincontract ON tblmincontract.mincontractcode = tblads.mincontractcode
		WHERE tblads.adstatus =  'yes'
		AND tblunit.categorycode = 'office'
		AND tblads.adtypecode = 'For Sale'
		AND tblads.adpayment != 'transient'
		LIMIT {$per_page} OFFSET {$offset}
		";
		
	$result = mysqli_query($conn,$mysql);
	
	if (mysqli_num_rows($result) > 0) {

		$retrieve = "";
		$i=0;

		while($row = mysqli_fetch_array($result)) {

		    $adno = $row['adno'];
		    $adprice = $row['adprice'];
		    $adtitle = $row['adtitle'];
		    $adtypecode = $row['adtypecode'];
		    $unitcode = $row['unitcode'];
		    $bldgname = $row['bldgname'];
		    $mincontractdescription = $row['mincontractdescription'];
		    $categorydescription = $row['categorydescription'];

		    $retrieve .= "
				<div class='col-sm-3'>
					<div class='thumbnail trythumb'>
						<a href=\"resale-office-details?adno=".$adno."\">
							<img src='pictures/".$unitcode."/".$unitcode.".jpg' class='responsive rounded img-fluid' alt='".$adtitle."'>
						<div class='caption'>
							<p>".$adtypecode." in ".$bldgname." ".$mincontractdescription."</p>
							<p align='right'>Php".number_format($adprice,2)."</p>					
						</div>
		      			</a>
							<div align='right'><a href=\"resale-office-details?adno=".$adno."\" class='buttons'>Read more</a></div>
		    		</div>
				</div>";	

	  		$i++;
	  	}
	  	$retrieve.=$paginer;
   		return $retrieve; 
	}
	else{
		$retrieve="<br><br><div class='nothingtoshow'>😯 There is no property listed here at the moment. Please check back again soon.</div>".$paginer;
   		return $retrieve; 
	}

	break;

/////////////////////////// RETRIEVE PROPERTIES FOR RENT IN OTHER LOCATIONS ///////////////////////////

	 	case 'otherrent':	

	$mysqlp    = "SELECT count(*) FROM `tblads` 
		JOIN tblunit ON tblunit.unitcode = tblads.unitcode
		JOIN tblbldg ON tblbldg.bldgcode = tblunit.bldgcode
		JOIN tblcategory ON tblcategory.categorycode = tblunit.categorycode
		JOIN tblmincontract ON tblmincontract.mincontractcode = tblads.mincontractcode
		WHERE tblads.adstatus =  'yes'
		AND tblunit.unitlocation = 'other'
		AND tblads.adtypecode = 'For Rent'
		AND tblads.adpayment != 'transient'
		";
   
	$retvalp = mysqli_query($conn,$mysqlp);
		if (!$retvalp) { die('Could not get data 1: ' . mysql_error());	}

	$rowp = mysqli_fetch_array($retvalp,MYSQLI_NUM);
	$total_count = $rowp[0];
 				
	$current_page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
				
	$per_page = 12;
	$total_pages = $total_count/$per_page;
	$offset = ($current_page - 1) * $per_page;
	$previous_page = $current_page - 1;
	$next_page = $current_page + 1;
	$has_previous_page =  $previous_page >= 1 ? true : false;
	$has_next_page = $current_page < $total_pages ? true : false;

	$pageno="";
	if (is_float($total_pages)) { $total_pages=$total_pages+1;}
	for($i = 1; $i <= $total_pages; $i++){				
		if ($i == $current_page){						
			$pageno = $pageno."<li class='active'><span>". $i." </span></li>";	
		} 
		else {
			$pageno = $pageno."<li><a href='philippines-properties-rent?page=".$i."'> ". $i ." </a></li>";	
		}
	}
	
	$Previous="";
	$Next="";
	if ($total_pages > 1){
		if ($has_next_page){
			$Next = "<li class='next'><a href='philippines-properties-rent?page=".$next_page."'>Show more units</a></li>";
		}				

		if ($has_previous_page)
			{ $Previous = "<li class='previous'><a href='philippines-properties-rent?page=".$previous_page."'>Previous</a></li>"; }

		if ($has_next_page)
			{ $Next = "<li class='next'><a href='philippines-properties-rent?page=".$next_page."'>Next</a></li>"; }
	}

	$paginer = "</div>
			<div class='col-sm-12'>
				<ul class='pager'>".$pageno." ".$Next." ".$Previous."</ul>		
			</div>			
		</div>	";			


	$mysql = "SELECT * FROM tblads
		JOIN tblunit ON tblunit.unitcode = tblads.unitcode
		JOIN tblbldg ON tblbldg.bldgcode = tblunit.bldgcode
		JOIN tblcategory ON tblcategory.categorycode = tblunit.categorycode
		JOIN tblmincontract ON tblmincontract.mincontractcode = tblads.mincontractcode
		WHERE tblads.adstatus =  'yes'
		AND tblunit.unitlocation = 'other'
		AND tblads.adtypecode = 'For Rent'
		AND tblads.adpayment != 'transient'
		LIMIT {$per_page} OFFSET {$offset}
		";
		
	$result = mysqli_query($conn,$mysql);
	
	if (mysqli_num_rows($result) > 0) {

		$retrieve = "";
		$i=0;

		while($row = mysqli_fetch_array($result)) {

		    $adno = $row['adno'];
		    $adprice = $row['adprice'];
		    $adtitle = $row['adtitle'];
		    $adtypecode = $row['adtypecode'];
		    $unitcode = $row['unitcode'];
		    $bldgname = $row['bldgname'];
		    $mincontractdescription = $row['mincontractdescription'];
		    $categorydescription = $row['categorydescription'];

		    $retrieve .= "
				<div class='col-sm-3'>
					<div class='thumbnail trythumb'>
						<a href=\"rental-philippine-property-details?adno=".$adno."\">
							<img src='pictures/".$unitcode."/".$unitcode.".jpg' class='responsive rounded img-fluid' alt='".$adtitle."'>
						<div class='caption'>
							<p>".$adtypecode." in ".$bldgname." ".$mincontractdescription."</p>
							<p align='right'>Php".number_format($adprice,2)."</p>					
						</div>
		      			</a>
							<div align='right'><a href=\"rental-philippines-property-details?adno=".$adno."\" class='buttons'>Read more</a></div>
		    		</div>
				</div>";	

	  		$i++;
	  	}
	  	$retrieve.=$paginer;
   		return $retrieve; 
	}
	else{
		$retrieve="<br><br><div class='nothingtoshow'>😯 There is no property listed here at the moment. Please check back again soon.</div>".$paginer;
   		return $retrieve; 
	}

	break;

/////////////////////////// RETRIEVE PROPERTIES FOR SALE IN OTHER LOCATIONS ///////////////////////////

	 	case 'othersale':	

	$mysqlp    = "SELECT count(*) FROM `tblads` 
		JOIN tblunit ON tblunit.unitcode = tblads.unitcode
		JOIN tblbldg ON tblbldg.bldgcode = tblunit.bldgcode
		JOIN tblcategory ON tblcategory.categorycode = tblunit.categorycode
		JOIN tblmincontract ON tblmincontract.mincontractcode = tblads.mincontractcode
		WHERE tblads.adstatus =  'yes'
		AND tblunit.categorycode = 'other'
		AND tblads.adtypecode = 'For Sale'
		AND tblads.adpayment != 'transient'
		";
   
	$retvalp = mysqli_query($conn,$mysqlp);
		if (!$retvalp) { die('Could not get data 1: ' . mysql_error());	}

	$rowp = mysqli_fetch_array($retvalp,MYSQLI_NUM);
	$total_count = $rowp[0];
 				
	$current_page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
				
	$per_page = 12;
	$total_pages = $total_count/$per_page;
	$offset = ($current_page - 1) * $per_page;
	$previous_page = $current_page - 1;
	$next_page = $current_page + 1;
	$has_previous_page =  $previous_page >= 1 ? true : false;
	$has_next_page = $current_page < $total_pages ? true : false;

	$pageno="";
	if (is_float($total_pages)) { $total_pages=$total_pages+1;}
	for($i = 1; $i <= $total_pages; $i++){				
		if ($i == $current_page){						
			$pageno = $pageno."<li class='active'><span>". $i." </span></li>";	
		} 
		else {
			$pageno = $pageno."<li><a href='philippines-property-for-sale?page=".$i."'> ". $i ." </a></li>";	
		}
	}
	
	$Previous="";
	$Next="";
	if ($total_pages > 1){
		if ($has_next_page){
			$Next = "<li class='next'><a href='philippines-property-for-sale?page=".$next_page."'>Show more units</a></li>";
		}				

		if ($has_previous_page)
			{ $Previous = "<li class='previous'><a href='philippines-property-for-sale?page=".$previous_page."'>Previous</a></li>"; }

		if ($has_next_page)
			{ $Next = "<li class='next'><a href='philippines-property-for-sale?page=".$next_page."'>Next</a></li>"; }
	}

	$paginer = "</div>
			<div class='col-sm-12'>
				<ul class='pager'>".$pageno." ".$Next." ".$Previous."</ul>		
			</div>			
		</div>	";			


	$mysql = "SELECT * FROM tblads
		JOIN tblunit ON tblunit.unitcode = tblads.unitcode
		JOIN tblbldg ON tblbldg.bldgcode = tblunit.bldgcode
		JOIN tblcategory ON tblcategory.categorycode = tblunit.categorycode
		JOIN tblmincontract ON tblmincontract.mincontractcode = tblads.mincontractcode
		WHERE tblads.adstatus =  'yes'
		AND tblunit.categorycode = 'office'
		AND tblads.adtypecode = 'For Sale'
		AND tblads.adpayment != 'transient'
		LIMIT {$per_page} OFFSET {$offset}
		";
		
	$result = mysqli_query($conn,$mysql);
	
	if (mysqli_num_rows($result) > 0) {

		$retrieve = "";
		$i=0;

		while($row = mysqli_fetch_array($result)) {

		    $adno = $row['adno'];
		    $adprice = $row['adprice'];
		    $adtitle = $row['adtitle'];
		    $adtypecode = $row['adtypecode'];
		    $unitcode = $row['unitcode'];
		    $bldgname = $row['bldgname'];
		    $mincontractdescription = $row['mincontractdescription'];
		    $categorydescription = $row['categorydescription'];

		    $retrieve .= "
				<div class='col-sm-3'>
					<div class='thumbnail trythumb'>
						<a href=\"resale-philippines-property-details?adno=".$adno."\">
							<img src='pictures/".$unitcode."/".$unitcode.".jpg' class='responsive rounded img-fluid' alt='".$adtitle."'>
						<div class='caption'>
							<p>".$adtypecode." in ".$bldgname." ".$mincontractdescription."</p>
							<p align='right'>Php".number_format($adprice,2)."</p>					
						</div>
		      			</a>
							<div align='right'><a href=\"resale-philippines-property-details?adno=".$adno."\" class='buttons'>Read more</a></div>
		    		</div>
				</div>";	

	  		$i++;
	  	}
	  	$retrieve.=$paginer;
   		return $retrieve; 
	}
	else{
		$retrieve="<br><br><div class='nothingtoshow'>😯 There is no property listed here at the moment. Please check back again soon.</div>".$paginer;
   		return $retrieve; 
	}

	break;

/////////////////////////// RETRIEVE DEFAULT FOR NO CASE MATCHED ///////////////////////////

	default:
		$retrieve="<br><br><div class='nothingtoshow'>😯 Error encountered.</div>";
   		return $retrieve; 

	} //end switch

} //end function

?>
