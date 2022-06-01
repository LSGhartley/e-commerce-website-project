<?php
session_start();
include("includes/dbp.php");
include("functions/functions.php");
?>
<?php 

if(isset($_GET['pro_id'])){
    
    $product_id = $_GET['pro_id'];
    
    $get_product = "select * from products where product_id='$product_id'";
    
    $run_product = mysqli_query($con,$get_product);
    
    $row_product = mysqli_fetch_array($run_product);
    
    $p_cat_id = $row_product['p_cat_id'];
    
    $pro_title = $row_product['product_title'];
    
    $pro_price = $row_product['product_price'];
    
    $pro_desc = $row_product['product_desc'];
    
    $pro_img1 = $row_product['product_img1'];
    
    $pro_img2 = $row_product['product_img2'];
    
    $pro_img3 = $row_product['product_img3'];
    
    $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
    
    $run_p_cat = mysqli_query($con,$get_p_cat);
    
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    
    $p_cat_title = $row_p_cat['p_cat_title'];
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no"/>
    <title>Buhle's Handmade Patterns</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <script type="text/javascript">
      ! function($, n, e) {
        var o = $();
        $.fn.dropdownHover = function(e) {
          return "ontouchstart" in document ? this : (o = o.add(this.parent()), this.each(function() {
            function t(e) {
              o.find(":focus").blur(), h.instantlyCloseOthers === !0 && o.removeClass("open"), n.clearTimeout(c), i.addClass("open"), r.trigger(a)
            }
            var r = $(this),
              i = r.parent(),
              d = {
                delay: 100,
                instantlyCloseOthers: !0
              },
              s = {
                delay: $(this).data("delay"),
                instantlyCloseOthers: $(this).data("close-others")
              },
              a = "show.bs.dropdown",
              u = "hide.bs.dropdown",
              h = $.extend(!0, {}, d, e, s),
              c;
            i.hover(function(n) {
              return i.hasClass("open") || r.is(n.target) ? void t(n) : !0
            }, function() {
              c = n.setTimeout(function() {
                i.removeClass("open"), r.trigger(u)
              }, h.delay)
            }), r.hover(function(n) {
              return i.hasClass("open") || i.is(n.target) ? void t(n) : !0
            }), i.find(".dropdown-submenu").each(function() {
              var e = $(this),
                o;
              e.hover(function() {
                n.clearTimeout(o), e.children(".dropdown-menu").show(), e.siblings().children(".dropdown-menu").hide()
              }, function() {
                var t = e.children(".dropdown-menu");
                o = n.setTimeout(function() {
                  t.hide()
                }, h.delay)
              })
            })
          }))
        }, $(document).ready(function() {
          $('[data-hover="dropdown"]').dropdownHover()
        })
      }(jQuery, this);
    </script>
    
</head>
<body>
 
 <!--=========-TOP_BAR============-->
 <nav class="topBar">
    <div class="container">
      <ul class="list-inline pull-left hidden-sm hidden-xs">
        <li><span class="text-primary">Have a question? </span> Call +27 66 231 4045</li>
      </ul>
      <ul class="topBarNav pull-right">
        <li class="dropdown">
          <a href="account.php" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <i class="fa fa-user mr-5"></i><span class="hidden-xs">My Account<i class="fa fa-angle-down ml-5"></i></span> </a>
          <ul class="dropdown-menu w-150" role="menu">
            <li><a href="checkout.php">
                <?php 
                   if(!isset($_SESSION['customer_email'])){
                       echo "<a href='checkout.php'> Login </a>";
                         }else{
                            echo " <a href='logout.php'> Log Out </a> ";
                          }
                ?>
                </a>
            </li>
            <li><a href="register.php">Create Account</a>
            </li>
            <li class="divider"></li>
            <li>
                  <?php 
                      if(!isset($_SESSION['customer_email'])){
                               
                            echo"<a href='checkout.php'>My Account</a>";
                               
                      }else{      
                          echo"<a href='customer/my_account.php?my_orders'>My Account</a>";         
                      }
                           
                      ?>
            </li>
            <li><a href="cart.php">My Cart</a>
            </li>
            <li><a href="checkout.php">Checkout</a>
            </li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <i class="fa fa-shopping-basket mr-5"></i> <span class="hidden-xs">
                    <?php items(); ?> 
                            </span> </a>
          <ul class="dropdown-menu cart w-250" role="menu">
            <li>
            <a href="checkout.php"> Total Price: <?php total_price(); ?> </a>
            </li>
            <li>
              <div class="cart-footer"> <a href="cart.php" class="pull-left"><i class="fa fa-cart-plus mr-5"></i>View
					Cart</a> <a href="checkout.php" class="pull-right"><i class="fa fa-shopping-basket mr-5"></i>Checkout</a> </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
  <!--=========-TOP_BAR============-->

  <!--=========MIDDEL-TOP_BAR============-->
  <div class="middleBar">
    <div class="container">
  <div class="row display-table">
    <div class="col-sm-3 vertical-align text-left hidden-xs">
      <a href="index.php"> <img width="50px" src="images/logo.png" alt=""></a>
    </div>
    <!-- end col -->
    <div class="col-sm-7 vertical-align text-center">
      <form>
        <div class="row grid-space-1">
          <div class="col-sm-9">
            <input type="text" name="keyword" class="form-control input-lg" placeholder="Search">
         </div>
          <!-- end col -->
          <div class="col-sm-3">
            <input type="submit" class="btn btn-default btn-block btn-lg" value="Search">
         </div>
          <!-- end col -->
        </div>
        <!-- end row -->
      </form>
    </div>
    <!-- end col -->
  </div>
  <!-- end  row -->
</div>
</div>
<!--=========MIDDEL-TOP_BAR============-->
    
    
<nav class="navbar navbar-custom navbar-main" role="navigation" style="opacity: 1;">
          <div class="container">
            <!-- Brand and toggle -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>             
            </div>
        
            <!-- Collect the nav links,  -->
            <div class="collapse navbar-collapse navbar-1" style="margin-top: 0px;">            
              <ul class="nav navbar-nav nav-text">
              <li class="nav-item <?php if($active=='Home') echo"active"; ?>">
                  <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item <?php if($active=='Shop') echo"active"; ?>">
                  <a class="nav-link" href="shop.php">Shop Now</a>
              </li>
              <li class="nav-item <?php if($active=='Contact') echo"active"; ?>">
                  <a class="nav-link" href="contact.php">Contact Us</a>
              </li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div>
  </nav>
