<?php
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

    if ($auth == 100) { // daca a fost recunoscut contul de admin
        $isLoggedIn = true;
    } else {
        $isLoggedIn = false;
    }

    include ("mySqlConnect.php");

    $menu = mysql_query("SELECT id from menu where name = 'main_menu'");
    $menu = mysql_fetch_row($menu);
    if ($isLoggedIn == true) {
        $menu_items = mysql_query("Select * from menu_item where menu = " . $menu[0]);
    } else {
        $menu_items = mysql_query("Select * from menu_item where menu = " . $menu[0] . " AND require_login = false");
    }
    while ($items[] = mysql_fetch_assoc($menu_items));
?>

<ul class="header_menu nav clearfix">
    <?php
    foreach ($items as $item) {
        if ($item['path'] !== null && $item['title'] !== null) {
            ?>
            <li> 

                <a href="<?php echo $item['path']; ?>"><?php echo $item['title']; ?><span>&nbsp;</span></a>
            </li>
            <?php
        }
    }

    if (isset($_SESSION['auth'])) { // daca exista in SESSION variabila asta...
        if ($_SESSION['auth'] == 100) { // daca are valoare de admin
            $auth = 100;
        } else {
            $auth = 0;
        }
    } else {
        $auth = 0;
    }

    if ($auth == 100) { // daca a fost recunoscut contul de admin
        ?>
        <li> <a href='login.php?disconect'>Deconectare<span>&nbsp;</span></a></li>
        <?php
    } else { // daca e cont normal
        ?>	
        <li class='has-submenu'><a href='#'>Conectare<span>&nbsp;</span></a>
            <ul> 
                <li>
                    <form action="login.php" method="post">
                        <table> 
                            <tr>
                                <td align="right" > <font color = #669900> Nume: </font> </td>
                                <td> <input type="text" id="username" name="nume"> </td> 
                            </tr>
                            <tr> 
                                <td align="right" > <font color = #669900> Parola: </font> </td>
                                <td> <input type="password" id="password"  name="parola"> </td>
                            </tr> 
                        </table>
                        <input type="submit" value="Autentificare">
                    </form>
                </li>
            </ul>
        </li>
        <?php
    }
    ?>
</ul>