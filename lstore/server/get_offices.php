<?php

include('connection.php');


$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='Office' LIMIT 4");

$stmt->execute();


$offices_products = $stmt->get_result();

?>