<?php if(!empty($listProduct)): ?>
    <section class="section-landscape-products-carousel recently-viewed" id="recently-viewed">
      <header class="section-header">
        <h2 class="section-title"><?php echo __('Sản phẩm đã xem') ?></h2>
        <nav class="custom-slick-nav"></nav>
      </header>
      <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:2,&quot;dots&quot;:true,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#recently-viewed .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1700,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}}]}">
        <div class="container-fluid">
          <div class="woocommerce columns-5">
            <div class="products">
              <?php foreach ($listProduct as $product): ?>
                  <div class="landscape-product product">
                    <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                      <div class="media">
                        <img class="wp-post-image" src="<?php echo $product['image_path'] ?>" alt="<?php echo $product['name'] ?>">
                        <div class="media-body">
                            <h2 class="woocommerce-loop-product__title"><?php echo $product['name'] ?></h2>
                            <span class="price">
                                <ins>
                                    <span class="amount"> <?php echo VtHelper::formatNumber($product['price']) ?> đ</span>
                                </ins>
                                <?php if($product['old_price'] && $product['old_price'] > $product['price']): ?>
                                    <del>
                                        <span class="amount"><?php echo VtHelper::formatNumber($product['old_price']) ?> đ</span>
                                    </del>
                                <?php endif ?>
                                <span class="amount"> </span>
                            </span>
                          <!-- .price -->
                        </div>
                        <!-- .media-body -->
                      </div>
                      <!-- .media -->
                    </a>
                    <!-- .woocommerce-LoopProduct-link -->
                  </div>
              <?php endforeach; ?>
            </div>
          </div>
          <!-- .woocommerce -->
        </div>
        <!-- .container-fluid -->
      </div>
      <!-- .products-carousel -->
    </section>
<?php endif ?>