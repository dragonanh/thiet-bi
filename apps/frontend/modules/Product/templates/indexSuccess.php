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
                                                <div data-thumb="/assets/images/products/sm-card-1.jpg" class="woocommerce-product-gallery__image">
                                                    <a href="javascript:void(0)" tabindex="0">
                                                        <img width="600" height="600" src="<?php echo $product->getImagePath() ?>" class="attachment-shop_single size-shop_single wp-post-image" alt="<?php echo $product->getName() ?>">
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
                                        <p class="price">
                                            <?php if($product->getOldPrice() && $product->getOldPrice() > $product->getPrice()): ?>
                                                <del>
                                                   <span class="woocommerce-Price-amount amount"><?php echo VtHelper::formatNumber($product->getOldPrice()) ?> đ</span>
                                                </del>
                                            <?php endif  ?>
                                            <ins>
                                               <span class="woocommerce-Price-amount amount"><?php echo VtHelper::formatNumber($product->getPrice()) ?> đ</span>
                                            </ins>
                                        </p>
                                        <!-- .single-product-header -->
                                        <form enctype="multipart/form-data" method="post" class="cart">
                                            <div class="quantity">
                                                <label for="quantity-input">Quantity</label>
                                                <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" id="quantity-input">
                                            </div>
                                            <!-- .quantity -->
                                            <button class="single_add_to_cart_button button alt" value="185" name="add-to-cart" type="submit"><?php echo __('Thêm vào giỏ hàng') ?></button>
                                        </form>
                                        <!-- .cart -->
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
                                <li class="nav-item reviews_tab">
                                    <a class="nav-link" data-toggle="tab" role="tab" aria-controls="tab-reviews" href="#tab-reviews">Nhận xét (1)</a>
                                </li>
                            </ul>
                            <!-- /.ec-tabs -->
                            <div class="tab-content">
                                <div class="tab-pane panel wc-tab active" id="tab-description" role="tabpanel">
                                    <?php echo VtHelper::strip_html_tags_and_decode($product->getContent()) ?>
                                </div>
                                <div class="tab-pane" id="tab-reviews" role="tabpanel">
                                    <div class="techmarket-advanced-reviews" id="reviews">
                                        <div class="advanced-review row">
                                            <div class="advanced-review-rating">
                                                <h2 class="based-title">Review (1)</h2>
                                            </div>
                                            <!-- /.advanced-review-rating -->
                                            <div class="advanced-review-comment">
                                                <div id="review_form_wrapper">
                                                    <div id="review_form">
                                                        <div class="comment-respond" id="respond">
                                                            <h3 class="comment-reply-title" id="reply-title">Add a review</h3>
                                                            <form novalidate="" class="comment-form" id="commentform" method="post" action="#">
                                                                <div class="comment-form-rating">
                                                                    <label>Your Rating</label>
                                                                    <p class="stars">
                                                                        <span><a href="#" class="star-1">1</a><a href="#" class="star-2">2</a><a href="#" class="star-3">3</a><a href="#" class="star-4">4</a><a href="#" class="star-5">5</a></span>
                                                                    </p>
                                                                </div>
                                                                <p class="comment-form-comment">
                                                                    <label for="comment">Your Review</label>
                                                                    <textarea aria-required="true" rows="8" cols="45" name="comment" id="comment"></textarea>
                                                                </p>
                                                                <p class="comment-form-author">
                                                                    <label for="author">Name
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <input type="text" aria-required="true" size="30" value="" name="author" id="author">
                                                                </p>
                                                                <p class="comment-form-email">
                                                                    <label for="email">Email
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <input type="text" aria-required="true" size="30" value="" name="email" id="email">
                                                                </p>
                                                                <p class="form-submit">
                                                                    <input type="submit" value="Add Review" class="submit" id="submit" name="submit">
                                                                    <input type="hidden" id="comment_post_ID" value="185" name="comment_post_ID">
                                                                    <input type="hidden" value="0" id="comment_parent" name="comment_parent">
                                                                </p>
                                                            </form>
                                                            <!-- /.comment-form -->
                                                        </div>
                                                        <!-- /.comment-respond -->
                                                    </div>
                                                    <!-- /#review_form -->
                                                </div>
                                                <!-- /#review_form_wrapper -->
                                            </div>
                                            <!-- /.advanced-review-comment -->
                                        </div>
                                        <!-- /.advanced-review -->
                                        <div id="comments">
                                            <ol class="commentlist">
                                                <li id="li-comment-83" class="comment byuser comment-author-admin bypostauthor even thread-even depth-1">
                                                    <div class="comment_container" id="comment-83">
                                                        <div class="comment-text">
                                                            <div class="star-rating">
                                                                            <span style="width:100%">Rated
                                                                                <strong class="rating">5</strong> out of 5</span>
                                                            </div>
                                                            <p class="meta">
                                                                <strong itemprop="author" class="woocommerce-review__author">first last</strong>
                                                                <span class="woocommerce-review__dash">&ndash;</span>
                                                                <time datetime="2017-06-21T08:05:40+00:00" itemprop="datePublished" class="woocommerce-review__published-date">June 21, 2017</time>
                                                            </p>
                                                            <div class="description">
                                                                <p>Wow great product</p>
                                                            </div>
                                                            <!-- /.description -->
                                                        </div>
                                                        <!-- /.comment-text -->
                                                    </div>
                                                    <!-- /.comment_container -->
                                                </li>
                                                <!-- /.comment -->
                                            </ol>
                                            <!-- /.commentlist -->
                                        </div>
                                        <!-- /#comments -->
                                    </div>
                                    <!-- /.techmarket-advanced-reviews -->
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