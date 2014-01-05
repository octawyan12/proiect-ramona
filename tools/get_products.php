<?php
include ("mySqlConnect.php");

if(isset($_GET['id'])) {
    $sql = mysql_query("SELECT * FROM product WHERE id=" . intval($_GET['id']));
    $product = mysql_fetch_assoc($sql);
} else {
    $sql = mysql_query("SELECT * FROM product");
    while ($products[] = mysql_fetch_assoc($sql));
    foreach($products as $key=>$product) {
        if($product['image'] != 0) {
            $img = mysql_query('Select * from image where id='.intval($product['image']));
            $img = mysql_fetch_assoc($img);
            $img = "/upload/".$img['name'];
            $product['image'] = $img;
            $products[$key] = $product;
        }
    }
}
?>
