<div class="product">
  <a href="<?php echo url_for('detail_product', ['slug' => $product['slug']]) ?>" class="woocommerce-LoopProduct-link">
    <img src="<?php echo $product['image_path'] ?>" width="224" height="197" class="wp-post-image" alt="<?php echo $product['name'] ?>">
    <span class="price">
        <ins>
            <span class="amount"> </span>
        </ins>
        <span class="amount"> <?php echo VtHelper::formatNumber($product['price']) ?> đ</span>
    </span>
    <!-- /.price -->
    <h2 class="woocommerce-loop-product__title" title="<?php echo $product['name'] ?>"><?php echo VtHelper::truncate($product['name'], 30) ?></h2>
  </a>
  <div class="hover-area">
    <a class="button add_to_cart_button btnAddToCart" href="javascript:void(0)" rel="nofollow"
       data-url="<?php echo url_for('ajax_add_to_cart', ['id' => $product['id']]) ?>">Thêm vào giỏ hàng</a>
  </div>
</div>