<?php 
include('dbc.php');
include('header.php');
 ?>

            <div class="banner">
                <div class="overlay"></div>
                <div class="contactbanner"></div>
                <div class="mbcontactbanner"></div>
                <!--<img src="images/contact-us-banner.jpg" alt="Contact Banner"/>-->
                <!--<video id="video" autoplay loop muted playsinline>-->
                <!--    <source src="video/homepage.mp4" type="video/mp4" />-->
                <!--</video>-->
                <div class="caption container"><div class="sub_heading_0"></div>
                    <h1 class="wow animate__ animate__fadeInUp">
                       GET READY FOR THE REAL WORLD
                    </h1>
                </div>
            </div>
            <!--banner-->
            
            <!--formdt-->
            <div class="fromwapper padd100 pb-1">
                <div class="container">
                    <div class="row">
                        <div class="offset-lg-1 col-lg-10 col-md-12">
                            <div class="conhead wow animate__ animate__fadeInUp">
                                <h2>LET'S CONNECT</h2>
                                <p>Fill in the below details, and our counselor will get in touch with you at the earliest</p>
                            </div>
                            
                            <div class="formdetails wow animate__ animate__fadeInUp relv">
                                 <p id="success"></p>
                               <form method="POST" action="contactform.php" id="contactform" >
  
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="fname" placeholder="First Name*" onkeypress="return  onlyAlphabets(event)">
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="lname" placeholder="Last Name*" onkeypress="return  onlyAlphabets(event)">
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="email" placeholder="Email*">
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="phone" placeholder="Phone Number*" onkeypress="return isNumberKey(event)" maxlength="10" >
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="customcon">
                                                    <select class="form-control js-example-basic-single" name="state" onChange="changedistrict(this.value)">
                                                        <option value="">Select State*</option>

                                                        <?php
                                                        $sql="SELECT * FROM state";
                                                        $q=mysqli_query($conn, $sql);
                                                        while($row=mysqli_fetch_assoc($q)){
                                                        ?>

                                                        <option value="<?php echo $row['StCode']; ?>" ><?php echo $row['StateName']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="customcon">
                                                    <select class="form-control js-example-basic-single" name="city" id="city">
                                                        <option value="">Select City*</option>
                                                       
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="customcon">
                                                    <select class="form-control js-example-basic-single" name="course" onChange="changecourse(this.value)">
                                                      <option value="">Select Course*</option>
                                                      <option value="1">ADAM (Advance Diploma in Automotive Mechatronics) with Mercedes Benz</option>
                                                      <option value="2">B. Pharm (PCI Approved)</option>
                                                      <option value="3">B. Tech and M. Tech Integrated Course (CSE)</option>
                                                      <option value="4">B.Tech</option>
                                                      <option value="5">D.Pharm</option>
                                                      <option value="6">M. Pharm (PCI Approved)</option>
                                                      <option value="7">M.Tech</option>
                                                      <option value="8">MBA</option>
                                                      <option value="9">MCA</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="customcon">
                                                    <select class="form-control js-example-basic-single" name="specialisation" id="specialisation">
                                                        <option value="">Select Specialisation*</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6 col-md-6">
                                            <!--<div class="form-group">-->
                                            <!--    <div class="form-check">-->
                                            <!--      <input class="form-check-input" type="checkbox" id="gridCheck">-->
                                            <!--      <label class="form-check-label" for="gridCheck">-->
                                            <!--        I agree to receive information regarding my enquiry for NIET-->
                                            <!--      </label>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <div class="form-group">
                                               <div class="s-input s-input--rounded">
                                                    <input type="checkbox" id="filter-rated6" name="customCheckbox" value="yes">
                                                    <label for="filter-rated6">
                                                      <i class="aria-hidden">&nbsp;</i>
                                                        I agree to receive information regarding my enquiry for NIET.
                                                    </label>
                                                  </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <input type="submit" name="submit" class="btns" value="Submit">
                                                <div class="svginputconsub">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40">
                                                        <defs></defs>
                                                        <g id="Layer_2" data-name="Layer 2">
                                                            <g id="Layer_1-2" data-name="Layer 1">
                                                                <circle class="cls-1" cx="20" cy="20" r="19.75"></circle>
                                                                <polyline class="cls-2" points="16.87 14.62 22.73 20 16.87 25.38"></polyline>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <div class="contactmap padd100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 pr-0">
                            <div class="map">
                               <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14030.25955442678!2d77.4912393!3d28.46253!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x93d3b775d7d5ff76!2sNiet%20Pharmacy%20Institute%20C%20Block!5e0!3m2!1sen!2sin!4v1626953997446!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe> 
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pl-0">
                            <div class="locationadd">
                                <div class="addtext">
                                    <strong>LOCATION</strong> 
                                    <p class="colortext">Noida Institute of Engineering and Technology (Pharmacy Institute)<br/> 19, Knowledge Park-II, <br/>Institutional Area, Greater Noida <br/> (UP) -201306</p>
                                </div>
                               
                               <div class="addtext">
                                   <strong>CONTACT NUMBER</strong>
                                   <p>For other Queries No: <a href="tel:+91-844 838 4611"> +91-844 838 4611</a></p>
                                   <p>Admission Help line No:<br/> <a href="tel:+91-801 050 0700"> +91-801 050 0700</a> <span> | </span> <a href="tel:+91-844 838 4601">+91-844 838 4601</a></p>
                                   <p> Director: <br> <a href="tel:+919871773644">+91 9871773644</a> <span> | </span>  <a href="+918700196914">+91 8700196914</a>
                                     <p> Dean: <br> <a href="tel:+919871963644">+91 9871963644</a>
                              </div>
                               
                               <div class="addtext">
                                   <strong>EMAIL ADDRESS</strong>
                                   <p>Director: <a href="mailto:directorpharmacy@niet.co.in">directorpharmacy@niet.co.in</a></p>
                                   <p>Dean: <a href="mailto:deanpharmacy@niet.co.in">deanpharmacy@niet.co.in</a></p>
                                   <p>Admission: <a href="mailto:admission@niet.co.in"> admission@niet.co.in</a></p>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

         
<?php include('footer.php'); ?>



<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  
<script type="text/javascript">

$(document).ready(function(){
    
       $.validator.addMethod("customemail", 
        function(value, element) {
        return /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value);}, 
        "Please enter valid email" );
         $.validator.addMethod("customphone", function(value, element) {
        return /^\d{10}$/.test(value);}, 
        "Please enter 10 digit mobile number");
       
    var insertForm = $("#contactform");
   
    var validator = insertForm.validate({
        
       rules:{
            fname :{ required : true },
            lname :{ required : true },
            email : { required : true, customemail : true },
            phone :{ required : true, customphone: true },
            state :{ required : true },
            city :{ required : true },
            course :{ required : true },
            specialisation : { required : true},
            customCheckbox :{ required : true },
            
            
            
        },
        messages:{
            fname :{ required : "This field is required" },
            nlame :{ required : "This field is required" },
            email : { required : "This field is required", customemail : "Please enter valid email" },
            phone :{ required : "This field is required", customphone: "Please enter 10 digit phone number" },
            state : { required : "This field is required"},
            city :{ required : "This field is required" },
            course :{ required : "This field is required" },
            specialisation :{ required : "This field is required" },
            customCheckbox :{ required : "This field is required" },
        },
        submitHandler: function(insertForm) {
            $('input[name="submit"]').attr('disabled','true');
        
            $.ajax({
                url: insertForm.action,
                type: insertForm.method,
                data: $(insertForm).serialize(),
                success: function(response) {
                    
                   // var data = JSON.parse(response);
                     $("#contactform").trigger("reset");
                    $('#success').html('Thanks for contacting us.');
                   
                
                    
                }            
            });
        }
    });
});

function changedistrict(stateid)
{
  
    $.ajax({
            type: "POST",
            url: "getdistricts.php",
            data: {stateid: stateid},
            cache: false,
            success: function(html){
                //alert(html);
                $("#city").html(html);
            } 
        });
}
  
  function changecourse(courseid)
{
  
    $.ajax({
            type: "POST",
            url: "getspecialisation.php",
            data: {courseid: courseid},
            cache: false,
            success: function(html){
                //alert(html);
                $("#specialisation").html(html);
            } 
        });
}

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}  
function onlyAlphabets(evt) {
        var charCode;
        if (window.event)
            charCode = window.event.keyCode;  //for IE
        else
            charCode = evt.which;  //for firefox
        if (charCode == 32) //for &lt;space&gt; symbol
            return true;
        if (charCode > 31 && charCode < 65) //for characters before 'A' in ASCII Table
            return false;
        if (charCode > 90 && charCode < 97) //for characters between 'Z' and 'a' in ASCII Table
            return false;
        if (charCode > 122) //for characters beyond 'z' in ASCII Table
            return false;
        return true;
    }  
</script>
