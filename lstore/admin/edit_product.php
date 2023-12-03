
<?php include('header.php');?>

<?php 

    if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
        $stmt = $conn->prepare("SELECT * FROM products WHERE product_id=?");
        $stmt->bind_param('i',$product_id);
        $stmt->execute();
    
        $products = $stmt->get_result();


    }elseif(isset($_POST['edit_btn'])){

        $product_id = $_POST['product_id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $offer = $_POST['offer'];
        $category = $_POST['category'];


        $stmt1 = $conn->prepare("UPDATE products SET product_name=?,product_description=?,product_price=?,
                                product_special_offer=? , product_category=? WHERE product_id=?");
        $stmt1->bind_param('sssssi',$title,$description,$price,$offer,$category,$product_id);

        if($stmt1 ->execute()){
            header('location: products.php?edit_success_message=Updated successfully');
        }else{
            header('location: products.php?edit_failure_message=Error,Try again');
        }
    }else{
        header('products.php');
        exit;
    }
?>

  <div class="container-fluid">
    <div class="row" style="min-height: 1080px;">
      <?php 
        include('sidemenu.php');
      ?>
  
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 bg-light">
          <h1 class="h2">Edit Product</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">

            </div>
          </div>
        </div>

        <div class="table-responsive">
            <form id="edit-form" method="POST" action="edit_product.php" >
                <p style="color:red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
                <div class="form-group mt-2">

                <?php foreach($products as $product) {?>

                    <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                    <label>Title</label>
                    <input type="text" class="form-control" id="product-name" value="<?php echo $product['product_name']?>" name="title" placeholder="Title" required>
                </div>
                <div class="form-group mt-2">
                    <label>Description</label>
                    <input type="text" class="form-control" id="product-desc" value="<?php echo $product['product_description']?>" name="description" placeholder="Description" required>
                </div>
                <div class="form-group mt-2">
                    <label>Price</label>
                    <input type="text" class="form-control" id="product-price" value="<?php echo $product['product_price']?>" name="price" placeholder="Price" required>
                </div>
                <div class="form-group mt-2">
                    <label>Category</label>
                    <select class="form-select" required name="category">
                        <option value="Gaming">Gamings</option>
                        <option value="Office">Offices</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label>Special Offer/Sale</label>
                    <input type="number" class="form-control" id="product-offer" value="<?php echo $product['product_special_offer']?>" name="offer" placeholder="Sale %" required>
                </div>

                <?php } ?>
                <div class="form-group mt-2">
                    <input type="submit" class="btn btn-primary" name="edit_btn" value="Edit">
                </div>
            </form>
          
        </div>
      </main>
    </div>
  </div>



</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>