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
$next_id=1; 
if (($_SERVER['REQUEST_METHOD']=="POST")){

  if(!empty($_POST['product'])&&!empty($_POST['description'])&&!empty($_POST['price'])){

  $med_data=json_decode(file_get_contents('med.json'),true);
  if(!empty ($med_data)==true){
  foreach($med_data as $product){
    if(!empty($product['number'])==true){      
      $next_id++;    
         }
  }
  }
  $img=$_POST['img'];
  $name=filter_input(INPUT_POST,'product',FILTER_SANITIZE_STRING);
  $discribtion=filter_input(INPUT_POST,'description',FILTER_SANITIZE_STRING);
  $price=filter_input(INPUT_POST,'price',FILTER_SANITIZE_STRING);
  if(!empty($name)&&!empty($discribtion)&&!empty($price)&&!empty($next_id)){
  $med_data[]=array("number"=>$next_id,"name"=>$name,"describtion"=>$discribtion,"price"=>$price,"image"=>$img,"pindex"=>null);
  file_put_contents('med.json',json_encode($med_data,JSON_PRETTY_PRINT));  
  } 
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="medicine.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="png/x-icon" href="Sي (1).png">
  <title>SيDILITI - Edit Med</title>
</head>
<body>
<nav class="navbar">
  <li type="none" style="display: inline-block;"><a href="index.php" title="Home"><img class="imgsize2" src="ezgif.com-resize (1).gif" alt="Sيdiliti"></a></li>
    <li type="none" class="liorder"><a href="index.php"><button class="navbutton" title="Home">Home</button></a></li>
    <li type="none" class="liorder"><a href="account.php"><button class="navbutton" title="Account"><?php echo $aname?></button></a></li>
    <?php
      if($data['type']=="ADMIN")
          {
            echo'<li type="none" class="liorder"><a href="addaccount.php"><button class="navbutton">Add Acccount</button></a></li>';
          }
    ?>
    <li type="none" class="liorder"><a href="cart.php"><button class="navbutton" title="Cart">Cart</button></a></li>
    <li type="none" class="liorder"><a href="logout.php"><button class="navbutton" title="Log Out">log out</button></a></li>
  </nav>
  <main>
    <div class="itemContainer">
        <a href="addmedicine.php"><button class="addbtn" title="Add Medicine">ADD =></button></a>
      <!-- <div class="item">
        <img src="panadol.png" alt="Item Image" title="Item Image">
        <hr>
        <h2>Panadol extra</h2>
        <p>This is an example of the item description bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla </p>
        <p>Price: 35.00<sup>EGP</sup></p>
        <a href="medicine edit.php"><button  class="edit-med" title="Edit">Edit</button></a>
        <button class="delete-med" title="Delete">Delete</button>
      </div> -->
      <?php
      if($med_data=json_decode(file_get_contents('med.json'),true)){
          foreach($med_data as $prod)
        {
          echo'<div class="item">';
          echo'<img src="'.strval($prod["image"]).'" alt="Item Image" title="Item Image">';
          echo'<hr>';
          echo'<h2>'.$prod["name"].'</h2>';
          echo'<p>'.$prod["describtion"].'</p>';
          echo'<p>Price:'.$prod["price"].'<sup>EGP</sup></p>';
          echo'<a href="medicine edit.php" title="Edit"><button  class="edit-med" title="Edit">Edit</button></a>';
          echo'<button class="delete-med" title="Delete" title="Delete">Delete</button>';
          echo'</div>';
        }
      }
      ?>
      </div>
    </div>
  </main>
  <footer>
      <li type="none" class="liorder"><button class="fbutton" onclick="help()" title="Help">Help</button></li>
      <div class="footer">&copy; 2023 Pharmacy E-commerce Website<div>
    </footer>
</body>
</html>
<script>
  function help(){
  alert("If you need any help ask here SيDILITI@gmail.com");
}
</script>