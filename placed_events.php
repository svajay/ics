<?php 

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
  include("dbc.php");
   $limit = 7;
   $page = $_POST['page'] ? $_POST['page'] : 1;
   $offset = ($page - 1) * $limit;
    //echo "<br><pre>"; print_r($_POST); echo "</pre>"; die();
   
    
    $sql="SELECT * from events_album where id in (33389,33388,33383,33381,33380,33355,33351,33349,33348,33347,33346,33345) order by id desc";
    $res = mysqli_query($con,$sql);
    $total = mysqli_num_rows($res);
    
   $sql = "SELECT * from events_album where id in (33389,33388,33383,33381,33380,33355,33351,33349,33348,33347,33346,33345) order by id desc LIMIT ".$offset.", ".$limit;
    $query = mysqli_query($con, $sql);
    $data = array();
    while($row=mysqli_fetch_assoc($query)){
    //     $data[] = $row;
    // }
    // $drow = array_chunk($data, 7);
    // for($i=0; $i<count($drow); $i++){
    // echo "<br><pre>"; print_r($row); echo "</pre>";
  ?>
  
        <div class="itemsgrid wow animate__ animate__fadeInUp">
            
                <div class="imgwp">
                    <img src="images/events_upload/<?php echo $row['cover_pic']; ?>" alt=""/>
                </div>
                <div class="gallerytext">
                    <strong><b><?php echo $row['title']; ?></b></strong>
                    <!--<p>Lorem Ipsum is simply dummy text. </p>---->
                    <span>
                        <div class="svgbtn">
                            <?php if($row['id']==33384){ ?>
                            <a href="images/events_upload/Conference-brochure.pdf"> 
                            <?php } else if($row['id']==33385){ ?>
                            <!--<a href="images/events_upload/RUN-FOR-HER-A-MARATHON.pdf"> --->
                            
                            <a href="images/events_upload/run-for-her-report.pdf">
                            <?php } else{?>
                            <a href="inner-events.php?gid=<?php echo $row['id']; ?>">
                                <?php } ?>
                            <svg viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                                <defs></defs>
                                <g data-name="Layer 2" id="Layer_2">
                                   <g data-name="Layer 1" id="Layer_1-2">
                                      <circle class="cls-1" cx="20" cy="20" r="19.75"></circle>
                                      <polyline class="cls-2" points="16.87 14.62 22.73 20 16.87 25.38"></polyline>
                                   </g>
                                </g>
                             </svg>
                             </a>
                         </div>
                    </span>
                </div>
        </div>
        
  
  
  <?php  } ?>
  
        
         <div class="loadmore loeddd" onClick="loadmr('1');">
             <?if($total > ($page * $limit)):?>
                            <div class="svgbtn">
                               <a class="wow animate__ animate__fadeInUp load-button" href="javascript:;" style="visibility: visible; animation-name: fadeInUp;">LOAD MORE 
                                   <svg viewbox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                                        <defs></defs>
                                        <g data-name="Layer 2" id="Layer_2">
                                          <g data-name="Layer 1" id="Layer_1-2">
                                            <circle class="cls-1" cx="20" cy="20" r="19.75"></circle>
                                            <polyline class="cls-2" points="16.87 14.62 22.73 20 16.87 25.38"></polyline>
                                          </g>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                            
        <?php endif;?>
        </div>

