<?php

if ($_SERVER['HTTP_HOST'] == "localhost") {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/parkplace/database/db.php');
} else {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/database/db.php');
}

$id = mysqli_real_escape_string($conn, $_POST['id']);

$product = mysqli_query($conn, "SELECT `name`,`describtion`,`price` FROM products WHERE id = $id;");

$product = mysqli_fetch_assoc($product);

$images = mysqli_query($conn, "SELECT `image` FROM product_image WHERE `product_id`= $id");


if ($product) {
    $response = array();

    $response['id'] = $id;
    $response['name'] = $product['name'];
    $response['describtion'] = $product['describtion'];
    $response['price'] = $product['price'];

    while ($image = mysqli_fetch_assoc($images)) {
        $response['image'][] =  $image["image"];
    }

    print_r(json_encode($response));
} else {
    echo 0;
}
