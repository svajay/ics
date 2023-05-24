<?php
include('dbc.php');
include('header.php');

$id= $_GET['gid'];
echo $sql = "SELECT * from events_album where id=$id order by id desc";
$query = mysqli_query($con, $sql);
$row=mysqli_fetch_assoc($query);
?>

            <!--WHAT’S HAPPENiNG-->
            <div class="placementgallerywrap padd100 pb-0 mt-4">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mb-3 mt-5">
                            <div class="topheading wow animate__ animate__fadeInUp">
                                <h2><?php echo $row['title']; ?></h2>
                                <!--<p>Lorem Ipsum is simply dummy text. </p>-->
                            </div>
                        </div>
                    
                        <div class="col-lg-12">
                            <div class="gallerygridwrap mt-5">
                                <?php
                                $id= $_GET['gid'];
                                $sql = "SELECT * from events_album_images where albumid=$id order by id desc";
                                $query = mysqli_query($con, $sql);
                                while($row=mysqli_fetch_assoc($query)){
                                  ?>
                                <div class="itemsgrid wow animate__ animate__fadeInUp">
                                    <a class="spotlight" href="images/events_upload/<?php echo $row['image']; ?>" data-fancybox="gallery">
                                        <div class="imgwp">
                                            <img src="images/events_upload/<?php echo $row['image']; ?>" alt="Event"/>
                                        </div>
                                    </a>
                                </div>
                                
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

     <?php include('footer.php'); ?>
