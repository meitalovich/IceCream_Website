<?php

 
session_start();
	require 'config.php';

	$grand_total = 0;
	$allItems = '';
	$items = [];
	$sql = "SELECT CONCAT(product_name, '(',qty,')') AS ItemQty, total_price FROM cart";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
	  $grand_total += $row['total_price'];
	  $items[] = $row['ItemQty'];
    

    
	}
	$allItems = implode(', ', $items);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
 
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Checkout</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  <style>
    footer {
      text-align: center;
  padding: 3px;
  background-color:rgb(198, 71, 124,1) ;
  color: white;
 
   bottom: 0;
   width: 100%;
}
    </style>
</head>

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
         <a class="nav-link"  href="login.php"></i>Login</a> <?php endif; ?></a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 px-4 pb-4" id="order">
        <h4 class="text-center text-info p-2">Complete your order!</h4>
        <div class="jumbotron p-3 mb-2 text-center">
          <h6 class="lead"><b>Product(s) : </b><?= $allItems; ?></h6>
          <h6 class="lead"><b>Delivery Charge : </b>Free</h6>
          <h5><b>Total Amount Payable : </b><?= number_format($grand_total,2) ?>/-</h5>
        </div>
        <form action="" method="post" id="placeOrder">
          <input type="hidden" name="products" value="<?= $allItems; ?>">
          
          <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter E-Mail" required>
          </div>
          <div class="form-group">
            <input type="tel" name="phone" pattern="[0-9]{1}[0-9]{9}" class="form-control" placeholder="Enter Phone" required>
          </div>
          <div class="form-group">

  <input type="checkbox" id="cone" name="cone" value="cone">
  <label for="cone"> cone</label><br>
  <input type="checkbox" id="cups" name="cups" value="cups">
  <label for="cups"> cups</label><br>
  <input type="checkbox" id="spoons" name="spoons" value="spoons">
  <label for="spoons"> spoons</label>

          </div>
          <div class="form-group">
            <textarea name="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here..."></textarea>
          </div>
          <div class="form-group">
            <textarea name="address" class="form-control" rows="3" cols="5" placeholder="Anything else?"></textarea>
          </div>

          <h6 class="text-center lead">Select Payment Mode</h6>
          <div class="form-group">
            <select name="pmode" class="form-control">
              <option value="" selected disabled>-Select Payment Mode-</option>
              <option value="cod">Cash On Delivery</option>
              <option value="netbanking">Bit</option>
              <option value="cards">Debit/Credit Card</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block" 
            >
            <?php
            // update stock quantity in data base
                  require 'config.php';
                    $sql1 = "SELECT cart.qty, cart.product_code,product.stock_qty,product.product_name  FROM cart INNER JOIN product on cart.product_code=product.product_code ";
                    $result = $conn->query($sql1);
                    while($row = $result->fetch_assoc()) {
                      $qty= $row["qty"];
                      $pcode=$row["product_code"];
                      $stock_qty=$row["stock_qty"];
                      $proname=$row["product_name"];
                      $total=$stock_qty - $qty;
                      if ($total < "0"){?>
                        <script type="text/javascript">
                        alert("sorry, we don't have enough <?php echo $proname; ?>");
                        window.location = "orders.php";
                     </script>
                     <?php
                    } 
                    else {
                      $sql="UPDATE product SET stock_qty =stock_qty- '$qty' WHERE product_code ='$pcode'";
                    $stmt = $conn->prepare($sql);
                  	$stmt->execute();
                    }
                  }
                  
                ?>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Sending Form data to the server
    $("#placeOrder").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: 'action.php',
        method: 'post',
        data: $('form').serialize() + "&action=order",
        success: function(response) {
          $("#order").html(response);
        }

      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
  <br><br><br><br>
            <footer>
 
 <a >CopyRight @_Meital&_Rim 2022</a>
</footer>
</body>

</html>