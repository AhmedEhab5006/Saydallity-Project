<?php
if($_SERVER['REQUEST_METHOD']=="POST"){ 
    $data= json_decode(file_get_contents('user.json'),true);
    if(!empty($_POST['Username'])&&!empty($_POST['Pass'])&&!empty($_POST['EMail'])&&!empty($_POST['Pnumber'])&&!empty($_POST['firstname'])&&!empty($_POST['lastname'])&&!empty($_POST['adress']))
    {
        $USERNAME=filter_input(INPUT_POST,'Username',FILTER_SANITIZE_STRING);
        $PASSWORD=filter_input(INPUT_POST,'Pass',FILTER_SANITIZE_SPECIAL_CHARS);
        if(strlen($PASSWORD)<8)
        {
            $Pass_err="password must be more than 8 characters";
        }
        else{
            $PASSword =password_hash($_POST['Pass'],PASSWORD_DEFAULT);
        }
        $Email=filter_input(INPUT_POST,'EMail',FILTER_SANITIZE_EMAIL);
        $TELNUMBER=filter_input(INPUT_POST,'Pnumber',FILTER_SANITIZE_NUMBER_INT);
        $UserType=$_POST['Usertype'];
        $city=$_POST['City'];
        $ADRESS=filter_input(INPUT_POST,'adress',FILTER_SANITIZE_STRING);
        $firstname=filter_input(INPUT_POST,'firstname',FILTER_SANITIZE_STRING);
        $lastname=filter_input(INPUT_POST,'lastname',FILTER_SANITIZE_STRING);
        $random_userid = rand(1000000,9999999);
        if(strlen($firstname)<3)
        {
            $Firstname_err="Name is too short";
        }
        else
        {
            $FirstName=$firstname;
        }
        if(strlen($lastname)<3)
        {
            $Lastname_err="Name is too short";
        }
        else
        {
            $LastName=$lastname;
        }
        if(strlen($USERNAME)<8)
        {
            $Username_err="username must be more than 8 characters";
        }
        else
        {
            $USERname=$USERNAME;
        }
        if(strlen($ADRESS)>100 || strlen($ADRESS)<20)
        {
            $adress_err="this adress is invalid";
        }
        else
        {
            $adress=$ADRESS;
        }
       
        if(strlen($TELNUMBER)<11)
        {
            $TEL_err="Telephone must be equal 12 digits";
        }
        else
        {
            $TELnumber=$TELNUMBER;
        }
        
        if(empty($data)==false){
            foreach($data as $user)
            {
                if($user['NO.']==null)
                {
                    $NextId=1;
                }
                else{
                    $NextId++;
                }
            }
            foreach($data as $user)
            {
                if($user['EMail'] == $Email)
                {
                    $Email_err="This email is already registered";
                }
                else
                {
                    $Email_err=null;
                }
                if($user['UserName'] == $USERname )
                {
                $Username_err="This Username is already assigned to another Email";
                }
                else
                {
                    $Username_err=null;
                }
            
            }
            if(!empty($TEL_err)||!empty($Email_err)||!empty($Username_err)||!empty($Lastname_err)||!empty($Firstname_err)||!empty($adress_err)||!empty($Pass_err)){
                $check_err="Make sure your form is error free";
            }
            else
            {
                $check_err=null;
            }
        }  
        if(!empty($USERname)&&!empty($FirstName)&&!empty($LastName)&&!empty($PASSword)&&!empty($Email)&&!empty($adress)&&!empty($TELnumber)&&empty($Email_err)&&empty($Username_err))
            {
                $data[]=array("NO."=>$NextId,"firstname"=>$FirstName,"lastname"=>$LastName,"UserName"=>$USERname,"EMail"=>$Email,"PassWord"=>$PASSword,"UserTYpe"=>"Client","tel"=>$TELnumber,"adress"=>$adress,"city"=>$city,"unique-id"=>$random_userid);
                file_put_contents('user.json',json_encode($data,JSON_PRETTY_PRINT));           
                header('location: LOGIN.php');
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
    <link rel="stylesheet" href="signup2.css">
    <link rel="icon" type="png/x-icon" href="Sي (1).png">
    <title>SيDILITI - SIGN UP</title>
</head>
<body>
    <nav class="navbar">
        <li type="none" style="display: inline-block;"><a href="index.php"><img class="imgsize2" src="ezgif.com-resize (1).gif" alt="Sيdiliti"></li>
        <!--home page link --><li type="none" class="liorder"><a href="index.php"><button class="navbutton">Home</button></a></li>
        <li type="none" class="liorder"><a href="LOGIN.php"><button class="navbutton">Sign in</button></a></li>
    </nav>
    <section>
        <div class="container">
            <form action="signup2.php" method="post">
                <div class="step step-1 active">
                    <article class="form-group">
                    <img type="x-icon"id="imgsize"src="Untitled video - Made with Clipchamp (5).gif">
                    </article>
                    <p class="errmsg" >
                            <?php if(isset($check_err)) echo $check_err;?>
                    </p>
                    <article class="form-group">
                        <input id="signinbox"type="text" required name="firstname" class="box"  placeholder="Enter Your First Name">
                        <p class="errmsg" >
                            <?php if(isset($Firstname_err)) echo $Firstname_err;?> 
                        </p>
                    </article>
                    <article class="form-group">
                        <input id="signinbox"type="text" required name="lastname" class="box"  placeholder="Enter Your Last Name">
                        <p class="errmsg" >
                            <?php if(isset($Lastname_err)) echo $Lastname_err;?>
                        </p>
                    </article>
                    <article class="form-group">
                        <input type="text" name="Username" required id="name" class="box" placeholder="Enter your User Name">
                        <p class="errmsg" >
                            <?php if(isset($Username_err)) echo $Username_err;?>
                        </p>
                    </article>
                    <button type="button" class="nbtn">Next</button>
                </div>
                <div class="step step-2">
                    <article class="form-group">
                    <img type="x-icon"id="imgsize"src="Untitled video - Made with Clipchamp (5).gif">
                    </article>
                    <article class="form-group">
                        <input id="signinbox"type="email" required name="EMail" class="box"  placeholder="Enter Your Mail">
                        <p class="errmsg" >
                            <?php if(isset($Email_err)) echo $Email_err;?>
                        </p>
                    </article>
                   <article class="form-group">
                        <input type="password" id="pass" required name="Pass" class="box"  placeholder="Enter Your Password">
                        <p class="errmsg" >
                            <?php if(isset($Pass_err)) echo $Pass_err;?>
                        </p>
                   </article>
                   <button type="button" class="pbtn">Prev</button>
                   <button type="button" class="nbtn">Next</button>
                </div>
                <div class="step step-3">
                    <article class="form-group">
                    <img type="x-icon"id="imgsize"src="Untitled video - Made with Clipchamp (5).gif">
                    </article>
                    <article class="form-group">
                        <input required type="tel" maxlength="12" name="Pnumber"  id="pnumber" class="box" placeholder="+20 Enter your phone number">
                        <p class="errmsg" >
                            <?php if(isset($TEL_err)) echo $TEL_err;?>
                        </p>
                    </article>
                    <!-- <article class="form-group">
                        <div id="rolestyle">Choose your role:</div>
                        <select name="Usertype" id="user"  class="select">
                            <option disabled >select Usertype</option>
                            <option value="Pharmacist">Pharmacist</option>
                            <option value="Client">Client</option>
                        </select>
                    </article> -->
                    <button type="button" class="pbtn">Prev</button>
                    <button type="button" class="nbtn">Next</button>
                </div>
                <div class="step step-4 ">
                    <img type="x-icon"id="imgsize"src="Untitled video - Made with Clipchamp (5).gif">
                    <article class="form-group">
                        <input required type="text" name="adress"  id="adress" class="box" placeholder="Enter your adress">
                        <p class="errmsg" >
                            <?php if(isset($adress_err)) echo $adress_err;?>
                        </p>
                    </article>
                    <article class="form-group">
                        <div id="rolestyle">Choose your city:</div>
                        <select name="City" id="City"  class="select">
                            <option disabled >select your city</option>
                            <option value="GIZA">GIZA</option>
                            <option value="CAIRO">CAIRO</option>
                            <option value="ALEXANDRIA">ALEXANDRIA</option>
                            <option value="ASWAN">ASWAN</option>
                            <option value="AL-SHARQIA">AL-SHARQIA</option>
                            <option value="FAYOUM">FAYOUM</option>
                            <option value="SOHAG">SOHAG</option>
                            <option value="HURGHADA">HURGHADA</option>
                            <option value="SHARM_EL_SHIEKH">SHARM EL-SHIKH</option>
                            <option value="SINAI">SINAI</option>
                        </select>
                    </article>
                    <button type="button" class="pbtn">Prev</button>
                    <input class="sbtn" value="submit"  type="submit">
                    <a href="LOGIN.php" class="signinbtn">Sign in</a>
                </div>
            </form>
        </div>
    </section>
    <footer>
        <li type="none" class="liorder"><button class="fbutton" onclick="help()">Help</button></li>
        <div class="footer">&copy; 2023 Pharmacy E-commerce Website<div>
    </footer>
</body>
</html>
<script src="signup.js"></script>
<!-- continue the php and put the variable int the array -->