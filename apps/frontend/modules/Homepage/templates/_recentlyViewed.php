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
                    <div class="woocommerce-LoopProduct-link">  
                      <div class="media">
                        <a href="<?php echo url_for('detail_product', ['slug' => $product['slug']]) ?>">
                          <img class="wp-post-image" src="<?php echo sfConfig::get("app_domain_web_root").$product['image_path'] ?>" alt="<?php echo $product['name'] ?>">
                        </a>
                        <div class="media-body">
                            <a href="<?php echo url_for('detail_product', ['slug' => $product['slug']]) ?>">
                              <h2 class="woocommerce-loop-product__title"><?php echo $product['name'] ?></h2>
                            </a>
                            <a href="tel:<?php echo sfConfig::get("app_phone_number") ?>">
                              <span class="price">
                                  <ins>
                                      <span class="amount"> Liên hệ: <?php echo sfConfig::get("app_phone_number") ?></span>
                                  </ins>
                                  <span class="amount"> </span>
                              </span>
                            </a>
                          <!-- .price -->
                        </div>
                        <!-- .media-body -->
                      </div>
                      <!-- .media -->
                    </div>
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