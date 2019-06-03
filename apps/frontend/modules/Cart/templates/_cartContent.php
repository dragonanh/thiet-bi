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
    <?php foreach ($listProductInCart as $product): ?>
      <tr>
        <td class="product-remove">
          <a class="remove" href="#">×</a>
        </td>
        <td class="product-thumbnail">
          <a href="<?php echo url_for('detail_product', ['slug' => $product['slug']]) ?>">
            <img width="180" height="180" alt="<?php echo $product['name'] ?>" class="wp-post-image" src="<?php echo $product['image_path'] ?>">
          </a>
        </td>
        <td data-title="Sản phẩm" class="product-name">
          <div class="media cart-item-product-detail">
            <a href="<?php echo url_for('detail_product', ['slug' => $product['slug']]) ?>">
              <img width="180" height="180" alt="<?php echo $product['name'] ?>" class="wp-post-image" src="<?php echo $product['image_path'] ?>">
            </a>
            <div class="media-body align-self-center">
              <a href="<?php echo url_for('detail_product', ['slug' => $product['slug']]) ?>"><?php echo $product['name'] ?></a>
            </div>
          </div>
        </td>
        <td data-title="Giá" class="product-price">
          <span class="woocommerce-Price-amount amount">
            <?php echo VtHelper::formatNumber($product['price']) ?> đ
          </span>
        </td>
        <td class="product-quantity" data-title="Số lượng">
          <div class="quantity">
            <label for="quantity-input-<?php echo $product['id'] ?>">Số lượng</label>
            <input id="quantity-input-<?php echo $product['id'] ?>" type="number" name="cart[quantity][<?php echo $product['id'] ?>]" value="<?php echo $product['quantity'] ?>" title="Số lượng" class="input-text qty text" size="4">
            <button class="btn btn-primary btnAddToCart" type="button" title="Cập nhật số lượng" data-target="#quantity-input-<?php echo $product['id'] ?>"
                    data-url="<?php echo url_for('ajax_add_to_cart', ['id' => $product['id'], 'act' => 'update']) ?>">Cập nhật</button>
          </div>
        </td>
        <td data-title="Tổng tiền" class="product-subtotal">
          <span class="woocommerce-Price-amount amount">
              <?php echo VtHelper::formatNumber($product['price'] * $product['quantity']) ?> đ
          </span>
          <a title="Xóa sản phẩm" class="remove btnRemoveItemInCart" href="javascript:void(0)"
             data-url="<?php echo url_for('ajax_remove_item_from_cart', ['id' => $product['id']]) ?>">×</a>
        </td>
      </tr>
    <?php endforeach; ?>
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
        <td data-title="Tổng tiền">
          <strong>
            <span class="woocommerce-Price-amount amount">
                 <?php echo VtHelper::formatNumber($totalPrice) ?> đ
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