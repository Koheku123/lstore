<?php
 include('layouts/header.php');

?>

<?php



if(isset($_POST['add_to_cart'])){



    if(isset($_SESSION['cart'])){

        $product_array_ids = array_column($_SESSION['cart'],"product_id");
        if(!in_array($_POST['product_id'], $product_array_ids) ){

            $product_id = $_POST['product_id'];
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_image = $_POST['product_image'];
            $product_quantity = $_POST['product_quantity'];

            $product_array = array(
                'product_id' => $product_id,
                'product_name' => $product_name,
                'product_price' => $product_price,
                'product_image' => $product_image,
                'product_quantity' => $product_quantity

            );

            $_SESSION['cart'][$product_id] = $product_array;

        }else{

            echo '<script>alert("product already added") </script>';

        }

    }else{

        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = $_POST['product_quantity'];

        $product_array = array(
            'product_id' => $product_id,
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_image' => $product_image,
            'product_quantity' => $product_quantity

        );

        $_SESSION['cart'][$product_id] = $product_array;

    }

    //calculate total
    calculateTotalCart();

//remove
}elseif (isset($_POST['remove_product'])) {
    
    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'][$product_id]);

    //calculate total
    calculateTotalCart();
}
elseif (isset($_POST['edit_quantity'])) {
    //get id and qunatity from form
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];
    //get product array from session
    $product_array =$_SESSION['cart'][$product_id];
    //update quantity
    $product_array['product_quantity'] = $product_quantity;
    //return array to it placce
    $_SESSION['cart'][$product_id] = $product_array;
    //calculate total
    calculateTotalCart();
}


else{
   //header('location: index.php');
}


function calculateTotalCart(){

    $total = 0;

    foreach($_SESSION['cart'] as $key => $value){
        $product= $_SESSION['cart'][$key];

        $price=$product['product_price'];
        $quantity = $product['product_quantity'];

        $total = $total + ($price * $quantity);

    }

    $_SESSION['total'] = $total;
}


?>



        <div class="container">
          <img src="assets/imgs/logo.png">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="shop.html">Shop</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="contact.html">Contact Us</a>
              </li>
              <li class="nav-item">
                 <a href="cart.html"><i class="fa fa-shopping-cart"></i></a> 
                 <a href="account.html"><i class="fa fa-user"></i></a> 
              </li>
      
      
            </ul>
            
          </div>
        </div>
      </nav>
      
    <!--cart-->
    <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bolde">Your cart</h2>
            <hr>
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>

            <?php if(isset($_SESSION['cart'])){?>
            <?php 
                foreach($_SESSION['cart'] as $key => $value){ 
            ?>
            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/imgs/<?php echo $value['product_image']; ?>" />
                        <div>
                            <p><?php echo $value['product_name']; ?> </p>
                            <small><span>$</span><?php echo $value['product_price'];?></small>
                            <br>
                            <form method="POST" action="cart.php" >
                                <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>"/>
                                <input type="submit" name="remove_product" class="remove-btn" value="remove"/>
                            </form>
                        </div>
                    </div>
                </td>

            
                <td>
                   
                    <form method="POST" action="cart.php">
                        <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>"/>
                        <input type="number" name="product_quantity" value="<?php echo $value['product_quantity'];?>">
                        <input type="submit" class="edit-btn" value="edit" name="edit_quantity"/>

                    </form>
                    
                 </td>

                <td>
                    <span>$</span>
                    <span class="product-price"><?php echo $value['product_quantity'] * $value['product_price'];?></span>
                </td>
                



            </tr>

            <?php }
            ?>
            <?php } ?>
        </table>


            <div class="cart-total">
                <table>
                    <tr>
                        <td>Total</td>
                        <?php if(isset($_SESSION['cart'])){?>
                        <td>$ <?php echo $_SESSION['total']; ?></td>
                        <?php } ?>
                    </tr>
                </table>
            </div>


        <div class="checkout-container">
            <form method="POST" action="checkout.php">
                <input type="submit" class="btn checkout-btn" name="checkout" value="Checkout">
            </form>
        </div>
    </section>




    <?php
 include('layouts/footer.php');

?>