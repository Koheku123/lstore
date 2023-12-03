
<?php include('header.php');?>

<?php 
  if(!isset($_SESSION['admin_logged_in'])){
    header('location: login.php');
    exit;
  }
?>

<?php
//get orders
  
    
    $stmt = $conn->prepare("SELECT * FROM orders");

    $stmt->execute();
    $orders = $stmt->get_result();


    $stmt2 = $conn->prepare("SELECT * FROM products");

    $stmt2->execute();

    $products = $stmt2->get_result();


?>

  <div class="container-fluid">
    <div class="row" style="min-height: 1080px;">
      <?php 
        include('sidemenu.php');
      ?>
  
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 bg-light">
          <h1 class="h2">Products</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">

            </div>
          </div>
        </div>
        
        
                <?php if(isset($_GET['edit_success_message'])){  ?>
                <p class="text-center" style="color:green;"><?php echo $_GET['edit_success_message'];?></p>
                <?php } ?>
                <?php if(isset($_GET['edit_failure_message'])){  ?>
                <p class="text-center" style="color:red;"><?php echo $_GET['edit_failure_message'];?></p>
                <?php } ?>
                <?php if(isset($_GET['delete_success_message'])){  ?>
                <p class="text-center" style="color:green;"><?php echo $_GET['delete_failure_message'];?></p>
                <?php } ?>
            
                <?php if(isset($_GET['delete_failure_message'])){  ?>
                <p class="text-center" style="color:red;"><?php echo $_GET['delete_failure_message'];?></p>            
                <?php } ?>

                <?php if(isset($_GET['product_created'])){  ?>
                <p class="text-center" style="color:green;"><?php echo $_GET['product_created'];?></p>
                <?php } ?>
                <?php if(isset($_GET['product_failed'])){  ?>
                <p class="text-center" style="color:red;"><?php echo $_GET['product_failed'];?></p>
                <?php } ?>
                <?php if(isset($_GET['images_updated'])){  ?>
                <p class="text-center" style="color:green;"><?php echo $_GET['images_updated'];?></p>
                <?php } ?>
                <?php if(isset($_GET['images_failed'])){  ?>
                <p class="text-center" style="color:red;"><?php echo $_GET['images_failed'];?></p>
                <?php } ?>


        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">Product ID</th>
                <th scope="col">Product Image</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>
                <th scope="col">Product Category</th>
                <th scope="col">Edit Images</th>                
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>

            <?php foreach($products as $product){?>

              <tr>
                <td><?php echo $product['product_id'];?></td>
                <td><img src="<?php echo "../assets/imgs/".$product['product_image'];?>" style="width: 70px; height: 70px;"/></td>
                <td><?php echo $product['product_name'];?></td>
                <td><?php echo "$".$product['product_price'];?></td>
                <td><?php echo $product['product_category'];?></td>
                <td><a class="btn btn-warning" href="edit_images.php?product_id=<?php echo $product['product_id'];?>&product_name=<?php echo $product['product_name'];?>">Edit Images</a></td>
                <td><a class="btn btn-primary" href="edit_product.php?product_id=<?php echo $product['product_id'];?>">Edit</a></td>
                <td><a class="btn btn-danger" href="delete_product.php?product_id=<?php echo $product['product_id'];?>">Delete</a></td>
              </tr>
                <?php }?>
            </tbody>
          </table>
          
        </div>
      </main>
    </div>
  </div>



</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>