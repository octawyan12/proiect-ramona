<?php
include ("../mySqlConnect.php");

$sql = "DELETE FROM product WHERE id={$_POST['product_id']}";

if(mysql_query($sql)) {
    print true;
} else {
    print false;
}


?>
