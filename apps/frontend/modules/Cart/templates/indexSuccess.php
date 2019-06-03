<?php slot('body_class'); echo 'page home page-template-default'; end_slot() ?>

<div id="content" class="site-content">
    <div class="col-full">
        <div class="row">
          <?php
          include_partial('Common/breadcrumb', array('breadcrumb' => array(
            ['title' => 'Giỏ hàng'],
          )))
          ?>
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="type-page hentry">
                        <div class="entry-content">
                            <div class="woocommerce">
                                <div class="cart-wrapper">
                                    <form method="post" action="#" class="woocommerce-cart-form">
                                        <table class="shop_table shop_table_responsive cart">
                                            <thead>
                                            <tr>
                                                <th class="product-remove">&nbsp;</th>
                                                <th class="product-thumbnail">&nbsp;</th>
                                                <th class="product-name">Sản phẩm</th>
                                                <th class="product-price">Giá</th>
                                                <th class="product-quantity">Số lượng</th>
                                                <th class="product-subtotal">Tổng tiền</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="product-remove">
                                                    <a class="remove" href="#">×</a>
                                                </td>
                                                <td class="product-thumbnail">
                                                    <a href="single-product-fullwidth.html">
                                                        <img width="180" height="180" alt="" class="wp-post-image" src="single-product-fullwidth.html">
                                                    </a>
                                                </td>
                                                <td data-title="Product" class="product-name">
                                                    <div class="media cart-item-product-detail">
                                                        <a href="single-product-fullwidth.html">
                                                            <img width="180" height="180" alt="" class="wp-post-image" src="assets/images/products/cart-1.jpg">
                                                        </a>
                                                        <div class="media-body align-self-center">
                                                            <a href="single-product-fullwidth.html">55" KU6470 6 Series UHD  Crystal Colour HDR Smart TV</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td data-title="Price" class="product-price">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">£</span>627.99
                                                                    </span>
                                                </td>
                                                <td class="product-quantity" data-title="Quantity">
                                                    <div class="quantity">
                                                        <label for="quantity-input-1">Quantity</label>
                                                        <input id="quantity-input-1" type="number" name="cart[e2230b853516e7b05d79744fbd4c9c13][qty]" value="1" title="Qty" class="input-text qty text" size="4">
                                                    </div>
                                                </td>
                                                <td data-title="Total" class="product-subtotal">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">£</span>627.99
                                                                    </span>
                                                    <a title="Remove this item" class="remove" href="#">×</a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <!-- .shop_table shop_table_responsive -->
                                    </form>
                                    <!-- .woocommerce-cart-form -->
                                    <div class="cart-collaterals">
                                        <div class="cart_totals">
                                            <table class="shop_table shop_table_responsive">
                                                <tbody>
                                                <tr class="order-total">
                                                    <th>Tổng tiền</th>
                                                    <td data-title="Total">
                                                        <strong>
                                                            <span class="woocommerce-Price-amount amount">
                                                                 <span class="woocommerce-Price-currencySymbol">£</span>963.94
                                                            </span>
                                                        </strong>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <!-- .shop_table shop_table_responsive -->
                                            <div>
                                                <a class="checkout-button button alt wc-forward" href="<?php echo url_for('@checkout')?>">
                                                    Thanh toán
                                                </a>
                                            </div>
                                            <!-- .wc-proceed-to-checkout -->
                                        </div>
                                        <!-- .cart_totals -->
                                    </div>
                                    <!-- .cart-collaterals -->
                                </div>
                                <!-- .cart-wrapper -->
                            </div>
                            <!-- .woocommerce -->
                        </div>
                        <!-- .entry-content -->
                    </div>
                    <!-- .hentry -->
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->
        </div>
        <!-- .row -->
    </div>
    <!-- .col-full -->
</div>