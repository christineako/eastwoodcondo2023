<?php
	include_once '../eastwoodcondoconnect.php';

$date=date_create();
date_timestamp_get($date);


if(count($_POST)>0) {
mysqli_query($conn,"UPDATE tblads set adno='" . $_POST['adno'] . "', adtypecode='" . $_POST['adtypecode'] . "', unitcode='" . $_POST['unitcode'] . "', adtitle='" . "', adtitle='" . $_POST['adtitle'] . "' ,addescription='" . $_POST['addescription'] . "' ,adprice='" . $_POST['adprice'] . "' ,addate='" . $_POST['addate'] . "' WHERE adno='" . $_POST['adno'] . "'");
$message = "Record Modified Successfully";
}

$result = mysqli_query($conn,"SELECT * FROM tblads WHERE adno='" . $_GET['adno'] . "'");
$row= mysqli_fetch_array($result);
?>

<html>
<head>
<title>Update Employee Data</title>
</head>
<body>
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
<a href="test_update.php">Test Update</a>
</div>
Ad No: <br>
<input type="hidden" name="adno" class="txtField" value="<?php echo $row['adno']; ?>">
<input type="text" name="adno"  value="<?php echo $row['adno']; ?>">
<br>
Ad Type: <br>
<input type="text" name="adtypecode" class="txtField" value="<?php echo $row['adtypecode']; ?>">
<br>
Unit Code :<br>
<input type="text" name="unitcode" class="txtField" value="<?php echo $row['unitcode']; ?>">
<br>
Ad Title:<br>
<input type="text" name="adtitle" class="txtField" value="<?php echo $row['adtitle']; ?>">
<br>
Ad Desciption:<br>
<input type="text" name="addescription" class="txtField" value="<?php echo $row['addescription']; ?>">
<br>
Ad Price :<br>
<input type="text" name="adprice" class="txtField" value="<?php echo $row['adprice']; ?>">
<br>
Ad Date:<br>
<input type="text" name="addate" class="txtField" value="<?php echo date_format($date,"Y-m-d H:i:s"); ?>">
<br>
<input type="submit" name="submit" value="Submit" class="buttom">

</form>
</body>
</html>