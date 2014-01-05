<?php include('elements/header_elem.php'); ?>

<section class="pr">
    <div class="tc_background">
        <div class="bg_image">
            <img class="img-responsive" src="images/bg2.jpg" >
            <div class="bg_mask"></div>
        </div>
    </div>

    <div class="margin50 three_columns_top tc_page">
        <div class="container">

            <div class="top_bg pr">
                <div class="bg_left"></div>
                <div class="bg_center"></div>
                <div class="bg_right"></div>
            </div>

            <div class="margin25 pr">

                <div class="repeat_bg_left"></div>    
                <div class="repeat_bg_right"></div>    

                <div class="tc_row white_bg">



                    <aside class="sidebar tc_span">
                    </aside>
                    <div class="tc_content tc_span">
                        <div class="tc_contet_margin">

                            <div class="tc_page_title">
                                <?php 
                                if ($currentPage !== false) {
                                    echo $currentPage['title'];
                                }
                                ?>
                            </div>

                            <div class="tc_main_content">
                                <div class='add_new_prod_btn'><a href='/add-new.php'>Add new product</a></div>
                                <?php
                                include("tools/get_products.php");
                                if (count($products) > 1):
//                                        echo '<pre>';
//                                        print_r($products);
//                                        echo '</pre>';
                                    ?>
                                    <ul class='products_table'>
                                        <li class='li_head li2 clearfix'>
                                            <div class='p_name'>Name</div>
                                            <div class='p_desc'>Description</div>
                                            <div class='p_price'>Price</div>
                                            <div class='p_actions'>Actions</div>
                                        </li>
                                        <?php
                                        foreach ($products as $key => $prod) :
                                            if (isset($prod['id']) && $prod['id']) {
                                                ?>

                                                <li class='li_body<?= ($key % 2 == 0) ? " li1" : " li2" ?> clearfix'>
                                                    <div class='p_name'><?= $prod['name'] ?></div>
                                                    <div class='p_desc'><?= $prod['description'] ?></div>
                                                    <div class='p_price'>&euro;&nbsp;<?= $prod['price'] ?>&nbsp;,- </div>
                                                    <div class='p_actions'>
                                                        <a href='/edit-product.php?id=<?= $prod['id'] ?>' class='red_border_btn edit_product'>Edit</a>
                                                        <a data-pid='<?= $prod['id'] ?>' href='/tools/remove_product.php' class='red_border_btn delete_product'>Delete</a>
                                                    </div>
                                                </li>
                                                <?php
                                            }
                                        endforeach;
                                        ?>
                                    </ul>
                                <?php endif; ?>

                            </div>

                        </div>
                    </div>

                    <aside class="right_sidebar tc_span">
                        <div class='right_sidebar_block'></div>
                        <div class='right_sidebar_block'></div>
                        <div class='right_sidebar_block'></div>
                    </aside>
                </div>
            </div>
        </div>
    </div>    
</section>

<?php include('elements/footer_elem.php'); ?>