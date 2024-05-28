
To resolve the issue where the "Product already added to cart!" message is not being displayed properly and potentially not redirecting as expected, you can make the following adjustments:

Move the Redirect: Instead of echoing the alert message directly, you can set a session variable to hold the message and then redirect to the same page. This way, after redirecting, you can display the alert message.

Check for Existing Product in Cart: You need to modify the condition where you check if the product is already in the cart. Currently, you're only checking if any rows are returned from the query. You should specifically check if the product for the current user is already in the cart.

Here's the modified code:

php
Copy code
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
            $_SESSION['cart_message'] = "Product already added to cart!";
        } else {
            mysqli_query($conn, "INSERT INTO `cart`(user_name, user_id, product_id, user_phone, user_email, name, price, image, quantity, status) VALUES ('$user_name', '$user_id', '$product_id', '$user_phone', '$user_email', '$product_name', '$product_price', '$product_image', '$product_quantity', 'pending')") or die('query failed');
            $_SESSION['cart_message'] = "Product added to cart!";
        }
    } else {
        $_SESSION['cart_message'] = "Stock not available!";
    }
    header('location: shop.php');
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="icon" type="image/x-icon" href="images/favicon-pc1ivx190hoxzdk4un0g8tacdtry621xy6fr4gnjyi.png">
    <title>Shop Jewellery_Page</title>
    
    <style>
    .btn {
    width: 100%;
    padding: 10px 20px;
    border-radius: 10px;
    border: 1px solid black;
    background-color: white;
    transition: all 0.5s ease;
    cursor: pointer;
   }
   .btn:hover{
       color: #db9662;
       background-color:black;
   }
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
<div class="bgco">
    <div class="bgcotainer">
        <div class="filtercont">
        <form action="">
            <select name="'sorting" id="sort">
                <option value="default">default sortig</option>
                <option value="syp">sort by popularity</option>
                <option value="sbr">sort by avrage rating</option>
                <option value="sbl">sort by latest</option>
                <option value="sblh">sort by low to high</option>
                <option value="sbhl">sort by high to low</option>
            </select>
        </form>
    </div>
    
    
    <div class="imagebox">
          <?php
                $select_product = mysqli_query($conn, "SELECT * FROM `product`") or die('query failed');
                if(mysqli_num_rows($select_product) > 0){
                    while($fetch_product = mysqli_fetch_assoc($select_product)){
                ?>
        
        <form method="post" class="box">
        <div class="heightconaiter">
        <img src="images/<?php echo $fetch_product['image']; ?>" class="ten" name = "image">
            <div class="err1">Earring</div>
            <div class="err2"><?php echo $fetch_product['name']; ?></div>
            <div class="err3"><i class="fa-solid fa-dollar-sign"></i><?php echo $fetch_product['price']; ?>/-</div>
             <input type="hidden" min="1" name="product_quantity" value="1">
             <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
             <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
             <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
             <input type="submit" value="Add to Cart" name="add_to_cart" class = "btn">
             
        </div>
         </form>
         <?php }
         }  ?>
    </div>
    
    
    
    <div class="nomore">NO MORE PRODUCTS TO SHOW</div>
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