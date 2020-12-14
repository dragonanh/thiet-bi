<?php slot('body_class'); echo 'page-template-template-homepage-v3'; end_slot() ?>
<div id="content" class="site-content" tabindex="-1">
    <div class="col-full">
        <div class="row">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <?php include_component('Homepage','banner') ?>

                    <?php include_partial('features') ?>
                    <!-- /.features list -->

                    <?php include_component('Homepage', 'listProductCategory') ?>

                    <?php include_component('Homepage', 'recentlyViewed') ?>
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->
        </div>
        <!-- .row -->
    </div>
    <!-- .col-full -->
</div>