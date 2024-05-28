<?php

include ('dbcon.php');
session_start();


// $sended_otp = $_SESSION['otp'];
//  $here_name = $_SESSION['name'];

// echo" here $sended_otp is otp & name is $here_name";



  

// if(isset($_POST['submit_otp'])){
//     $receive_otp = $_POST['otp'];
//     $sended_otp = $_SESSION['otp'];
    
//     if($receive_otp == $sended_otp ){
//          echo "<script>alert('Thank you For Add OTP')</script>";
//     }
//     else{
//           echo "<script>alert('OTP Not Same sended OTP : $sended_otp  & Enter OTP : $receive_otp ')</script>";
//     }
    
// }



if(isset($_POST['register_btn'])) 
{
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

 $_SESSION['name'] = $_POST['name'];
 $here_name = $_SESSION['name'];


 $check_email_query= "SELECT email FROM register WHERE email='$email'LIMIT 1";
 $check_email_query_run = mysqli_query($con,$check_email_query);


 if(mysqli_num_rows($check_email_query_run) > 0) 
 {
  $_SESSION['status'] = "Email Id already Exists";
  echo "<script>alert('Email Already Registerd')</script>";
  echo "<script>window.open('email_otp.php','_self')</script>";
 }





else {
    $query =  "INSERT INTO register (name, phone, email,password,confirm_password) VALUES ('$name', '$phone', '$email','$password','$confirm_password')";
     
     $result = mysqli_query($con, $query);
     
     if($result){

            $data = [
                'status' => 201,
                'message' => $requestMethod. 'Customer Created Successfully',
            ];
            echo json_encode($data);

        }
        else {
            $data = [
                'status' => 500,
                'message' => $requestMethod. 'Internal Server Error',
            ];
            echo json_encode($data);
        }
}
 $receiver_email = $_POST['email'];



     
    // $fotp = rand(111111111111111111,999999999999999999);
    // $sotp = rand(111111111111111111,999999999999999999);
    // $totp = rand(111111111111111111,999999999999999999);
    // $footp = rand(111111111111111111,999999999999999999);
    // $otp = 0;
    // $otp .= $fotp .=$sotp .=$totp .=$footp;
      $otp = rand(111111, 999999);
    $_SESSION['otp'] = $otp;
    $sended_otp = $_SESSION['otp'];
    
    $body = "";
    $body .= '<h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;"> '.$otp.' </h2>';
    
    
    if(true){
        $to = " $receiver_email";
        $subject = "Email Verification";
        $headers = "From:maruticlass81@gmail.com". "\r\n";;
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $message = " $otp";
        
        if(mail($to, $subject, $message, $headers)){
            echo "<script>alert('Mail send to sended Otp : $sended_otp')</script>";
             echo "<script>window.open('otp.php','_self')</script>";
        }else{
            echo "<script>alert('Mail not send')</script>";
        }	
         
    }
    
}


?>

<!doctype html>
<html lang="en"> 
 <head> 
  <meta charset="UTF-8"> 
  <title>CodePen - Animated Login Form using Html &amp; CSS Only</title> 
  <link rel="stylesheet" href="./style.css"> 
 </head> 

 <body> <!-- partial:index.partial.html --> 
  <section> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> 
   <div class="signin"> 
    <div class="content"> 
     <h2>registration page</h2> 
 <form class="form" id="registrationForm" onsubmit="return validateForm()" method="POST">
      <div class="inputBox"> 
       <input type="text"  id="name" name= "name"  required> <i>Username</i> 
      </div> 

      <div class="inputBox"> 
        <input type="email" id="email"  name= "email"  required> <i>email</i> 
       </div> 

      <div class="inputBox"> 
        <input type="tel" id="phone" name= "phone"   pattern="[6-9]{1}[0-9]{9}" title="Enter Valid Mobile"  required> <i>Number</i> 
       </div>  

      <div class="inputBox"> 
       <input type="password"  id="password" name= "password"  required> <i>Password</i> 
      </div> 

      <div class="inputBox"> 
        <input type="password"  id="confirm_password" name= "confirm_password"   onkeyup="checkPassword()" required> <i> Confirm Password</i> 
        <!--<span id="message" style="color:red"></span>-->
       </div> 

      <div class="links"><a href="login_page.php">login page</a> 
      </div> 

      <div class="inputBox"> 
       <input type="submit" value="submit" onclick="submitForm()" name="register_btn">
      </div> 
</form>
    </div> 
   </div>

  </section>
  
   <script>
    
 function checkPassword() {
  var password = document.getElementById("password").value;
  var confirm_password = document.getElementById("confirm_password").value;
  var message = document.getElementById("message");

  if (password !== confirm_password) {
    message.innerHTML = "Passwords do not match";
  } else {
    message.innerHTML = "";
  }
}
    
//  function submitForm() {
//   if (validateForm()) {
//     window.location.href = "login_page.php";
//   } else {
//     alert("Please fix errors in the form.");    
//   }
// }



function validateForm() {
  var password = document.getElementById("password").value;
  var confirm_password = document.getElementById("confirm_password").value;


  if (password !== confirm_password) {
    document.getElementById("message").innerHTML = "Passwords do not match";
    return false;
  }

  return true;
}


    </script>
  
  
 </body>
</html>