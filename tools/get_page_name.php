<?php
include ("/../mySqlConnect.php");

function getCurrentPage() {
//    $page = $_SERVER['REQUEST_URI'];
    $page = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);

    $sql = mysql_query("SELECT * FROM menu_item WHERE path='/".$page."'");

    if ($item = mysql_fetch_assoc($sql)) {
        return $item;
    }
    return false;
}

?>
