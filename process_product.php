<?php

include ("mySqlConnect.php");

include('elements/upload_image.php');

include('tools/get_products.php');

if($_POST) {
    if($_POST['id']) {
    if (!isset($image) || $image == 0) {
        $image = $product['image_id'];
    }
     $prod = "UPDATE product SET name='".$_POST['name']."', description='".$_POST['description']."', price='".$_POST['price']."', image='".$image."' WHERE id=".$_POST['id'];
    } else {
        $prod = "INSERT INTO product(name, description, price, image) VALUES ('".$_POST['name']."', '".$_POST['description']."', '".$_POST['price']."', '".$image."')";
    }
    mysql_query($prod);
    
    header('Location: index.php');
}

?>
