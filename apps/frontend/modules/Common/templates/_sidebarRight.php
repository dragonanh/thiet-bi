<div id="secondary" class="widget-area shop-sidebar" role="complementary">
    <div class="widget widget_techmarket_products_carousel_widget">
        <section id="single-sidebar-carousel" class="section-products-carousel">
            <header class="section-header">
                <h2 class="section-title">Sản phẩm mới nhất</h2>
                <nav class="custom-slick-nav"></nav>
            </header>
            <!-- .section-header -->
            <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;rows&quot;:5,&quot;slidesPerRow&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#single-sidebar-carousel .custom-slick-nav&quot;}">
                <div class="container-fluid">
                    <div class="woocommerce columns-1">
                        <div class="products">
                            <?php foreach ($listNewestProduct as $product): ?>
                                <div class="landscape-product-widget product">
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
                        <!-- .products -->
                    </div>
                    <!-- .woocommerce -->
                </div>
                <!-- .container-fluid -->
            </div>
            <!-- .products-carousel -->
        </section>
        <!-- .section-products-carousel -->
    </div>
    <!-- .widget_techmarket_products_carousel_widget -->
</div>