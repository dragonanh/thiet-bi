<?php slot('body_class'); echo 'woocommerce-active right-sidebar'; end_slot() ?>

<div id="content" class="site-content" tabindex="-1">
    <div class="col-full">
        <div class="row">
          <?php
          include_partial('Common/breadcrumb', array('breadcrumb' => array(
            ['title' => sprintf('Tìm với từ khoá "%s"', $keyword)],
          )))
          ?>
            <!-- .woocommerce-breadcrumb -->
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="shop-control-bar">
                        <!-- .handheld-sidebar-toggle -->
                        <h1 class="woocommerce-products-header__title page-title <?php echo !$pager->getNbResults() ? 'text-center' : ''?>">
                          <?php echo sprintf('Có %s sản phẩm được tìm thấy', $pager->getNbResults()) ?>
                        </h1>
                        <?php if($pager->getNbResults()): ?>
                            <form class="form-techmarket-wc-ppp" method="GET" action="<?php echo $url ?>">
                                <select class="techmarket-wc-wppp-select c-select" onchange="this.form.submit()" name="max_per_page">
                                  <?php foreach ($listMaxPerPage as $maxPerPage): ?>
                                      <option value="<?php echo $maxPerPage ?>" <?php echo $pager->getMaxPerPage() == $maxPerPage ? 'selected' : '' ?>><?php echo $maxPerPage ?> sản phẩm/trang</option>
                                  <?php endforeach; ?>
                                </select>
                            </form>
                        <?php endif ?>
                    </div>

                    <?php if($pager->getNbResults()): ?>
                        <div class="tab-content">
                            <div id="grid" class="tab-pane active" role="tabpanel">
                                <div class="woocommerce columns-5">
                                    <div class="products">
                                      <?php $totalItemInPage = count($pager->getResults())  ?>
                                      <?php foreach ($pager->getResults() as $key => $product): ?>
                                        <?php
                                        if($key == 0 || $key % 5 == 0) $class = 'first';
                                        elseif( ($key+1) % 5 == 0 || $totalItemInPage == ($key+1)) $class = 'last';
                                        else $class = "";
                                        ?>
                                          <div class="product <?php echo $class ?>">
                                              <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="<?php echo url_for('detail_product', ['slug' => $product->getSlug()]) ?>">
                                                  <img width="224" height="197" alt="<?php echo $product->getName() ?>" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="<?php echo sfConfig::get("app_domain_web_root").$product->getImagePath() ?>">
                                                  <h2 class="woocommerce-loop-product__title"><?php echo $product->getName() ?></h2>
                                              </a>
                                              <a href="tel:<?php echo sfConfig::get("app_phone_number") ?>">
                                                <span class="price">
                                                    <span class="woocommerce-Price-amount amount">Liên hệ: <?php echo sfConfig::get("app_phone_number") ?></span>
                                                </span>
                                              </a>
                                              <!-- .woocommerce-LoopProduct-link -->
                                              <div class="hover-area"> </div>
                                              <!-- .hover-area -->
                                          </div>
                                      <?php endforeach; ?>
                                    </div>
                                    <!-- .products -->
                                </div>
                                <!-- .woocommerce -->
                            </div>
                            <!-- .tab-pane -->
                        </div>

                        <div class="shop-control-bar-bottom">
                            <p class="woocommerce-result-count">
                              <?php $currentOffset = ($pager->getPage()-1)*$pager->getMaxPerPage() ?>
                              <?php echo $currentOffset + 1 ?>&ndash;<?php echo $currentOffset + $totalItemInPage ?> của <?php echo $pager->getNbResults() ?> sản phẩm
                            </p>

                          <?php include_partial('Common/pagination', ['url' => $url, 'pager' => $pager]) ?>
                        </div>
                    <?php endif ?>
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->
          <?php include_component('Common', 'sidebarRight') ?>
        </div>
        <!-- .row -->
    </div>
    <!-- .col-full -->
</div>
<!-- #content -->
<div class="col-full">
  <?php include_component('Homepage', 'recentlyViewed') ?>
</div>