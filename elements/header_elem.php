<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Site Header Content //-->
        
        <link rel="stylesheet" media="screen" type="text/css" href="css/typography.css" />
        <link rel="stylesheet" href="css/fancybox/fancybox/jquery.fancybox.css">
        <link rel="stylesheet" media="screen" type="text/css" href="css/main.css" />
        <link rel="stylesheet" media="screen" type="text/css" href="css/elements.css" />
        <link rel="stylesheet" media="screen" type="text/css" href="css/three_columns.css" />
        <link rel="stylesheet" media="screen" type="text/css" href="css/products.css" />
        
        <script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="/js/fancybox-download/js/fancybox/jquery.fancybox.js"></script>
        <script type="text/javascript" src="/js/tinymce/js/tinymce/tinymce.min.js"></script>
        
        <script src="/js/general.js"></script>
    </head>
    <body>
        <?php include('/tools/check_login.php'); ?>
        <header class="goudas_header">
            <section class="top_navigation">
                <div class="container">

                    <a href="javascript:void(0)" id="nav_btn">Menu</a>

                    <div class="row1">
                        <div class="logo span2h">
                            <a href="/" target="_self"><img src="images/logo.jpg"></a>
                        </div>

                        <div class="span10h">

                            <div class="row1 header_row_1">
                                <div class="span">
                                    <div class="header_content">
                                        <p>Website voor professionele gebruikers in de horeca, Gouda’s Glorie Foodservice!</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row1">
                                <nav class="span pr">
                                    <!--TOP MENU MENU-->
                                    <?php include("/elements/meniu.php"); ?>
                                </nav>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </header>

