<?php
$aname="Guest";
$data=null;
session_start();
if(!empty($_SESSION))
{
  $data=($_SESSION);
  if(!empty($_SESSION['username']))
  {
    $aname=$_SESSION['username'];
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="index.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="png/x-icon" href="Sي (1).png">
  <title>SيDILITI - HOME</title>
  <script src="search.js"></script>
</head>
<body>
  <nav class="navbar">
        <li type="none" style="display: inline-block;"><img class="imgsize2" src="ezgif.com-resize (1).gif" alt=""></li>
        
        <?php
        if($data!=null)
        {
          echo'<li type="none" class="liorder"><a href="account.php"><button class="navbutton">'.$aname.'</button></a></li>';
          if($data['type']=="ADMIN")
          {
            echo'<li type="none" class="liorder"><a href="addaccount.php"><button class="navbutton">Add Acccount</button></a></li>';
          }
          echo'<li type="none" class="liorder"><a href="cart.php"><button class="navbutton">Cart</button></a></li>';
          echo'<li type="none" class="liorder"><a href="logout.php"><button class="navbutton">log out</button></a></li>';
        }
        else
        {
          echo'<li type="none" class="liorder"><button class="navbutton">Guest</button></li>';
          echo'<li type="none" class="liorder"><a href="LOGIN.php"><button class="navbutton">Sign in</button></a></li>';
        }
        ?>
        
  </nav>
  <section class="main">
    <article class="welcomehaeders">
        <header class="welcome">Welcome to Our Pharmacy E-commerce Website!</header>
        <p class="headerp">We offer a wide range of quality products at affordable prices. Shop with us today!</p>
    </article>
      <input type="search" placeholder="Search for a product ....................?" id="search" class="box" onkeyup = "search()">
      <hr>
    </div>
    <div class="itemContainer">
          <div class="item">
            <img src="panadol.png" alt="Item Image">
            <hr>
            <h2>Panadol extra</h2>
            <p>This is an example of the item description bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla </p>
            <p>Price: 35.00<sup>EGP</sup></p>
            <button class="add-to-cart">Add to Cart</button>
          </div>
          <div class="item">
            <img src="brufen.png" alt="Item Image">
            <hr>
            <h2>brufen</h2>
            <p>Item Description</p>
            <p>Price: 76.50<sup>EGP</sup></p>
            <button class="add-to-cart">Add to Cart</button>
          </div>
          <div class="item">
            <img src="perfectil.png" alt="Item Image">
            <hr>
            <h2>perfectil</h2>
            <p>Item Description</p>
            <p>Price: 42.50<sup>EGP</sup></p>
            <button class="add-to-cart">Add to Cart</button>
          </div>
          <div class="item">
            <img src="path/to/image.jpg" alt="Item Image">
            <hr>
            <h2>Item Name</h2>
            <p>Item Description</p>
            <p>Price: xx.xx<sup>EGP</sup></p>
            <button class="add-to-cart">Add to Cart</button>
          </div>
          <div class="item">
            <img src="path/to/image.jpg" alt="Item Image">
            <hr>
            <h2>Item Name</h2>
            <p>Item Description</p>
            <p>Price: xx.xx<sup>EGP</sup></p>
            <button class="add-to-cart">Add to Cart</button>
          </div>
          <div class="item">
            <img src="path/to/image.jpg" alt="Item Image">
            <hr>
            <h2>Item Name</h2>
            <p>Item Description</p>
            <p>Price: xx.xx<sup>EGP</sup></p>
            <button class="add-to-cart">Add to Cart</button>
          </div>
</section>
    <footer>
      <li type="none" class="liorder"><button class="fbutton" onclick="help()">Help</button></li>
      <div class="footer">&copy; 2023 Pharmacy E-commerce Website<div>
    </footer>
</body>
</html>
<script>
  function help(){
  alert("If you need any help ask here SيDILITI@gmail.com");
}
</script>