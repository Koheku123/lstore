<?php

include('connection.php');


$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='Gaming' LIMIT 4");

$stmt->execute();

$gamings_products = $stmt->get_result();

?>