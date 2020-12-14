
<header id="masthead" class="site-header header-v2" style="background-image: none; ">
    <div class="col-full desktop-only">
        <div class="row">
            <div class="site-branding">
                <a href="<?php echo url_for('@homepage') ?>" class="custom-logo-link" rel="home">
                    TechMarket
                </a>
                <!-- /.custom-logo-link -->
            </div>
            <!-- /.site-branding -->
            <!-- ============================================================= End Header Logo ============================================================= -->

            <form class="navbar-search" method="get" action="<?php echo url_for('search_product') ?>">
                <label class="sr-only screen-reader-text" for="search">Search for:</label>
                <div class="input-group">
                    <input type="text" id="search" class="form-control search-field product-search-field" dir="ltr" value="<?php echo $sf_request->getParameter('kw') ?>" name="kw" placeholder="Tìm kiếm sản phẩm..." />
                    <!-- .input-group-addon -->
                    <div class="input-group-btn input-group-append">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-search"></i>
                            <span class="search-btn">Tìm kiếm</span>
                        </button>
                    </div>
                    <!-- .input-group-btn -->
                </div>
                <!-- .input-group -->
            </form>

            <ul id="site-header-cart" class="site-header-cart menu">
                <?php //include_component('Common', 'cart') ?>
            </ul>

        </div>
        <!-- /.row -->
        <div class="techmarket-sticky-wrap">
            <div class="row">
                <nav id="navbar-primary" class="navbar-primary" aria-label="Navbar Primary" data-nav="flex-menu">
                    <ul id="menu-navbar-primary" class="nav yamm">
                        <?php include_component('Common', 'menu') ?>
                    </ul>
                    <!-- .nav -->
                </nav>
                <!-- .navbar-primary -->
            </div>
            <!-- /.row -->
        </div>
        <!-- .techmarket-sticky-wrap -->
    </div>
    <!-- .col-full -->

    <div class="col-full handheld-only">
        <div class="handheld-header">
            <div class="row">
                <div class="site-branding">
                    <a href="<?php echo url_for('@homepage') ?>" class="custom-logo-link" rel="home">
                        TechMarket
                    </a>
                    <!-- /.custom-logo-link -->
                </div>
                <!-- /.site-branding -->
                <!-- ============================================================= End Header Logo ============================================================= -->
            </div>
            <!-- /.row -->
            <div class="techmarket-sticky-wrap">
                <div class="row">
                    <nav id="handheld-navigation" class="handheld-navigation" aria-label="Handheld Navigation">
                        <button class="btn navbar-toggler" type="button">
                            <i class="tm tm-departments-thin"></i>
                            <span>Menu</span>
                        </button>
                        <div class="handheld-navigation-menu">
                            <span class="tmhm-close">Close</span>
                            <ul id="menu-departments-menu-1" class="nav">
                                <?php include_component('Common', 'menu') ?>
                            </ul>
                        </div>
                        <!-- .handheld-navigation-menu -->
                    </nav>
                    <!-- .handheld-navigation -->
                    <div class="site-search">
                        <div class="widget woocommerce widget_product_search">
                            <form role="search" method="get" class="woocommerce-product-search" action="<?php echo url_for('search_product') ?>">
                                <label class="screen-reader-text" for="woocommerce-product-search-field-0">Search for:</label>
                                <input type="search" id="woocommerce-product-search-field-0" class="search-field" placeholder="Search products&hellip;" value="<?php echo $sf_request->getParameter('kw') ?>" name="kw" />
                                <input type="submit" value="Search" />
                            </form>
                        </div>
                        <!-- .widget -->
                    </div>
                    <!-- .site-search -->

                    <?php //include_component('Common', 'cart', ['mode' => 'mobile']) ?>
                </div>
                <!-- /.row -->
            </div>
            <!-- .techmarket-sticky-wrap -->
        </div>
        <!-- .handheld-header -->
    </div>
    <!-- .handheld-only -->
</header>