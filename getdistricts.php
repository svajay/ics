<?php
include 'dbc.php';
//echo "<pre>"; print_r($_POST);
$sql = "SELECT * FROM `district` WHERE `StCode` = '".$_POST['stateid']."'";
$q=mysqli_query($conn, $sql);
echo '<option value="">Select City*</option>';
while($row=mysqli_fetch_assoc($q)){
?>

<option value="<?php echo $row['DistCode']; ?>" ><?php echo $row['DistrictName']; ?></option>
<?php } ?>