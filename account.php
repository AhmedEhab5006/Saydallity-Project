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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="png/x-icon" href="Sي (1).png">
    <link rel="stylesheet" href="account.css">
    <title>Configure-Account</title>
</head>
<body>
    <nav class="navbar">
        <li type="none" style="display: inline-block;"><a href="index.php" title="Home"><img class="imgsize2" src="ezgif.com-resize (1).gif" alt="Sيdiliti"></a></li>
        <?php
            if($data!=null)
            {
            echo'<li type="none" class="liorder"><a href="index.php"><button class="navbutton" title="Home">Home</button></a></li>';
            if($data['type']=="ADMIN")
            {
                echo'<li type="none" class="liorder"><a href="addaccount.php"><button class="navbutton" title="Add Account">Add Acccount</button></a></li>';
            }
            if($data['type']=="Pharmacist"||$data['type']=="ADMIN")
            {
                echo'<li type="none" class="liorder"><a href="medicine.php"><button class="navbutton" title="Add Medicine">Add Medicine</button></a></li>';
            }
            echo'<li type="none" class="liorder"><a href="cart.php"><button class="navbutton" title="Cart">Cart</button></a></li>';
            echo'<li type="none" class="liorder"><a href="logout.php"><button class="navbutton" title="Log Out">log out</button></a></li>';
            }
            else
            {
            echo'<li type="none" class="liorder"><button class="navbutton" title="Guest">Guest</button></li>';
            echo'<li type="none" class="liorder"><a href="LOGIN.php"><button class="navbutton" title="Sign In">Sign in</button></a></li>';
            }
            ?>
    </nav>
    <div class="box">
        <div class="header">Account Information</div>
        <table>
            <tr><th>ID</th><td><?php echo($_SESSION["id"])?></td></tr>
            <tr><th>USERNAME</th><td><?php echo($_SESSION["username"])?></td></tr>
            <tr><th>FIRST-NAME</th><td><?php echo($_SESSION["First name"])?></td></tr>
            <tr><th>LAST-NAME</th><td><?php echo($_SESSION["Last name"])?></td></tr>
            <tr><th>EMAIL</th><td><?php echo($_SESSION["email"])?></td></tr>
            <tr><th>PHONE</th><td><?php echo($_SESSION["number"])?></td></tr>
            <tr><th>ADDRESS</th><td><?php echo($_SESSION["Adress"])?></td></tr>
            <tr><th>CITY</th><td><?php echo($_SESSION["City"])?></td></tr>
            <tr><th>USER-TYPE</th><td><?php echo($_SESSION["type"])?></td></tr>
        </table>
        <a href="account2.php" title="Edit Info"><button class="edit-btn">Edit Information</button></a>
    </div>
    <footer>
        <li type="none" class="liorder"><button class="fbutton" onclick="help()" title="Help">Help</button></li>
        <div class="footer">&copy; 2023 Pharmacy E-commerce Website<div>
    </footer>
</body>
</html>