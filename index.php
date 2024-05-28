<?php
include 'dbconnect.php';
session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_phone = $_SESSION['user_phone'];
$user_email = $_SESSION['user_email'];

if (isset($_POST['add_to_cart'])) {
    
    if (!isset($user_name) || !isset($user_id) || !isset($user_phone) || !isset($user_email)) {
    header('location:from_page/login_page.php');
    exit;
}
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

    $select_id_query = mysqli_query($conn, "SELECT id FROM product WHERE name = '$product_name'");
    $select_id_row = mysqli_fetch_assoc($select_id_query);
    $product_id = $select_id_row['id'];

    $select_Quantity_query = mysqli_query($conn, "SELECT Quantity FROM product WHERE name = '$product_name'");
    $product_data = mysqli_fetch_assoc($select_Quantity_query);
    $available_quantity = $product_data['Quantity'];

    if ($product_quantity <=  $available_quantity) { 
        $select_cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'");
        if (mysqli_num_rows($select_cart_query) > 0) {
            echo "<script>alert('Product already added to cart!')</script>";   
        } else {
            mysqli_query($conn, "INSERT INTO `cart`(user_name, user_id, product_id, user_phone, user_email, name, price, image, quantity, status) VALUES ('$user_name', '$user_id', '$product_id', '$user_phone', '$user_email', '$product_name', '$product_price', '$product_image', '$product_quantity', 'pending')") or die('query failed');
            echo "<script>alert('Product added to cart!')</script>";
            header('location:shop.php');
            exit;
        }
    } else {
        echo "<script>alert('Stock not available!')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="images/favicon-pc1ivx190hoxzdk4un0g8tacdtry621xy6fr4gnjyi.png">
    <title>Home Jewellery_Page</title>
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
        <div class="logo"><img src="images/logo-retina.png" alt="" class="logoname" ></div>
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
    <div class="herosectionconatiner">
        <div class="heroleft"> 
        <pre>Jewelry of
Precious Craft</pre></div>
            <div class="because">Because every piece caries a precious story</div>
            <button class="explore">--> EXPLORE NOW</button>
    </div>
    <div class="bgco">
    <h2 class="name"> Shop by Category</h2>
    <div class="viewall"><a href="" class="viewall">--view all</a></div>
    <div class="jewe">
        <div class="earrings">
            <a href="shop.php" target="_blank"><img src="images/categorie-001-600x600-removebg-preview.png" alt="" class="earrone"></a>
            <div class="errmain">   
            <div class="errname"><a href="" class="errname">EARRINGS</a></div>
            <div class="product"><a href="" class="product"><sub>5</sub>Products</a></div>
        </div>
        </div>
        <div class="earrings">
            <a href="shop.php" target="_blank"><img src="images/categorie-003-600x600-removebg-preview.png" alt="" class="earrone"></a>
            <div class="errmain">
            <div class="errname"><a href="" class="errname">NECKLACES</a></div>
            <div class="product"><a href="" class="product"><sub>3</sub>Products</a></div>
        </div>
        </div>
        <div class="earrings">
            <a href="shop.php" target="_blank"><img src="images/categorie-02-600x600-removebg-preview.png" alt="" class="earrone"></a>
            <div class="errmain">
            <div class="errname"><a href="" class="errname">RINGS</a></div>
            <div class="product"><a href="" class="product"><sub>5</sub>Products</a></div>
        </div>
        </div>
    </div>
    <div class="textpmain">
    <div class="textp">We make high-quality, handcrafted jewelry for over a decade, having the same passion & values!</div>
    <div class="textpm">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
    <div class="readconsitanter">
    <button class="readmore">--> READ MORE </button>
    </div>
    </div>
    <div class="newarrival">New Arrivals</div>
    <div class="viewall"><a href="" class="viewall">--view all</a></div>
    <div class="arrivalconatiner">
        <div class="imagenine">
            <div class="heightn">
    <a href= "shop.php"><img src="images/product-010-600x600.jpg" alt="" class="productnine"></a>
            <div class="p1">Earrings</div>
            <div class="s1">Some Golden Rings</div>
            <div class="pr1">325.00</div>
             </div>
             <div class="hrightn">
        <a href= "shop.php"><img src="images/product-005-600x600.jpg" alt="" class="productnine"></a>
        <div class="p1">Earrings</div>
        <div class="s1">Some Golden Rings</div>
        <div class="pr1">325.00</div>
    </div>
        <div class="hrightn">
      <a href= "shop.php"><img src="images/product-009-600x600.jpg" alt="" class="productnine"></a>
        <div class="p1">Earrings</div>
        <div class="s1">Some Golden Rings</div>
        <div class="pr1">325.00</div>
    </div>
    </div>
    </div>
<div class="exquisite">
    <div class="leftbox">
        <div class="imagebox">
        <img src="images/img-02.png" alt="" height="130px" class="kadda">
    </div>
        <div class="textk">
        <h2 class="ka2">Exquisite Jewelry for Everyone</h2>
        <h3 class="discover">Discover our awesome rings collection</h3>
        <div class="dsce">
        <div class="dicoverbutton">-- DISCOVER THE COLLECTION</div>
    </div>
    </div>
    </div>
    </div> 
    <div class="testimonialsconatiner">
        <div class="test1">Testimonials</div>
        <div class="test2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua veniam...</div>
    </div>
    <div class="productconatiner">
        <h2 class="name">Featured Products</h2>
        <div class="viewall"><a href="" class="viewall">--view all</a></div>
    </div>
    <div class="imageconatiner">
        <div class="heightg">
       <a href= "shop.php"> <img src="images/product-14-600x600.jpg" alt="" class="oneimage"></a>
        <div class="p1">Earrings</div>
        <div class="s1">Some Golden Rings</div>
        <div class="pr1">325.00</div>
    </div>
        <div class="heightg">
      <a href= "shop.php">  <img src="images/product-13-600x600.jpg" alt="" class="oneimage"></a>
        <div class="p1">Rings</div>
        <div class="v2">Verra Diamond Ring</div>
        <div class="pr1">325.00</div>
    </div>
    </div>
    <h2 class="name">Precious Metals</h2>
    <div class="metalcontainer">
        <div class="heightmain">
        <img src="images/bg-005.jpg" alt="" class="bg005">
        <div class="solidgold">14k solid Golden</div>
        <div class="solidinfo">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.</div>
        </div>
    <div class="heightmain">
        <img src="images/bg-006.jpg" alt="" class="bg005">
        <div class="solidgold">14k solid Golden</div>
        <div class="solidinfo">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.</div>
    </div>
    <div class="heightmain">
        <img src="images/bg-007.jpg" alt="" class="bg005">
        <div class="solidgold">14k solid Golden</div>
        <div class="solidinfo">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.</div>
    </div>
    </div>
    <div class="handcrafted">
        <div class="handyleft">
        <img src="images/img-012.jpg" alt="" class="bg01">
    </div>
    <div class="handyright">
        <div class="heightmain">
            <div class="highqu">High-Quality, Handcrafted Jewelry</div>
            <div class="colletion">Discover our bracelets collection</div>
            <div class="ring3">
                <img src="images/img-003.png" alt="" class="th">
            </div>
            <div class="buttonflex">
            <button class="exploreq"> EXPLORE </button>
        </div>
        </div>
    </div>
    </div> 
    <div class="discountconatiner">
        <div class="saleflex">
        <img src="images/sale-icon.png" alt="" class="sell">
    </div>
        <div class="discountname">25% Discount on Making Charges</div>
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