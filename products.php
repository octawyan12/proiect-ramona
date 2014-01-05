<?php 
    include('elements/header_elem.php'); 
    include('tools/get_products.php');
?>

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
                                    if (isset($_GET['id'])) :
                                        echo htmlentities($product['name']);
                                    else :
                                        if($currentPage !== false) {
                                            echo $currentPage['title'];
                                        }
                                    endif;
                                ?>
                            </div>

                            <div class="tc_main_content">
                                <?php
                                if (isset($_GET['id'])) :
                                    include('includes/view_product.php');
                                else :
                                    include('includes/view_products.php');
                                endif;
                                ?>
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