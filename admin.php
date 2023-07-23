<?php
 session_start();
 if(!empty($_SESSION))
 {
    $USer=($_SESSION);
   if(!empty($_SESSION['username']))
   {
     $aname=$_SESSION['username'];
   }
   $data=json_decode(file_get_contents('user.json'),true);
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="admin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="png/x-icon" href="Sي (1).png">
    <title>SيDILITI - Admin</title>
</head>
<nav class="navbar">
        <li type="none" style="display: inline-block;"><a href="index.php" title="Home"><img class="imgsize2" src="ezgif.com-resize (1).gif" alt="Sيdiliti"></a></li>
        <?php
            if($USer!=null)
            {
            echo'<li type="none" class="liorder"><a href="account.php"><button class="navbutton" title="Account">'.$aname.'</button></a></li>';
            if($USer['type']=="ADMIN")
            {
                echo'<li type="none" class="liorder"><a href="addaccount.php"><button class="navbutton" title="Add Account">Add Acccount</button></a></li>';
            }
            if($USer['type']=="Pharmacist"||$USer['type']=="ADMIN")
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
        
<body>
    <main>
        <table>
            <thead>
                <tr>
                    <th class="column">
                        ID
                    </th>
                    <th class="column">
                        USERNAME
                    </th>
                    <th class="column">
                        FIRST-NAME
                    </th>
                    <th class="column">
                        LAST-NAME
                    </th>
                    <th class="column">
                        EMAIL
                    </th>
                    <th class="column">
                        TELEPHONE
                    </th>
                    <th class="column">
                        ADDRESS
                    </th>
                    <th class="column">
                        CITY
                    </th>
                    <th class="column">
                        USERTYPE
                    </th>
                    <th class="column">
                        ORDERS
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($data as $user){
                    echo '<tr>';
                    echo '<td class="column">';
                    echo $user['unique-id'];
                    if($user['unique-id']==null)
                    {
                        echo" ";
                    }
                    echo '</td>';
                    echo '<td class="column">';
                    echo $user['UserName'];
                    echo '</td>';
                    echo '<td class="column">';
                    echo $user['firstname'];
                    if($user['firstname']==null)
                    {
                        echo" ";
                    }
                    echo '</td>';
                    echo '<td class="column">';
                    echo $user['lastname'];
                    if($user['lastname']==null)
                    {
                        echo" ";
                    }
                    echo '</td>';
                    echo '<td class="column">';
                    echo $user['EMail'];
                    echo '</td>';
                    echo '<td class="column">';
                    echo $user['tel'];
                    echo '</td>';
                    echo '<td class="column">';
                    echo $user['adress'];
                    if($user['adress']==null)
                    {
                        echo" ";
                    }
                    echo '</td>';
                    echo '<td class="column">';
                    echo $user['city'];
                    if($user['city']==null)
                    {
                        echo" ";
                    }
                    echo '</td>';
                    echo '<td class="column">';
                    echo $user['UserTYpe'];
                    echo '</td>';
                    /*echo '<td class="column">';
                    echo '</td>';*/
                    
                    echo '</tr>';
                }

                ?>
                <tr>
                    <td class="column">
                        20225107
                    </td>
                    <td class="column">
                        Ahmedash42
                    </td>
                    <td class="column">
                        Ahmed
                    </td>
                    <td class="column">
                        Ashraf
                    </td>
                    <td class="column">
                        ahmedash@gmail.com
                    </td>
                    <td class="column">
                        01067734319
                    </td>
                    <td class="column">
                        123 nasr city
                    </td>
                    <td class="column">
                        cairo
                    </td>
                    <td class="column">
                        client
                    </td>
                    <td class="column">
                        Panadol,brufen
                    </td>
                </tr>
                <tr>
                    <td class="column">
                        123456
                    </td>
                    <td class="column">
                        Ahmedashraf
                    </td>
                    <td class="column">
                        hassan
                    </td>
                    <td class="column">
                        Ashraf
                    </td>
                    <td class="column">
                        hassanashra.com
                    </td>
                    <td class="column">
                        01001234567
                    </td>
                    <td class="column">
                        15235 helwan 26 street
                    </td>
                    <td class="column">
                        cairo
                    </td>
                    <td class="column">
                        client
                    </td>
                    <td class="column">
                        Panadol,brufen
                    </td>
                </tr>
            </tbody>
        </table>
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