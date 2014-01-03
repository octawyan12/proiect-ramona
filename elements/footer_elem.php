<?php defined('C5_EXECUTE') or die("Access Denied."); ?>
<?php $test_edit_mode = $c->isEditMode(); ?>
    <footer class="goudas_footer">
        <div class="white_bg">
            <div class="container">
                <div class="call_btn_footer">
                    <?php
                        $a = new GlobalArea('Footer_Phone');
                        $a->setCustomTemplate('phone_button', 'templates/footer');
                        $a->setBlockLimit(1);
                        $a->display($c);
                    ?>
                </div>
                <!--		<div class="margin25">-->
                <div class="row1">
                    <div class="small_logo span2h">
                        <a href="/" target="_self"><img src="<?= $this->getThemePath() ?>/images/small_logo.png"></a>
                    </div>


                    <div class="span10h">
                        <div class="row1">
                            <div class="span">
                                <?php
                                $a = new GlobalArea('footer_content');
                                $a->setBlockWrapperStart('<div class="footer_content">');
                                $a->setBlockWrapperEnd('</div>');
                                $a->setBlockLimit(1);
                                $a->display($c);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--		</div>-->
            </div>
        </div>    
        <div class="footer_sr">
            <div class="footer_top_shadow"></div>
            <div class="container">
                <div class="margin25">
                    <div class="row1 footer_second_row">
                        <div class="span2f<?= ($test_edit_mode)?' span_min':'' ?>">
                            <?php
                                $a = new GlobalArea('footer_block1');
                                $a->display($c);
                            ?>
                        </div>
                        <div class="span2f<?= ($test_edit_mode)?' span_min':'' ?>">
                            <?php
                                $a = new GlobalArea('footer_block2');
                                $a->display($c);
                            ?>
                        </div>
                        <div class="span2f<?= ($test_edit_mode)?' span_min':'' ?>">
                            <?php
                                $a = new GlobalArea('footer_block3');
                                $a->display($c);
                            ?>
                        </div>
                        <div class="span2f<?= ($test_edit_mode)?' span_min':'' ?>">
                            <?php
                                $a = new GlobalArea('footer_block4');
                                $a->display($c);
                            ?>
                        </div>
                        <div class="span2f<?= ($test_edit_mode)?' span_min':'' ?>">
                            <?php
                                $a = new GlobalArea('footer_block5');
                                $a->display($c);
                            ?>
                        </div>
                        <div class="span2f_big<?= ($test_edit_mode)?' span_min':'' ?>">
                            <?php
                                $a = new GlobalArea('footer_block6');
                                $a->setBlockWrapperStart('<div class="footer_6th">');
                                $a->setBlockWrapperEnd('</div>');
                                $a->display($c);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<?php Loader::element('footer_required'); ?>
<script>
//    $( document ).ready (function(){
//        var bWidth = $('body').width();
//        alert(bWidth);
//    });
</script>
</body>
</html>