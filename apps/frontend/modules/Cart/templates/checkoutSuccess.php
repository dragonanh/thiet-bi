<?php slot('body_class'); echo 'woocommerce-active page-template-default woocommerce-checkout woocommerce-page can-uppercase  pace-done'; end_slot() ?>

<div id="content" class="site-content">
      <div class="col-full">
          <div class="row">
              <nav class="woocommerce-breadcrumb">
                  <a href="/">Trang chủ</a>
                  <span class="delimiter">
                      <i class="tm tm-breadcrumbs-arrow-right"></i>
                  </span>
                  Thanh toán
              </nav>
              <!-- .woocommerce-breadcrumb -->
              <div class="content-area" id="primary">
                  <main class="site-main" id="main">
                      <div class="type-page hentry">
                          <div class="entry-content">
                              <div class="woocommerce">
                                  <?php if($error):?>
                                    <h3><?php echo $error?></h3>
                                  <?php else:?>
                                    <form action="<?php echo url_for("@checkout")?>" class="checkout woocommerce-checkout" method="post" name="checkout">
                                        <?php echo $form->renderHiddenFields()?>
                                        <div id="customer_details" class="col2-set">
                                            <div class="col-1">
                                                <div class="woocommerce-billing-fields">
                                                    <h3>Thông tin thanh toán</h3>
                                                    <div class="woocommerce-billing-fields__field-wrapper-outer">
                                                        <div class="woocommerce-billing-fields__field-wrapper">
                                                            <p id="billing_company_field" class="form-row form-row-first form-row-wide <?php echo $form["full_name"]->hasError() ? "woocommerce-invalid" : "" ?>">
                                                                <label class="" for="billing_company">Họ và tên
                                                                  <abbr title="required" class="required">*</abbr>
                                                                </label>
                                                                <?php echo $form["full_name"]->render()?>
                                                                <span class="form-message-error"><?php echo $form["full_name"]->getError() ?></span>
                                                            </p>
                                                            <div class="clear"></div>
                                                            <p id="billing_phone" class="form-row form-row-wide address-field <?php echo $form["phone_number"]->hasError() ? "woocommerce-invalid" : "" ?>">
                                                                <label class="" for="billing_phone">Số điện thoại
                                                                    <abbr title="required" class="required">*</abbr>
                                                                </label>
                                                                <?php echo $form["phone_number"]->render()?>
                                                                <span  class="form-message-error"><?php echo $form["phone_number"]->getError() ?></span>
                                                            </p>
                                                            
                                                            <p id="billing_address" class="form-row form-row-wide phone-field <?php echo $form["address"]->hasError() ? "woocommerce-invalid" : "" ?>">
                                                                <label class="" for="billing_address">Địa chỉ
                                                                    <abbr title="required" class="required">*</abbr>
                                                                </label>
                                                                <?php echo $form["address"]->render()?>
                                                                <span  class="form-message-error"><?php echo $form["address"]->getError() ?></span>
                                                            </p>
                                                            <p id="order_comments_field" class="form-row notes">
                                                                <label class="" for="order_comments">Ghi chú</label>
                                                                <?php echo $form["note"]->render()?>
                                                                <span  class="form-message-error"><?php echo $form["note"]->getError() ?></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <!-- .woocommerce-billing-fields__field-wrapper-outer -->
                                                </div>
                                                <!-- .woocommerce-billing-fields -->
                                            </div>
                                            <!-- .col-1 -->
                                        </div>
                                        <!-- .col2-set -->
                                        <h3 id="order_review_heading">Thông tin đơn hàng</h3>
                                        <div class="woocommerce-checkout-review-order" id="order_review">
                                            <div class="order-review-wrapper">
                                                <h3 class="order_review_heading">Thông tin đơn hàng</h3>
                                                <table class="shop_table woocommerce-checkout-review-order-table">
                                                    <thead>
                                                        <tr>
                                                            <th class="product-name">Sản phẩm</th>
                                                            <th class="product-total">Giá</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $totalPrice = 0; foreach($listProductInCart as $product): $totalPrice += ($product['price']*$product['quantity'])?>
                                                          <tr class="cart_item">
                                                              <td class="product-name">
                                                                  <strong class="product-quantity"><?= $product['quantity'] ?> ×</strong> <?= $product['name'] ?>&nbsp;
                                                              </td>
                                                              <td class="product-total">
                                                                  <span class="woocommerce-Price-amount amount">
                                                                      <span class="woocommerce-Price-currencySymbol"></span><?= VtHelper::formatNumber($product['price']) ?>đ</span>
                                                              </td>
                                                          </tr>
                                                        <?php endforeach ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr class="order-total">
                                                            <th>Tổng tiền</th>
                                                            <td>
                                                                <strong>
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol"></span><?= VtHelper::formatNumber($totalPrice) ?>đ</span>
                                                                </strong>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                <!-- /.woocommerce-checkout-review-order-table -->
                                                <div class="woocommerce-checkout-payment" id="payment">
                                                    <div class="form-row place-order">
                                                        <button type="submit" class="button wc-forward text-center">Đặt hàng</button>
                                                    </div>
                                                </div>
                                                <!-- /.woocommerce-checkout-payment -->
                                            </div>
                                            <!-- /.order-review-wrapper -->
                                        </div>
                                        <!-- .woocommerce-checkout-review-order -->
                                    </form>
                                    <!-- .woocommerce-checkout -->
                                  <?php endif?>
                              </div>
                              <!-- .woocommerce -->
                          </div>
                          <!-- .entry-content -->
                      </div>
                      <!-- #post-## -->
                  </main>
                  <!-- #main -->
              </div>
              <!-- #primary -->
          </div>
          <!-- .row -->
      </div>
      <!-- .col-full -->
  </div>