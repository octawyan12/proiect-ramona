<?php
include ("elements/header_elem.php");
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
                                    if ($currentPage !== false) {
                                        echo $currentPage['title'];
                                    }
                                endif;
                                ?>
                            </div>

                            <div class="tc_main_content">
                                <form action="/tools/send_message.php" method="post">
                                    <label for="subject">Subject</label><br>
                                    <input type='text' name='subject' id='subject'/></br>
                                    <label for="email">Email</label><br>
                                    <input type='email' name='email' id='email'/></br>
                                    <label for="message">Message</label><br>
                                    <textarea name="message"></textarea><br>
                                    <button>Send</button>

                                </form>
                            </div>
                        </div>
                    </div></div></div>
        </div></div>
</section>

<?php
include ("elements/footer_elem.php");
?>
