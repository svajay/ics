<?php
include ('dbc.php');

  $year= $_POST['year'];
 $month= $_POST['month'];

$Years = "SELECT year FROM press ORDER BY id DESC LIMIT 1;";
$Q1=mysqli_query($con,$Years);
$y= mysqli_fetch_array($Q1);
$latest_year =  $y['year'];

if($year != $latest_year)
{
 $sql = "select * from press where year='".$year."' AND month='".$month."' order by id desc";
}
else 
{
 $sql= "select * from press where year='".$year."' AND month='".$month."' order by id desc"; 
}
$sqlquery=mysqli_query($con,$sql);
?>
<div class="row mt-5">
<?php while($Query=mysqli_fetch_array($sqlquery)){?>

                        <div class="col-lg-3 col-md-4">
                            <div class="pressimgwrap mg_image" id="press_year">
                                <a class="spotlight" href="images/press-releases/<?php echo $Query['image'];  ?>" data-fancybox="gallery">
                                    <img src="images/press-releases/<?php echo $Query['image'];  ?>" alt="Press News"/>
                                    <strong><?php echo $Query['name']; ?></strong>
                                    <span><?php echo $Query['date']; ?></span>
                                </a>
                            </div>
                        </div>
                        
                        <?php } ?>
                        </div>