<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="account2.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="png/x-icon" href="Sي (1).png">
  <title>SيDILITI - ACCOUNT</title>
</head>
<body>
  <nav class="navbar">
  <li type="none" style="display: inline-block;"><a href="index.php" title="Home"><img class="imgsize2" src="ezgif.com-resize (1).gif" alt="Sيdiliti"></a></li>
        <li type="none" class="liorder"><a href="index.php"><button class="navbutton" title="Home">Home</button></a></li>
        <li type="none" class="liorder"><a href="LOGIN.php"><button class="navbutton" title="Sign in">Sign in</button></a></li>
        <li type="none" class="liorder"><a href="signup2.php"><button class="navbutton" title="Sign Up">Sign up</button></a></li>
        <li type="none" class="liorder"><a href="cart.php"><button class="navbutton" title="Cart">Cart</button></a></li>
  </nav>
<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['phone'])) {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (strlen($password) < 8) {
            echo ("Password should contain at least 8 digits");
        }
        $phone = filter_input(INPUT_POST, 'phone');
        if (strlen($phone) != 11) {
            echo ("Phone number must contain 11 digits");
        }
        $adress=filter_input(INPUT_POST,'adress');
        if(strlen($adress)>100 || strlen($adress)<5)
        {
            echo"this adress is invalid";
        }
        
        $data=file_get_contents("user.json");
        $user_data=json_decode($data,true);
        $user_data[$_SESSION['index']]=["NO."=>$_SESSION['index'],"firstname"=>$_SESSION['First name'],"lastname"=>$_SESSION['Last name'],"UserName"=>$username,"EMail"=>$email,"PassWord"=>$password,"UserTYpe"=>$_SESSION['type'],"tel"=>$phone,"adress"=>$adress,"city"=>$_SESSION['City'],"unique-id"=>$_SESSION['id']];
        $data = json_encode($user_data, JSON_PRETTY_PRINT);
        file_put_contents('user.json', $data);
    }
}
?>

    <div class="box">
        <div class="header">Account Information</div>   
        <form method="POST" action="">
            <table>
                <tr><th>ID</th><td class="id"><?php echo($_SESSION['id'])?></td></tr>
                <tr><th>USERNAME</th><td><input type="text" value="<?php echo($_SESSION["username"])?>" title="UserName"></td></tr>
                <tr><th>FIRST-NAME</th><td><input type="text" value="<?php echo($_SESSION["First name"])?>" title="First-Name"></td></tr>
                <tr><th>LAST-NAME</th><td><input type="text" value="<?php echo($_SESSION["Last name"])?>" title="Last-Name"></td></tr>
                <tr><th>EMAIL</th><td><input type="email" value="<?php echo($_SESSION["email"])?>" title="Email"></td></tr>
                <tr><th>PHONE</th><td><input type="tel" value="<?php echo($_SESSION["number"])?>" title="Number"></td></tr>
                <tr><th>ADDRESS</th><td><input type="text" value="<?php echo($_SESSION["Adress"])?>" title="Address"></td></tr>
                <tr><th>CITY</th><td><input type="text" value="<?php echo($_SESSION["City"])?>" title="City"></td></tr>
                <tr><th>USER-TYPE</th><td><input type="text" value="<?php echo($_SESSION["type"])?>" title="Type"></td></tr>
            </table>
            <a href="account.php"><input type="submit" class="submit-btn" value="Submit" title="Submit"></a>
        </form>
    </div>
    <footer>
        <li type="none" class="liorder"><button class="fbutton" onclick="help()" title="Help">Help</button></li>
        <div class="footer">&copy; 2023 Pharmacy E-commerce Website<div>
    </footer>
</body>
</html>
