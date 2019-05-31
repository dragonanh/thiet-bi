
  <li class="animate-dropdown dropdown ">
    <a class="cart-contents" href="<?php echo url_for('@cart') ?>" data-toggle="dropdown" title="Xem giỏ hàng">
      <i class="tm tm-shopping-bag"></i>
      <span class="count"><?php echo VtHelper::formatNumber($totalProduct) ?></span>
      <span class="amount">
          <span class="price-label">Giỏ hàng</span> <?php echo VtHelper::formatNumber($totalPrice) ?> đ
      </span>
    </a>
    <ul class="dropdown-menu dropdown-menu-mini-cart">
      <li>
        <div class="widget woocommerce widget_shopping_cart">
          <div class="widget_shopping_cart_content">
            <?php if(count($listProductInCart)): ?>
              <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                <?php foreach ($listProductInCart as $product): ?>
                  <li class="woocommerce-mini-cart-item mini_cart_item">
                    <a href="javascript:void(0)" class="remove" aria-label="Remove this item" data-product_id="<?php echo $product['id'] ?>">×</a>
                    <a href="">
                      <img src="<?php echo $product['image_path'] ?>" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="<?php echo $product['name'] ?>">
                      <?php echo $product['name'] ?>
                    </a>
                    <span class="quantity"><?php echo $product['quantity'] ?> ×
                        <span class="woocommerce-Price-amount amount"><?php echo VtHelper::formatNumber($product['price']) ?></span>
                    </span>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif ?>
            <!-- .cart_list -->
            <p class="woocommerce-mini-cart__total total">
              <strong>Tổng tiền:</strong>
              <span class="woocommerce-Price-amount amount"><?php echo VtHelper::formatNumber($totalPrice) ?> đ</span>
            </p>
            <p class="woocommerce-mini-cart__buttons buttons">
              <a href="<?php echo url_for('@cart') ?>" class="button wc-forward">Xem giỏ hàng</a>
              <a href="<?php echo url_for('@checkout') ?>" class="button checkout wc-forward">Thanh toán</a>
            </p>
          </div>
        </div>
        <!-- .widget_shopping_cart -->
      </li>
    </ul>
    <!-- .dropdown-menu-mini-cart -->
  </li>
