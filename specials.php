<?php
 
session_start();


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Cart</title>
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
.button {
  background-color: rgb(23, 162, 184);
  
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  border-radius: 4px;
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
  
              </div>
               
               <div class="container">
               <br>
                <div id="message"> <h2 style="color: rgb(23, 162, 184);text-align:center;font-family: Cursive, Cursive, sans-serif;">Our specials for you</h2></div>
                <a href="Products.php" class="button"><i class="fas fa-cart-plus" ></i>&nbsp;&nbsp;No thanx</a>
              
                <br>
                <div class="row mt-2 pb-3">
                  <?php
                    include 'config.php';
                    $stmt = $conn->prepare('SELECT * FROM product WHERE id > 12');
                    
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()):
                  ?>
                  <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
                    <div class="card-deck">
                      <div class="card p-2 border-secondary mb-2">
                        <img src="<?= $row['product_image'] ?>" class="card-img-top" height="250">
                        <div class="card-body p-1">
                          <h4 class="card-title text-center text-info"><?= $row['product_name'] ?></h4>
                          <h5 class="card-text text-center " style="color:rgb(198, 71, 124,1)"><i class="fas fa-shekel-sign"></i>&nbsp;&nbsp;<?= number_format($row['product_price'],2) ?></h5>
            
                        </div>
                        <div class="card-footer p-1">
                          <form action="" class="form-submit">
                            <div class="row p-2">
                              <div class="col-md-6 py-1 pl-4">
                                <b>Quantity : </b>
                              </div>
                              <div class="col-md-6">
                                <input type="number"  min="1" class="form-control pqty" value="<?= $row['product_qty'] ?>">
                              </div>
                            </div>
                            <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                            <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
                            <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                            <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
                            <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                            <button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to
                              cart</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php endwhile; ?>
                </div>
              </div>
              
              
          
          <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Send product details in the server
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pcode = $form.find(".pcode").val();

      var pqty = $form.find(".pqty").val();

      $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
          pcode: pcode
        },
        success: function(response) {
          $("#message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
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
<br><br>
<footer>
 
 <a >CopyRight @_Meital&_Rim 2022</a>
</footer>
      
 
    
 
  </body>
  
</html>