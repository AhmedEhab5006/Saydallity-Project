
<?php
include 'index.html';
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
        
  
<?php
include 'index.html';
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
        
  
