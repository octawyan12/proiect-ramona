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
                                    include('/tools/get_page_name.php');
                                    $page = getCurrentPage();
                                    if ($page !== false) {
                                        echo $page['title'];
                                    }
                                endif;
                                ?>
                            </div>

                            <div class="tc_main_content">
                                <form action="process_product.php" method="post" enctype="multipart/form-data">

                                    <label for="name">Name</label><br>
                                    <input type='text' name='name' id='name'/></br>

                                    <label for="description">Description</label><br>
                                    <textarea name='description' id='description'></textarea></br>

                                    <label for="price">Price</label><br>
                                    <input type='text' name='price' id='price'/></br>

                                    <label for="file">Filename:</label><br>
                                    <input type="file" name="file" id="file"><br>

                                    <input type="submit" name="submit" value="Submit">
                                </form>
                            </div>
                        </div>
                    </div></div></div>
        </div></div>
</section>
<?php include('elements/footer_elem.php'); ?>