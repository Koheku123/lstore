<?php
 include('layouts/header.php');

?>
<?php

include('server/connection.php');

if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];    
        $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
        $stmt->bind_param("i",$product_id);
        $stmt->execute();
        $product = $stmt->get_result();

//no product id given
}else {

    header('location: index.php');
}


?>











 <!--single product-->
   
      <section class="container single-product my-5 pt-5">
        <div class="row mt-5">
          <?php while($row = $product->fetch_assoc()){?>

          
            <div class="col-lg-5 col-md-6 col-sm-12">
                <img src="assets/imgs/<?php echo $row['product_image']; ?>" class="img-fluid w-100 pb-1" id ="mainImg" >
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image']; ?>" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image2']; ?>" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image3']; ?>" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image4']; ?>" width="100%" class="small-img">
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 col-md-12 col-12">
                <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
                <h2>$ <?php echo $row['product_price']; ?></h2>

                <form method="POST" action="cart.php">
                    <input type="hidden" name="product_id" value="<?php echo $row['product_id'];?>">
                    <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>">
                        <input type="number" name="product_quantity" value="1"/>
                        <button class="buy-btn" type="submit" name="add_to_cart">Add to cart</button>
                </form> 
                <h4 class="mt-5 mb-5">Product details</h4>
                <span><?php echo $row['product_description']; ?>
                </span>
            </div>

            

            <?php }?>
        </div>
    </section>

    <!--related product-->
    <section id="related-product" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Related Product</h3>
            <hr class="mx-auto">
        </div>
        <div class="row mx-auto container-fluid">
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/featured1.jpg">
                <h5 class="p-name">MSI Katana 15</h5>
                <h4 class="p-price">$1100</h4>
                <button class="buy-btn">Buy Now</button>
            </div>
            
        
        
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/featured2.jpg">
                <h5 class="p-name">Asus Zenbook Duo</h5>
                <h4 class="p-price">$580</h4>
                <button class="buy-btn">Buy Now</button>
            </div>
            
        
        
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/featured3.jpg">
                <h5 class="p-name">Predator 21X</h5>
                <h4 class="p-price">$9000</h4>
                <button class="buy-btn">Buy Now</button>
            </div>
            
        
        
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/featured4.jpg">
                <h5 class="p-name">HP Spectre X360</h5>
                <h4 class="p-price">$1200</h4>
                <button class="buy-btn">Buy Now</button>
            </div>
        </div>
    </section>



    <!--footer-->
    <footer class="mt-5 py-5">
        <div class="row container mx-auto pt-5">
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <img src="assets/imgs/logo.png">
                <p class="pt-3">We provide the best product for the most affordable prices</p>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <ul class="text-uppercase">
                    <li><a href="#">New arrivals</a></li>
                    <li><a href="#">Featured</a></li>
                    <li><a href="#">Office</a></li>
                </ul>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Contact Us</h5>
                <div>
                    <h6 class="text-uppercase">Address</h6>
                    <p>1234 Street, City</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Phone</h6>
                    <p>123 456 789</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Email</h6>
                    <p>info@gmail.com</p>
                </div>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <a href="#"><i class="fa fa-facebook-square"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-snapchat-square"></i></a>
                <a href="#"><i class="fa fa-github-square"></i></a>
            </div>
        </div>

    </footer>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <script>
      
      var mainImg = document.getElementById("mainImg");
      var smallImg = document.getElementsByClassName("small-img");
      
        for(let i=0;i<=4;i++){
            smallImg[i].onclick = function(){
                mainImg.src = smallImg[i].src;
            }
        }  
    </script>

</body>
</html>