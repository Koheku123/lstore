<?php include('header.php');?>

<?php

    if(!isset($_SESSION['admin_logged_in'])){
        header('location: login.php');
        exit();
    }
?>

<div class="container-fluid">
    <div class="row" style="min-height: 1080px;">
      <?php 
        include('sidemenu.php');
      ?>
  
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 bg-light">
                <h1 class="h2">Help</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                    </div>
                </div>
            </div>
            
            <div class="container">
                <p>Please contact admin@gmail.com</p>
                <p>Please call 0123456789</p>
            </div>
        </main>
    </div> 
</div>

</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>