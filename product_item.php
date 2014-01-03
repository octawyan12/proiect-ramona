<?php
include ("mySqlConnect.php");

if(isset($_GET['id'])) {
    $sql = mysql_query("SELECT * FROM product WHERE id=" . intval($_GET['id']));
    $product = mysql_fetch_assoc($sql);
    var_dump($product);die;
} else {
    $sql = mysql_query("SELECT * FROM product");
    while ($products[] = mysql_fetch_assoc($sql));
    var_dump($products);die;
}
?>
