<?php
 include('layouts/header.php');

?>


<?php
include('server/connection.php');


$stmt = $conn->prepare("SELECT * FROM products");

$stmt->execute();

$products = $stmt->get_result();



?>


 

<!--main-->

 <!--search
    <section id="search" class="my-5 py-5 ms-2">
        <div class="container mt-5 py-5">
            <p>Search Products</p>
            <hr>
        </div>
        <form action="shop.php" method="POSTS">
            <div class="row mx-auto container">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p>Category</p>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="gamings" name="category" id="category_one">
                            <label for="flexRadioDefault1">
                                Gaming
                            </label>
                        </div>

                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="offices" name="category" id="category_two" checked>
                            <label for="flexRadioDefault2">
                                Office
                            </label>
                        </div>
                </div>
            </div>

            <div class="row mx-auto container mt-5">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p>Price</p>
                    <input type="range" class="form-range w-50"name="price" value="100" min="1" max="9000" id="customRange2">
                    <div class="w-50">
                        <span style="float: left;">1</span>
                        <span style="float: right;">9000</span>
                    </div>
                </div>
            </div>

            <div class="form-group my-3 mx-3">
                <input type="submit" name="search" value="Search" class="btn btn-primary">
            </div>
        </form>
    </section>
  -->  
    <!--shop-->
    <section id="shop" class="my-5 py-5">
        <div class="container mt-5 py-5">
            <h3>Our Products</h3>
            <hr>
            <p>Here you can check out our products</p>
        </div>
        
        
        <div class="row mx-auto container">
            <?php while($row = $products->fetch_assoc()) { ?>
            <div onclick="window.location.href='single_product.php';" class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>">
                <h5 class="p-name"><?php echo $row['product_name'];?></h5>
                <h4 class="p-price">$<?php echo $row['product_price'];?></h4>
                <a class="btn buy-btn" href="<?php echo"single_product.php?product_id=".$row['product_id'];?>">Buy Now</a>
            </div>
            <?php } ?>
        
        </div>
    </section>
    <?php
 include('layouts/footer.php');

?>