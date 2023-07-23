
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

}
  $img=$_POST['img'];
  $name=filter_input(INPUT_POST,'product',FILTER_SANITIZE_STRING);
  $discribtion=filter_input(INPUT_POST,'description',FILTER_SANITIZE_STRING);
  $price=filter_input(INPUT_POST,'price',FILTER_SANITIZE_STRING);
  if(!empty($name)&&!empty($discribtion)&&!empty($price)&&!empty($next_id)){
    $new_data=file_get_contents("med.json"); 
    $new_med_data=json_decode($new_data,true);
  $new_med_data[0]=["number"=>'1',"name"=>$name,"describtion"=>$discribtion,"price"=>$price,"image"=>$img];
  $new_data = json_encode($new_med_data, JSON_PRETTY_PRINT);
  $new_med_data=file_put_contents("med.json",$new_data);
 header('location: medicine.php');
  }
  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="medicine edit.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="png/x-icon" href="Sي (1).png">
  <title>SيDILITI - Edit Med</title>
</head>
<body>
  <nav class="navbar">
    <li type="none" style="display: inline-block;"><a href="index.php" title="Home"><img class="imgsize2" src="ezgif.com-resize (1).gif" alt="Sيdiliti"></a></li>
    <?php
        if($data!=null)
        {
        echo'<li type="none" class="liorder"><a href="account.php"><button class="navbutton">'.$aname.'</button></a></li>';
        if($data['type']=="ADMIN")
        {
            echo'<li type="none" class="liorder"><a href="addaccount.php"><button class="navbutton">Add Acccount</button></a></li>';
        }
        if($data['type']=="Pharmacist"||$data['type']=="ADMIN")
        {
            echo'<li type="none" class="liorder"><a href="medicine.php"><button class="navbutton">Add Medicine</button></a></li>';
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
  <main>
    <form class="formstyle" method="post" name="edit" action="<?php echo $_SERVER["PHP_SELF"] ;?>" >
      <div class="label">Edit Medicine</div>
      <div class="med-inputs">
        <div class="med-name">
          <input type="text" id="medName" class="box" placeholder="Name" name="product" title="Name">
        </div>
        <div class="med-description">
          <input type="text" id="medDes" class="box" placeholder="Description" name="description">
        </div>
        <div class="med-price">
          <input type="text" id="medPrice" class="box" placeholder="Price" name="price">
        </div>
        <div class="image">
          <input class="image" type="file" id="medImage" name="img">
        </div>
      </div>
      <input type="submit" class="sbtn" title="Add" value="Add Medicine">
    </form>
  </main>
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