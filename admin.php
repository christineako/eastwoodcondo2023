<?php
include_once '../eastwoodcondoconnect.php';
$mainpath = "include/";

$date=date_create();
date_timestamp_get($date);

$displaylist="";

if(count($_GET)>0) {
	$mysql = "SELECT * FROM tblads WHERE unitcode LIKE '%".$_GET['unitcode']."%'";
	$result = mysqli_query($conn,$mysql);

	if (mysqli_num_rows($result) > 0) {
		$i=0;
		while($row = mysqli_fetch_array($result)) {

		$adno = $row['adno'];
		$unitcode = $row['unitcode'];
		$adtypecode = $row['adtypecode'];
		$adtitle = $row['adtitle'];
		$adprice = $row['adprice'];

		$displaylist .= "
			<tr>
			    <td><a href='update-process.php?adno=".$adno."'>".$adno."</a></td>
				<td>".$unitcode."</td>
				<td>".$adtypecode."</td>
				<td>".$adtitle."</td>
				<td align='right'>".number_format($adprice,2)."</td>
	    	</tr>
	    	";
		$i++;
		}
	}
	else
	{
	    $displaylist = "
			<tr>
			    <td class='nothingtoshow' colspan='5'><br><br>😯 No result found.<br><br></td>
	    	</tr>
	    	";
	}
}

$mysql2 = "SELECT * FROM tblads WHERE adno='".$_GET['adno']."'";
$result2 = mysqli_query($conn,$mysql2);
$row2= mysqli_fetch_array($result2);

///////// EDIT PAGE ///////// 
if(count($_POST)>0) {
	$mysqlupdate = "
		UPDATE tblads set 
			adno='".$_POST['adno']."', 
			adtypecode='".$_POST['adtypecode']."', 
			unitcode='".$_POST['unitcode']."', 
			adtitle='".$_POST['adtitle']."' ,
			addescription='".$_POST['addescription']."',
			adprice='".$_POST['adprice']."',
			addate='".$_POST['addate']."',
			WHERE adno='".$_POST['adno']."'
		";

	mysqli_query($conn,$mysqlupdate);
	$message = "Record Modified Successfully";
}

?>


<html>
<head>
<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo $mainpath; ?>eastwoodcondo.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="margin-top: 10px;">

<div class="container">
	<div class="row">
		<div class='col-sm-12'>
			<form action="admin.php">
			  <label for="unitcode">Unit Code:</label>
			  <input type="text" id="unitcode" name="unitcode" value="">
			  <input type="submit" value="Submit">
			</form> 
		</div>
	</div>

	<div class="row pt-5 my-5 border">	
		<div class='col-sm-12'>
			<table class="table table-bordered">
				<tr>
				    <th>Ad No</th>
					<th>Unit Code</th>
					<th>Ad Type</th>
					<th>Ad Title</th>
					<th>Ad Price</th>
				</tr>
				<?php echo $displaylist; ?>
			</table>
		</div>
	</div>


<?php if($adno!="") { ?>
	<div class="row">
		<div class='col-sm-3'>&nbsp;</div>
		<div class='col-sm-6'>		
			<form name="frmUser" method="post" action="">
			<div><?php if(isset($message)) { echo $message; } ?></div>
			<table class="table table-bordered">
				<tr>
					<td>Ad No</td>
					<td><input type="hidden" name="adno" class="txtField" value="<?php echo $row['adno']; ?>">
						<input type="text" name="adno"  value="<?php echo $row['adno']; ?>"></td>
				</tr>
				<tr>
					<td>Ad Type:</td>
					<td><input type="text" name="adtypecode" class="txtField" value="<?php echo $row['adtypecode']; ?>"></td>
				</tr>
				<tr>
					<td>Unit Code</td>
					<td><input type="text" name="unitcode" class="txtField" value="<?php echo $row['unitcode']; ?>"></td>
				</tr>
				<tr>
					<td>Ad Title</td>
					<td><input type="text" name="adtitle" class="txtField" value="<?php echo $row['adtitle']; ?>"></td>
				</tr>
				<tr>
					<td>Ad Desciption</td>
					<td><input type="text" name="addescription" class="txtField" value="<?php echo $row['addescription']; ?>"></td>
				</tr>
				<tr>
					<td>Ad Price</td>
					<td><input type="text" name="adprice" class="txtField" value="<?php echo $row['adprice']; ?>"></td>
				</tr>
				<tr>
					<td>Ad Date</td>
					<td><input type="text" name="addate" class="txtField" value="<?php echo date_format($date,"Y-m-d H:i:s"); ?>"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit" value="Submit" class="buttom"></td>
				</tr>
			</table>
			</form>
		</div>
		<div class='col-sm-3'>&nbsp;</div>
	</div>
<?php } ?>

</body>
</html>