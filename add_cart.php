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
    
 $select_Quantity = mysqli_query($conn, "SELECT Quantity FROM product WHERE name = '$product_name'");
    $product_data = mysqli_fetch_assoc($select_Quantity);
    
    if ($product_quantity <=  $product_data['Quantity']) { 
      
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id' AND user_name = '$user_name' AND user_phone = '$user_phone' AND user_email = '$user_email'");
    
        if (mysqli_num_rows($select_cart) > 0) {
                echo "<script>alert('Product already added to cart!')</script>";
        }  else {

       mysqli_query($conn, "INSERT INTO `cart`(user_name, user_id, user_phone, user_email, name, price, image, quantity,status) VALUES ('$user_name', '$user_id', '$user_phone', '$user_email', '$product_name', '$product_price', '$product_image', '$product_quantity','pending')") or die('query failed');
     echo "<script>alert('Product added to cart!')</script>";
      header('location:shop.php');
   }
    }
    
    else {
        echo "<script>alert('stock Not available!')</script>";
    }
}

 
  
if(isset($_POST['update_cart'])){
    $update_quantity = $_POST['cart_quantity'];
    $update_id = $_POST['cart_id'];
    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE id = '$update_id'");
    $fetch_cart = mysqli_fetch_assoc($cart_query);
    $product_name = $fetch_cart['name'];
    
    // Fetch product quantity from product table
    $select_Quantity = mysqli_query($conn, "SELECT Quantity FROM product WHERE name = '$product_name'");
    $product_data = mysqli_fetch_assoc($select_Quantity);
    
    if ($update_quantity <= $product_data['Quantity']) {
        mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
        $message[] = 'Cart quantity updated successfully!';
    } else {
        echo "<script>alert('Stock not available!')</script>";
    }
}

if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
    header('location:add_cart.php'); 
    exit(); 
}
    
    

if(isset($_GET['remove'])){
  $remove_id = $_GET['remove'];
  mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
  // header('location:index.php'); 
}
 
    
if(isset($_GET['delete_all'])){
  mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id' AND user_phone = '$user_phone' AND user_email = '$user_email'") or die('query failed');
//   header('location:index.php');
}


 ?>
 
 
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="css1/style.css">
<link rel="stylesheet" href="style.css">

   <title>Shopping Cart</title>

   <!-- custom css file link  -->
       <style>
      .cart {
    bottom: 15px;
    position: relative;
    left: 18px;
    color:blue;
   }
    </style>

</head>
<body style = "background-image:none">
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

<div class="container" style = "padding-bottom:0px;">

<div class="shopping-cart">

   <h1 class="heading" style = "margin-top:120px">shopping cart</h1>

   <table style = "margin-top: 70px;">
      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>action</th>
         <th>total price</th>
         <th>status</th>
      </thead>
      <tbody>
      <?php
         $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_name = '$user_name'AND user_id = '$user_id'AND user_phone = '$user_phone'AND user_email = '$user_email'") or die('query failed');
         $grand_total = 0;
         if(mysqli_num_rows($cart_query) > 0){
            while($fetch_cart = mysqli_fetch_assoc($cart_query)){
      ?>
         <tr>
            <td><img src="images/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td ><?php echo $fetch_cart['name']; ?></td>
            <td>$<?php echo $fetch_cart['price']; ?>/-</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                  <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                  <input type="submit" name="update_cart" value="update" class="option-btn">
               </form>
            </td>
            <td><a href="add_cart.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('remove item from cart?');">remove</a></td>
            <td>$<?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
             <td><?php echo $fetch_cart['status']; ?></td>
         </tr>
      <?php
         $grand_total += $sub_total;
            }
         }else{
            echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
         }
      ?>
      <tr class="table-bottom">
         <td colspan="4">grand total :</td>
        <td><a href="index.php" class="btn" >Add TO Shopping</a></td>
         <td>$<?php echo $grand_total; ?>/-</td>
         <td>   <div class="cart-btn">  
      <a href="" onclick="" class="btn <?php ?>"> Confirm to Payment</a>
   </div></td>
      </tr>
   </tbody>
   </table>
</div>
    </div>
    
    <footer class="footercon">
<div class="footermain">
    <div class="logocon">
    <img src="images/logo-retina.png" alt="" class="logof">
    </div>
    <div class="ulconaiter">
        <a href="" class="ftxt" style = "font-weight:bold;">FAQ</a>
        <a href="" class="ftxt" style = "font-weight: bold;">Virtual Shopping</a>
        <a href="" class="ftxt" style = "font-weight: bold;">Shipping & Returns</a>
        <a href="" class="ftxt" style = "font-weight: bold;">Create Your Jewelry</a>
        <a href="" class="ftxt" style = "font-weight: bold;">Ring Sizer</a>
        <a href="" class="ftxt" style = "font-weight: bold;">Stores</a>
    </div>
    <div class="socialf">
        <i class="fa-brands fa-facebook" style = "font-weight: bold;color: black;"></i>
        <i class="fa-brands fa-instagram" style = "font-weight: bold;color: black;"></i>
        <i class="fa-brands fa-twitter" style = "font-weight: bold;color: black;"></i>
        <i class="fa-brands fa-youtube" style = "font-weight: bold;color: black;"></i>
    </div>
    <div class="copy" style = "color:black">Copyright © 2024 Jewellery Store</div>
</div>
</footer>
</body>
</html>
