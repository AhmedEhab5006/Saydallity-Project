<?php
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addmedicine.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar">
        <li type="none" style="display: inline-block;"><a href="index.php" title="Home"><img class="imgsize2" src="ezgif.com-resize (1).gif" alt="Sيdiliti" title="Home"></a></li>
        <?php
            if($data!=null)
            {
            echo'<li type="none" class="liorder"><a href="account.php"><button class="navbutton" title="Account">'.$aname.'</button></a></li>';
            if($data['type']=="ADMIN")
            {
                echo'<li type="none" class="liorder"><a href="addaccount.php"><button class="navbutton" title="Add Account">Add Acccount</button></a></li>';
            }
            if($data['type']=="Pharmacist"||$data['type']=="ADMIN")
            {
                echo'<li type="none" class="liorder"><a href="medicine.php"><button class="navbutton" title="Add Medicine">Add Medicine</button></a></li>';
            }
            echo'<li type="none" class="liorder"><a href="cart.php"><button class="navbutton" title="Cart">Cart</button></a></li>';
            echo'<li type="none" class="liorder"><a href="logout.php"><button class="navbutton" title="Log out">log out</button></a></li>';
            }
            else
            {
            echo'<li type="none" class="liorder"><button class="navbutton" title="Guest">Guest</button></li>';
            echo'<li type="none" class="liorder"><a href="LOGIN.php"><button class="navbutton" title="Sign In">Sign in</button></a></li>';
            }
            ?>
    </nav>
    <form class="formstyle" method="post" action="medicine.php">
      <div class="label">ADD Medicine</div>
      <div class="med-inputs">
        <div class="med-name">
          <input type="text" id="medName" class="box" placeholder="Name" name="product" title="Name">
        </div>
        <div class="med-description">
          <input type="text" id="medDes" class="box" placeholder="Description" name="description" title="Description">
        </div>
        <div class="med-price">
          <input type="text" id="medPrice" class="box" placeholder="Price" name="price" title="Price">
        </div>
        <div class="image">
          <input class="image" type="file" id="medImage" name="img">
        </div>
      </div>
      <input type="submit" class="sbtn" title="Add" value="Add Medicine">
    </form>
    <footer>
      <li type="none" class="liorder"><button class="fbutton" onclick="help()" title="Help">Help</button></li>
      <div class="footer">&copy; 2023 Pharmacy E-commerce Website<div>
    </footer>
</body>
</html>
