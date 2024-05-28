<?php
include 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="conatct.css">
    <link rel="icon" type="image/x-icon" href="images/favicon-pc1ivx190hoxzdk4un0g8tacdtry621xy6fr4gnjyi.png">
    <title>Contact Jewellery_Page</title>
      <style> 
       .cart {
    bottom: 15px;
    position: relative;
    left: 18px;
    color:blue;
   }
    </style>
</head>
<body>
    <header>
      <nav>
        <i class="fa-solid fa-bars" onclick="document.getElementById('sidebar').style.display='block'" ondblclick="document.getElementById('sidebar').style.display='none'"></i>
        <ul class="main">
            <li><a href="index.php" style="color: #db9662;">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <div class="logo"><img src="images/logo-retina.png" alt="" class="logoname"></div>
        <div class="navright">
           <a href= "from_page/login_page.php"><i class="fa-solid fa-user" title="User"></i></a>
                   <?php 
    $select_cart =  mysqli_query($conn, "SELECT COUNT(*) as count FROM `cart` WHERE user_email = '$user_email'");
    $cart_data = mysqli_fetch_assoc($select_cart);
    $cart_count = $cart_data['count'];
    ?>
 <span class = "cart"><?php echo $cart_count; ?></span><a href="add_cart.php"><i class="fa-solid fa-cart-shopping" title="Shopping"> </i></a>
            <i class="fa-solid fa-info" title="info"></i>
        </div>
    </nav>
</header>
<div class="mainul">
    <ul id="sidebar">
        <li><a href="index.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul>
</div>
<div class="coantactcont">
<div class="contact">Contact Us</div>
<div class="have">Have a question? Feel free to get in touch with us, we’ll get back to you shortly.</div>
</div>
<div class="formconaiter">
    <div class="formleft">
        <div class="left">
            <h5 class="conatacd">CONTACT DETAILS</h5>
            <div class="phone"><i class="fa-solid fa-phone"></i>   +1 12345890</div>
            <div class="email"><i class="fa-solid fa-envelope"></i>  js@gmail.com</div>
            <div class="apart"><i class="fa-regular fa-building"></i>  123 Fifth Avenue, New York, NY 10160</div>
            <div class="follow">FOLLOW US</div>
            <div class="followconat">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-youtube"></i>
            </div>
        </div>
    </div>
    <div class="formright">
        <div class="right">
            <div class="form">
                <label for="" style="margin-left: 15px; font-weight: bolder; font-size: 1.2rem;" class="namef">Name</label>
                <div class="nameconatiner">
                    <input type="text" class="txt1">
                    <input type="text" class="txt2">
                </div>
                <label for="" style="margin-left: 15px; font-weight: bolder; font-size: 1.2rem;">Email</label>
                <div class="emailconatiner">
                    <input type="email" class="email">
                </div>
                <label for="" style="margin-left: 15px; font-weight: bolder; font-size: 1.2rem;">Message</label>
                <div class="msgconainer">
                    <input type="text" class="msg">
                </div>
                <div class="submitconainer">
                <input type="submit" class="submit">
            </div>
            </div>
        </div>
    </div>
</div>
<div class="usefulname">Useful Links</div>
<div class="usefulconaiter">
    <div class="usefulbox1">
        <div class="usefulinner">
            <div class="handshakeconat">
            <i class="fa-solid fa-handshake"></i>
        </div>
        <div class="part">Partnerships</div>
        <div class="interest">Interested in a partnership with us? </div>
        <div class="buttonconatiner">
        <button class="apply">APPLY HERE</button>
        </div>
        </div>
    </div>
    <div class="usefulbox1">
        <div class="usefulinner">
            <div class="handshakeconat">
                <i class="fa-solid fa-question"></i>
        </div>
        <div class="part">FAQ</div>
        <div class="interest">Most questions can be answered here. </div>
        <div class="buttonconatiner">
        <button class="apply">GO TO FAQ</button>
        </div>
        </div>
    </div>
    <div class="usefulbox1">
        <div class="usefulinner">
            <div class="handshakeconat">
                <i class="fa-solid fa-location-dot"></i>
        </div>
        <div class="part">Store Locations </div>
        <div class="interest">Find your nearest Jewelry store. </div>
        <div class="buttonconatiner">
        <button class="apply">FIND STORE</button>
        </div>
        </div>
    </div>
</div>
<footer class="footercon">
    <div class="footermain">
        <div class="logocon">
        <img src="images/logo-retina.png" alt="" class="logof">
        </div>
        <div class="ulconaiter">
            <a href="" class="ftxt">FAQ</a>
            <a href="" class="ftxt">Virtual Shopping</a>
            <a href="" class="ftxt">Shipping & Returns</a>
            <a href="" class="ftxt">Create Your Jewelry</a>
            <a href="" class="ftxt">Ring Sizer</a>
            <a href="" class="ftxt">Stores</a>
        </div>
        <div class="socialf">
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-youtube"></i>
        </div>
        <div class="copy">Copyright © 2024 Jewellery Store</div>
    </div>
    </footer>
</body>
</html>