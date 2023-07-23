<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="cart.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="png/x-icon" href="Sي (1).png">
  <title>SيDILITI - CART</title>
</head>
<body>
    <nav class="navbar">
    <li type="none" style="display: inline-block;"><a href="index.php" title="Home"><img class="imgsize2" src="ezgif.com-resize (1).gif" alt="Sيdiliti"></a></li>
        <li type="none" class="liorder"><a href="index.php"><button class="navbutton" title="Home">Home</button></a></li>
        <li type="none" class="liorder"><a href="account.php"><button class="navbutton" title="Account">Configure Account</button></a></li>
        <li type="none" class="liorder"><a href="LOGIN.php"><button class="navbutton" title="Sign In">Sign in</button></a></li>
        <li type="none" class="liorder"><a href="signup2.php"><button class="navbutton" title="Sign Up">Sign up</button></a></li>
    </nav>
<main>
    <form action="cart" method="post" target="_blank">
        <table>
            <tr>
                <td>
                    <p aria-rowspan="3"><img src="panadol.png" width="150" height="150"></p>
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" value="1" step="1" min="1"><input type="button" value="Delete" title="Delete">
                </td>
                <td>Panadol</td>
                <td><p>35.00<sup>EGP</sup></p></td>
            </tr>
            <tr>
                <td>
                    <p aria-rowspan="3"><img src="brufen.png" width="150" height="150"></p>
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" value="1" step="1" min="1"><input type="button" value="Delete" title="Delete">
                </td>
                <td>Brufen</td>
                <td><p>76.50<sup>EGP</sup></p></td>
            </tr>
        </table>
        <p><input type="submit" value="Confirm" title="Confirm"></p>
    </form>
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