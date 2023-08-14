
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=0.56, minimum-scale=0.60 ">
  <title>login</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  <link rel="stylesheet" type="text/css" href="loglog.css">

</head>
  <!-- menu -->
<body style="background-color:rgb(224, 201, 223);" >
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" href="ice.php"></i>&nbsp;&nbsp;Ice-Cream Dream</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link " href="products.php"></i>Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="checkout.php"><i class="fas fa-money-check-alt mr-2"></i>Checkout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="orders.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
        </li>
        <li class="nav-item">
           <?php  if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) : echo '<a class="nav-link" >hello,' , $_SESSION['name'],'</a>' ?>
           <li class="nav-item">
          <a class="nav-link" href="logout.php"></i>Logout </a>
        </li>
         <?php else : ?> 
         <a class="nav-link"  href="login.php"></i>Login</a> <?php endif; ?>
         </a>
        </li>
      </ul>
    </div>
  </nav>  
  <!-- login page -->
  <div class="container">
    <div class="row mt-4">
     <form action="logincheck.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
         <input type="text" name="uname"  placeholder="User name" ><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"  ><br>

     	<button type="submit">Login</button>
          <a href="register.php" class="ca">Create an account</a>
          <a href="ice.php" class="ca">not now</a>
     </form>
	 </div>
  </div>
  <br><br>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
   <footer > 
 <a >CopyRight @_Meital&_Rim 2022</a>
</footer>
</body>
</html>