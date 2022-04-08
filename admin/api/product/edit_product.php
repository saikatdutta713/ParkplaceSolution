<?php

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
// upload directory
if ($_SERVER['HTTP_HOST'] == "localhost") {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/parkplace/database/db.php');

    $path = $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/parkplace/uploads/';
    if (!is_dir($path)) {
        mkdir($path);
    }
} else {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/database/db.php');

    $path = $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/uploads/';
    if (!is_dir($path)) {
        mkdir($path);
    }
}

$id = mysqli_real_escape_string($conn, $_POST['id']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$desc = mysqli_real_escape_string($conn, $_POST['desc']);
$price = mysqli_real_escape_string($conn, $_POST['price']);


if ($_FILES['image']['size'][0] != 0) {
    for ($index = 0; $index < sizeof($_FILES['image']['name']); $index++) {

        $img = $_FILES['image']['name'][$index];
        $tmp = $_FILES['image']['tmp_name'][$index];
        // get uploaded file's extension
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        // can upload same image using rand function
        $final_image = rand(1000, 1000000) . "_" . $img;
        // check's valid format
        if (in_array($ext, $valid_extensions)) {
            $upload_path = $path . strtolower($final_image);
            if (move_uploaded_file($tmp, $upload_path)) {
                $images = mysqli_query($conn, "SELECT `id`,`image` FROM product_image WHERE `product_id`=$id;");

                while ($image = mysqli_fetch_assoc($images)) {

                    $image_id = $image['id'];
                    if (mysqli_query($conn, "UPDATE `product_image` SET `image`= '$final_image' WHERE `id`=$image_id;")) {

                        $file = $path . $image['image'];
                        if (is_file($file)) {
                            unlink($path . $image['image']);
                        } else {
                            echo "file not found!";
                        }
                    } else {
                        unlink($path . $final_image);
                        echo "Image not updated";
                    }
                }
            } else {
                echo "Image Uploading Failed!";
                die();
            }
        } else {
            echo "Select any of this file format jpeg, jpg, png, gif !";
        }
    }

    $date = date('Y-m-d H:i:s');

    if (mysqli_query($conn, "UPDATE `products` SET `name` = '$name', `describtion` = '$desc', `price` = '$price', `date` = '$date' WHERE `products`.`id` = '$id';")) {
        echo "Product updated successfully!";
    } else {
        echo "Product update failed! Try again";
    }
} elseif (!empty($name) && !empty($desc) && !empty($price)) {

    $date = date('Y-m-d H:i:s');

    if (mysqli_query($conn, "UPDATE `products` SET `name` = '$name', `describtion` = '$desc', `price` = '$price', `date` = '$date' WHERE `products`.`id` = '$id';")) {
        echo "Product updated successfully!";
    } else {
        echo "Product update failed! Try again";
    }
} else {
    echo "Please fill all text feilds!";
}
