<?php
include 'dbc.php';
//echo "<pre>"; print_r($_POST);
$sql = "SELECT * FROM `specialisation` WHERE `CourseCode` = '".$_POST['courseid']."'";
$q=mysqli_query($conn, $sql);
echo '<option value="">Select Specialisation*</option>';
while($row=mysqli_fetch_assoc($q)){
?>

<option value="<?php echo $row['CourseCode']; ?>" ><?php echo $row['specialisationName']; ?></option>
<?php } ?>