<?php
   include('dbc.php');
    global $conn;
    
    $fname= mysqli_real_escape_string($conn, $_POST['fname']);   
    $lname= mysqli_real_escape_string($conn, $_POST['lname']);   
    $email= mysqli_real_escape_string($conn, $_POST['email']);
    $phone= mysqli_real_escape_string($conn, $_POST['phone']);
    $state= mysqli_real_escape_string($conn, $_POST['state']);   
    $city= mysqli_real_escape_string($conn, $_POST['city']);   
    $course= mysqli_real_escape_string($conn, $_POST['course']);
    $specialisation= mysqli_real_escape_string($conn, $_POST['specialisation']);


   $query = "INSERT INTO nietpharmacycontact (fname, lname, email, phone, state, city, course, specialisation, created) VALUES ('$fname', '$lname', '$email', '$phone', '$state', '$city', '$course', '$specialisation', current_timestamp())";  

 if(mysqli_query($conn,$query)){
        
     require_once('PHPMailer/PHPMailer_v5.1/class.phpmailer.php'); //library added in download source.

            $mail= new PHPMailer();

// message
            $body='
<html>
<head>
<title>Footer Form Info</title></head>
<body>
<br /><br />
<table border="1" bordercolor="#FFFFFF">
<tr>
<td> Name</td> <td> '.$fname.'  '.$lname.' </td>
</tr>
<tr>
<td> Email ID</td> <td> '.$email.' </td>
</tr>
<tr>
<td> Contact</td> <td> '.$phone.' </td>
</tr>
<tr>
<td> State</td> <td> '.$state.' </td>
</tr>
<tr>
<td> City</td> <td> '.$city.' </td>
</tr>
<tr>
<td> Course</td> <td> '.$course.' </td>
</tr>
<tr>
<td> Specialisation</td> <td> '.$specialisation.' </td>
</tr>
</table>
</body>
</html>
';
            //$body= eregi_replace("[\]",'',$body);
            $mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)1
            // 1 = errors and messages
            // 2 = messages only
            $mail->SMTPAuth   = true;                  // enable SMTP authentication
            $mail->SMTPSecure = "tls";                 // sets the prefix to the servier
            $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
            $mail->Port       = 587;                   // set the SMTP port for the GMAIL server
            $mail->Username   = "7827719965test@gmail.com";  // GMAIL username
            $mail->Password   = "7827719965";            // GMAIL password
            $mail->SetFrom('admission@niet.co.in', 'NIET');
            $mail->AddReplyTo('admission@niet.co.in', 'NIET');
            $mail->Subject    = "nietpharmacy.co.in(contact)";
            $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
            $mail->MsgHTML($body);
            $address = "directorpharmacy@niet.co.in";
            $mail->AddAddress($address);
            if(!$mail->Send()) {
                header('Location: index.php?m=15');
            } else {

                $mail2= new PHPMailer();

// message
                $body2='
<html>
<head>
<title>Thank you for contacting NIET</title>
</head>
<body>
Dear '.$fname.',
<br><br>
Thanks for contacting us. We will get back to you shortly.
<br><br>
Regards,
<br>
Team NIET
</body>
</html>
';

                $mail2->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)1
                // 1 = errors and messages
                // 2 = messages only
                $mail2->SMTPAuth   = true;                  // enable SMTP authentication
                $mail2->SMTPSecure = "tls";                 // sets the prefix to the servier
                $mail2->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
                $mail2->Port       = 587;                   // set the SMTP port for the GMAIL server
                $mail2->Username   = "7827719965test@gmail.com";  // GMAIL username
                $mail2->Password   = "7827719965";            // GMAIL password
                $mail2->SetFrom('directorpharmacy@niet.co.in', 'NIET');
                $mail2->AddReplyTo('directorpharmacy@niet.co.in', 'NIET');
                $mail2->Subject    = "Thank you for contacting NIET";
                $mail2->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
                $mail2->MsgHTML($body2);
                $mail2->AddAddress($email);
                $mail2->Send();
                echo "true";
                
            }
        }

?>