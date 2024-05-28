<?php
include ('dbcon.php'); 
session_start();
$email= $_GET['email'];
//  echo "$email";
if(isset($_POST['register_btn'])) {
   $email= $_GET['email'];
    $password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

    $check_email_query = "SELECT * FROM register WHERE email='$email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if(mysqli_num_rows($check_email_query_run) > 0) {
        
        $update_query = "UPDATE register SET password='$password',confirm_password = '$confirm_password' WHERE email='$email'";
        $update_query_run = mysqli_query($con, $update_query);

        if($update_query_run) {
            echo "Password updated successfully";
          echo "<script>window.open('login_page.php','_self')</script>";

            

        } else {
            echo "Failed to update password";
        }
    }
    else{
        echo"somrthing Error";
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

 <body>
  <section> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> 
   <div class="signin"> 
    <div class="content"> 
     <h2>Update Password</h2> 

     <form class="form" method="POST" id="registrationForm" onsubmit="return validateForm()" action="">
      <div class="inputBox"> 
       <input type="password"  id="password" name= "password" required> <i>Password</i> 
      </div> 

      <div class="inputBox"> 
       <input type="password" id="confirm_password" name= "confirm_password"  onkeyup="checkPassword()"  required> <i>Confirm Password</i> 
      </div> 
 


      <div class="inputBox"> 
       <input type="submit" value="Login" onclick="submitForm()" name="register_btn"> 
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