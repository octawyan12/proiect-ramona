<?php

include ("mySqlConnect.php");

include('elements/upload_image.php');

if($_POST) {
    $prod = "INSERT INTO product(name, description, price, image) VALUES ('".$_POST['name']."', '".$_POST['description']."', '".$_POST['price']."', '".$image."')";

    mysql_query($prod);
    
    header('Location: index.php');
}

?>
