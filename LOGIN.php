<?php
// if(($_server["REQUEST_METHOD"])=="POST")
// {
// echo "hello";
// }
// echo $_SERVER["PHP_SELF"];


// $name=filter_input(INPUT_POST,'Username');
// if(empty($name))
// {
//     $Username_err="plese enter a valid Username";
// }
// elseif(strlen($name)<8&&strlen($name)>=1)
// $Username_err="Username is too short";

// $Password=filter_input(INPUT_POST,'Pass');
// if(empty($Password))
// {
//     $Pass_err="plese enter a valid password";
// }
// elseif(strlen($Password)<8&&strlen($Password)>=1)
// $Pass_err="Password is too short";

// else if(!isset($name))
// {
//     $name="";
// }
// $session_start;
// if()


?>

<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    $data=json_decode(file_get_contents('user.json'),true);
    if(!empty($_POST['Username'])&&!empty($_POST['Pass']))
    {

        $USERNAME=filter_input(INPUT_POST,'Username',FILTER_SANITIZE_STRING);
        $PASSWORD=filter_input(INPUT_POST,'Pass',FILTER_SANITIZE_SPECIAL_CHARS);
        if(strlen($USERNAME)<8)
        {
            $Username_err="username must be more than 8 characters";
        }
        if(strlen($PASSWORD)<8)
        {
            $Pass_err="password must be more than 8 characters";
        }
        foreach($data as $user)
        {
            if($user['UserName']==$USERNAME)
             {
                if(password_verify($PASSWORD,$user['PassWord']))
                 {
                    header('location: index.php');
                    $Pass_err=null;
                    $Username_err=null;
                    session_start();
                    $_SESSION['index']=$user['NO.'];
                    $_SESSION['First name']=$user['firstname'];
                    $_SESSION['Last name']=$user['lastname'];
                    $_SESSION['City']=$user['city'];
                    $_SESSION['type']=$user['UserTYpe'];
                    $_SESSION['id']=$user['unique-id'];
                    $_SESSION['username']=$user['UserName'];
                    $_SESSION['email']=$user['EMail'];
                    $_SESSION['number']=$user['tel'];
                    $_SESSION['Adress']=$user['adress'];
                }
            else
                {
                    $Pass_err="Wrong Password";
                }
                }
            }
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
    <link rel="stylesheet" href="login.css">
    <title>SيDILITI - SIGN IN</title>
</head>
 
<body>
    <nav class="navbar">
        <li type="none" style="display: inline-block;"><a href="index.php"><img class="imgsize2" src="ezgif.com-resize (1).gif" alt="Sيdiliti"></li>
        <li type="none" class="liorder"><a href="index.php"><button class="navbutton">Home</button></a></li>
        <li type="none" class="liorder"><a href="signup2.php"><button class="navbutton">Sign up</button></a></li>
        <!-- <li type="none" class="liorder"><a href=""><button class="navbutton">Configure Account</button></a></li> -->
    </nav>  
    <article>
        <form class="formstyle"name="signin"action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
            <img type="x-icon"id="imgsize"src="Untitled video - Made with Clipchamp (5).gif" alt="">
            <!-- <input id="signinbox"type="text" name="Username" required class="box" placeholder="Enter Your Username" value="<//?php echo htmlspecialchars($name) ?>"> -->
            <input id="signinbox"type="text" name="Username" required class="box" placeholder="Enter Your Username">
            <p class="errmsg" >
                <?php if(isset($Username_err)) echo $Username_err;?>
            </p> 
            <input type="password" id="pass" name="Pass" class="box" required placeholder="Enter Your Password">
            <p class="errmsg" >
                <?php if(isset($Pass_err)) echo $Pass_err;?>
            </p> 
            <input id="loginbtn" value="Log in"  type="submit">
            <div><hr> or <hr></div>
            <a href="signup2.php" class="registerbtn">Register</a>
            
            <!-- style="text-align:center;color:red;" -->
        </form>
        <footer>
        <li type="none" class="liorder"><button class="fbutton" onclick="help()">Help</button></li>
        <div class="footer">&copy; 2023 Pharmacy E-commerce Website<div>
    </footer>
    </article>
</body>
</html>
<script>
    function help(){
    alert("If you need any help ask here SيDILITI@gmail.com");
}
</script>
