<?php slot('body_class'); echo 'woocommerce-active single-product full-width normal'; end_slot() ?>

<div id="content" class="site-content" tabindex="-1">
    <div class="col-full">
        <div class="row">
            <?php
                include_partial('Common/breadcrumb', array('breadcrumb' => array(
                    ['title' => 'Sản phẩm', 'url' => url_for('homepage')],
                    ['title' => $product->getName()],
                )))
            ?>
            <!-- .woocommerce-breadcrumb -->
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="product product-type-simple">
                        <div class="single-product-wrapper">
                            <div class="product-images-wrapper thumb-count-4">
                                <div id="techmarket-single-product-gallery" class="techmarket-single-product-gallery techmarket-single-product-gallery--with-images techmarket-single-product-gallery--columns-4 images">
                                    <div class="techmarket-single-product-gallery-images">
                                        <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images">
                                            <figure class="woocommerce-product-gallery__wrapper ">
                                                <div data-thumb="<?php echo sfConfig::get("app_domain_web_root")?>/assets/images/products/sm-card-1.jpg" class="woocommerce-product-gallery__image">
                                                    <a href="javascript:void(0)" tabindex="0">
                                                        <img width="600" height="600" src="<?php echo sfConfig::get("app_domain_web_root").$product->getImagePath() ?>" class="attachment-shop_single size-shop_single wp-post-image" alt="<?php echo $product->getName() ?>">
                                                    </a>
                                                </div>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .product-images-wrapper -->
                            <div class="summary entry-summary">
                                <div class="single-product-header">
                                    <h1 class="product_title entry-title"><?php echo $product->getName() ?></h1>
                                </div>
                                <!-- .single-product-meta -->
                                <div class="woocommerce-product-details__short-description">
                                    <?php echo nl2br($product->getDescription()) ?>
                                </div>
                                <!-- .woocommerce-product-details__short-description -->
                                <div class="product-actions-wrapper">
                                    <div class="product-actions">
                                        <a href="tel:<?php echo sfConfig::get("app_phone_number") ?>">
                                            <p class="price">
                                                <ins>
                                                    <span class="woocommerce-Price-amount amount">Liên hệ: <?php echo sfConfig::get("app_phone_number") ?></span>
                                                </ins>
                                                
                                            </p>
                                        </a>
                                        <!-- .single-product-header -->
                                    </div>
                                    <!-- .product-actions -->
                                </div>
                                <!-- .product-actions-wrapper -->
                            </div>
                            <!-- .entry-summary -->
                        </div>
                        <!-- .single-product-wrapper -->
                        <div class="woocommerce-tabs wc-tabs-wrapper">
                            <ul role="tablist" class="nav tabs wc-tabs">
                                <li class="nav-item description_tab">
                                    <a class="nav-link active" data-toggle="tab" role="tab" aria-controls="tab-description" href="#tab-description">Thông tin sản phẩm</a>
                                </li>
                            </ul>
                            <!-- /.ec-tabs -->
                            <div class="tab-content">
                                <div class="tab-pane panel wc-tab active" id="tab-description" role="tabpanel">
                                    <?php echo VtHelper::strip_html_tags_and_decode($product->getContent()) ?>
                                </div>
                            </div>
                        </div>

                        <?php include_component('Product', 'relatedProduct', ['productId' => $product->getId()]) ?>
                        <?php include_component('Homepage', 'recentlyViewed') ?>
                    </div>
                    <!-- .product -->
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->
        </div>
        <!-- .row -->
    </div>
    <!-- .col-full -->
</div>