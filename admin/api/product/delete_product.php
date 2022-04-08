<?php

if ($_SERVER['HTTP_HOST'] == "localhost") {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/parkplace/database/db.php');
} else {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/database/db.php');
}

$id = mysqli_real_escape_string($conn, $_POST['id']);


if (mysqli_query($conn, "DELETE FROM `products` WHERE id = $id")) {

    $product_images = mysqli_query($conn, "SELECT `image` FROM product_image;");

    while ($image = mysqli_fetch_assoc($product_images)) {

        if ($_SERVER['HTTP_HOST'] == "localhost") {
            $path = $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/parkplace/uploads/';
        } else {
            $path = $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/uploads/';
        }

        unlink($path . $image['image']);
    }

    mysqli_query($conn, "DELETE FROM `product_image` WHERE product_id = $id");

    echo "Product deleted successfully!";
} else {
    echo "Product deletion failed!";
}
