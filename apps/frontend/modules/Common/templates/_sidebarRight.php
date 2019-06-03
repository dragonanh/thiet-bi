<div id="secondary" class="widget-area shop-sidebar" role="complementary">
    <div class="widget widget_techmarket_products_carousel_widget">
        <section id="single-sidebar-carousel" class="section-products-carousel">
            <header class="section-header">
                <h2 class="section-title">Sản phẩm mới nhất</h2>
                <nav class="custom-slick-nav"></nav>
            </header>
            <!-- .section-header -->
            <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;rows&quot;:2,&quot;slidesPerRow&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#single-sidebar-carousel .custom-slick-nav&quot;}">
                <div class="container-fluid">
                    <div class="woocommerce columns-1">
                        <div class="products">
                            <?php foreach ($listNewestProduct as $product): ?>
                                <div class="landscape-product-widget product">
                                    <a class="woocommerce-LoopProduct-link" href="<?php echo url_for('detail_product', ['slug' => $product['slug']]) ?>">
                                        <div class="media">
                                            <img class="wp-post-image" src="<?php echo $product['image_path'] ?>" alt="<?php echo $product['name'] ?>">
                                            <div class="media-body">
                                                <span class="price">
                                                    <ins>
                                                        <span class="amount"><?php echo VtHelper::formatNumber($product['price']) ?></span>
                                                    </ins>
                                                </span>
                                                <!-- .price -->
                                                <h2 class="woocommerce-loop-product__title"><?php echo $product['name'] ?></h2>
                                            </div>
                                            <!-- .media-body -->
                                        </div>
                                        <!-- .media -->
                                    </a>
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