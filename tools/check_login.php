<?php

include ('get_page_name.php');
$currentPage = getCurrentPage();
if ($currentPage !== false) {
    session_start();
    if (isset($_SESSION['auth'])) { // daca exista in SESSION variabila asta...
        if ($_SESSION['auth'] == 100) { // daca are valoare de admin
            $auth = 100;
        } else {
            $auth = 0;
        }
    } else {
        $auth = 0;
    }
    if ($auth !== 100 && (($currentPage['require_login'] == 1) )) {
        header('Location:index.php');
    }
} elseif (isset($_GET['id'])) {
    header('Location:index.php');
}
?>
