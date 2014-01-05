<?php if( count( $products ) ):?>
    <ul class="productsList clearfix">
            <?php foreach($products as $k => $product): ?>
                    <li class="list_item<?=($k%3==0)?' first_3':''?><?=($k%2==0)?' first_2':''?>">
                            <div class="item_container">
                                    <h4><?= $product['name'] ?></h4>
                                    <div class="img_container">
                                        <?php if( $product['image']!= '0' ):?>
                                        <img src="<?= $product['image'] ?>">
                                        <?php 
                                        else:
                                            echo 'muie';
                                        ?>
                                            
                                        <?php endif;?>
                                    </div>
                                    <a class="red_border_btn" href="/products.php?id=<?= $product['id']?>">Detalii</a>
                            </div>       
                    </li>
            <?php endforeach; ?>
    </ul>
<?php endif; ?>
