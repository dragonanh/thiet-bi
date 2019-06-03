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
                                    <?php include_component('Cart', 'cartContent') ?>
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