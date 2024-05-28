<?php
include 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="about.css">
    <link rel="icon" type="image/x-icon" href="images/favicon-pc1ivx190hoxzdk4un0g8tacdtry621xy6fr4gnjyi.png">
    <title>About Jewellery_Page</title>
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
    <div class="mainco">
    <div class="mainconainer">
    <div class="threeringcont">
        <img src="images/img-003.png" alt="" class="threering">
    </div>
    <h2 class="hady">We make high-quality, handcrafted jewelry for over a decade, having the same passion & values!</h2>
    <div class="lorem">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore. Et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur lorem ipsum. </div>
    </div>
    </div>
    <div class="mainco2">
        <div class="maincontainer2">
            <div class="mainleftconainter">
                <div class="leftcont">
                <div class="mainleftcont">Constantly creating new collections and lorem ipsum sit</div>
                <div class="fair">FAIR PRICING</div>
                <div class="fairinfo">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</div>
            </div>
            </div>
            <div class="mainrightconaiter">
                <div class="right">
                    <img src="images/bg-04.jpg" alt="" class="bg04">
                </div>
            </div>
        </div>
        <div class="preciousmetal">Precious Metals</div>
        <div class="metalcontainer">
            <div class="heightmain">
            <img src="images/bg-005.jpg" alt="" class="bg5">
            <div class="solidgold">14k solid Golden</div>
            <div class="solidinfo">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.</div>
        </div>
        <div class="heightmain">
            <img src="images/bg-006.jpg" alt="" class="bg5">
            <div class="solidgold">14k solid Golden</div>
            <div class="solidinfo">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.</div>
        </div>
        <div class="heightmain">
            <img src="images/bg-007.jpg" alt="" class="bg5">
            <div class="solidgold">14k solid Golden</div>
            <div class="solidinfo">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.</div>
        </div>
        </div>
    </div>
    <div class="main3">
        <div class="mainconat">
            <div class="per">
                <img src="images/sale-icon.png" alt="" class="sellicon">
            </div>
            <div class="makingcharges">25% Discount on Making Charges</div>
            <div class="m1">Lorem ipsum dolor sit amet, consectetur
                adipisicing elit, sed do.</div>
                <div class="vistcont">
                <button class="visit">--VISIT OUR STORES</button>
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