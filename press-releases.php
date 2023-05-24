<?php 
$page="press-releases";
include("dbc.php");
include('header.php'); 

$Years = "SELECT year,month FROM press ORDER BY id DESC LIMIT 1;";
$Q1=mysqli_query($con,$Years);
$y= mysqli_fetch_array($Q1);
$latest_year =  $y['year'];
$latest_month =  $y['month'];

 $sql="select * from press where year='".$latest_year."' AND month ='".$latest_month."' order by id desc";
$Q=mysqli_query($con,$sql);
?>

            <div class="banner">
                <div class="overlay"></div>
                <div class="pressbanner"></div>
                <div class="mbpressbanner"></div>
                <div class="caption container">
                    <div class="sub_heading_0"></div>
                    <h1 class="wow animate__ animate__fadeInUp">
                       Press Releases
                    </h1>
                </div>
            </div>
            <!--banner-->
            
            <!--WOMEN EMPOWERMENT COMMITTEE-->
            <div class="infrasectionwrap padd100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="infrainnertextwrap">
                                <div class="topheading">
                                    <h2>Press News</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="contentsidewrap">
                                        <div class="pressselect">
                                        <select class="form-control selectBtn" id="press_year" >
                                            
                                <?php 
                                 
                                $s='select DISTINCT year from press order by year desc';
                                $q = mysqli_query($con,$s);
                                while($row_data=mysqli_fetch_assoc($q)) { 
                                    echo "<option value='$row_data[year]'>$row_data[year]</option>"; 
                                } ?>
                                </select>
                                        </div>
                                    </div> 
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="pressselect">
                                <select class="form-control selectBtn"  id="press_month" >
                                <?php 
                                 
                                $mon='select DISTINCT month from press order by month desc';
                                $q2 = mysqli_query($con,$mon);
                                while($row_data1=mysqli_fetch_assoc($q2)) { 
                                    echo "<option value='$row_data1[month]'>$row_data1[month]</option>"; 
                                } ?>
                                </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5" id="hidedata">
                    <?php while($Query=mysqli_fetch_array($Q)){?>

                        <div class="col-lg-3 col-md-4" >
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
                        <div class="row mt-5">
                        <div id="pressdata"></div>
                    </div>
                </div>
            </div>
            
<?php include('footer.php'); ?>   
<script type="text/javascript">
    $('#press_year, #press_month').change(function () {
      
        var year = $("#press_year" ).val();
        var month = $("#press_month" ).val();
            $.ajax({
                type: "POST",
                url: "press_result.php",
                data:{year:year,month:month},
                success: function(data){
                      $('#hidedata').hide();
                    $("#pressdata").html(data);
                }
                   
              });
        
    });
</script>  
