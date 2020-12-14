<div class="product">
  <a href="<?php echo url_for('detail_product', ['slug' => $product['slug']]) ?>" class="woocommerce-LoopProduct-link">
    <img src="<?php echo sfConfig::get("app_domain_web_root").$product['image_path'] ?>" width="224" height="197" class="wp-post-image" alt="<?php echo $product['name'] ?>">
    <!-- /.price -->
    <h2 class="woocommerce-loop-product__title" title="<?php echo $product['name'] ?>"><?php echo VtHelper::truncate($product['name'], 30) ?></h2>
  </a>

  <a href="tel:<?php echo sfConfig::get("app_phone_number") ?>">
    <span class="price">
        <ins>
            <span class="amount"> </span>
        </ins>
        <span class="amount">Liên hệ: <?php echo sfConfig::get("app_phone_number") ?></span>
    </span>
  </a>
  <div class="hover-area"></div>
</div>