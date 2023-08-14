

<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=0.56, minimum-scale=0.60 ">
  <title>homepage</title>
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
h2{
  font-family: "Cursive", Cursive, sans-serif;
  color:rgb(23, 162, 184);
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
  <div class="container1 my-3" >
    <div class="row offset-md-1  justify-content-center ">
      <div class="col-md-2 col-sm-12 mt-3" order="2"  >
            <marquee class="marquee" behavior="scroll" direction="down"  >
          
                <img src="child1.jpg" width="100" height="100" /><br />
                <img src="child2.jpg" width="100" height="100"/><br />
                <img src="child3.jpg" width="100" height="100" /><br />
              
                <img src="child5.jpg" width="100" height="100" /><br />
                <img src="child6.jpg" width="100" height="100" /><br />
                <img src="child7.jpg" width="100" height="100" /><br />
            
                <img src="child10.jpg" width="100" height="100"/><br />
                <img src="child11.jpg" width="100" height="100" /><br />
                <img src="child12.jpg" width="100" height="100" /><br />
     
            
             
              
                <img src="child20.jpg" width="100" height="100" /><br />
             
                <img src="child22.jpg" width="100" height="100" /><br />
                <img src="child23.jpg" width="100" height="100" /><br />
        
                <img src="child25.jpg" width="100" height="100" /><br />
         
                </marquee>
           
              </div>
         
              <div class="col-md-10 col-sm-15 " order="1">
    
            <div class="container3"    >
                <div class=" offset-md-2 justify-content ">
                  <div class="card-8  ">
                    <img src="Icelogo1.png" alt="ice logo" width= "300px">
         </div></div>
                    <br><br>
                    <h2 >How To Find Us</h2>
                    <div class="row"> 
                    <div class="col">
                    <p class="card-text "> 
                
                    Narkis 9, Haifa <br>
                    Tel : 04-9876543 <br>
                    <h2>Opening Times</h2>
                    Sunday 9:30 - 22:00 <br>
                    Monday 9:30 - 22:00 <br>
                    Tuesday 9:30 - 22:00 <br>
                    Wednesday 9:30 - 22:00 <br>
                    Thursday 9:30 - 22:00 <br>
                    Friday 9:30 - 23:30 <br>
                    Saturday 20:00 - 23:30 <br>
                    </p>
         </div>
         <div class="col">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3337.17174416838!2d35.58036978499378!3d33.2358037808359!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ebd7737b37141%3A0xf0a5a5ca6ffa15ab!2z15TXnteb15zXnNeUINeU15DXp9eT157XmdeqINeq15wt15fXmQ!5e0!3m2!1siw!2sil!4v1646678263671!5m2!1siw!2sil"
                       width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                       </div></div>
                

                   

                    <h2>Our story</h2>
                    <p class="card-text ">  <p> We’re devoted to making better ice creams and bringing people together.
                       It’s what gets us out of bed in the morning and keeps us up late at night. 
                       We believe that you can grow a business as a community of people, with artful attention to detail and the customer experience, 
                       and get continuously better at the same time. That REALLY great ice cream served perfectly in a sparkling and beautiful space, 
                       with attentive and in-the-moment service (we believe service is an art) brings people together and helps them connect.
                      And that sometimes sparks fly. And that there should be more sparks flying, generally.
                       We like to make people feel good.
                       <br><br>
                      <h2>What is Ice-Cream?</h2> 
                      Ice cream is a sweetened frozen food typically eaten as a snack or dessert. 
                      It may be made from milk or cream and is flavoured with a sweetener, either sugar or an alternative,
                      and a spice, such as cocoa or vanilla, or with fruit such as strawberries or peaches. 
                      It can also be made by whisking a flavored cream base and liquid nitrogen together. 
                      Food coloring is sometimes added, in addition to stabilizers.
                      The mixture is cooled below the freezing point of water and stirred to incorporate air spaces and to prevent detectable ice crystals from forming.
                      The result is a smooth, semi-solid foam that is solid at very low temperatures (below 2 °C or 35 °F). 
                      It becomes more malleable as its temperature increases.
                      <br><br>
                     <h2>Around the world</h2>  
                     Around the world, different cultures have developed unique versions of ice cream, suiting the product to local tastes and preferences.
                     The most traditional Argentine helado (ice cream) is very similar to Italian gelato, 
                     in large part due to the historical influence of Italian immigrants on Argentinian customs.

                     Per capita, Australians and New Zealanders are among the leading ice cream consumers in the world, eating 18 litres and 20 litres each per year respectively, 
                     behind the United States where people eat 23 litres each per year.
                     In China, besides the popular flavours such as vanilla, chocolate, coffee, mango and strawberry,
                     many Chinese ice-cream manufacturers have also introduced other traditional Chinese flavours such as black sesame and red bean.
                     In the United States, ice cream made with just cream, sugar, 
                     and a flavouring (usually fruit) is sometimes referred to as "Philadelphia style" ice cream.
                     Ice cream that uses eggs to make a custard is sometimes called "French ice cream".
                     American federal labelling standards require ice cream to contain a minimum of 10% milk fat. 
                     Americans consume about 23 litres of ice cream per person per year—the most in the world.
                
                  </p>
                  </div>
                </div>
              </div>
              </div>
              
 
          </div>  
         </div>
         <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {


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
 
         <footer>
 
  <a >CopyRight @_Meital&_Rim 2022</a>
</footer>
  </body>
   
</html>

