<?php
include ("/../mySqlConnect.php");

function getCurrentPage() {
    $page = $_SERVER['REQUEST_URI'];

    $sql = mysql_query("SELECT * FROM menu_item WHERE path='{$page}'");

    if ($item = mysql_fetch_assoc($sql)) {
        return $item;
    }
    return false;
}

?>
