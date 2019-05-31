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

            <form class="navbar-search" method="get" action="home-v1.html">
                <label class="sr-only screen-reader-text" for="search">Search for:</label>
                <div class="input-group">
                    <input type="text" id="search" class="form-control search-field product-search-field" dir="ltr" value="" name="s" placeholder="Tìm kiếm sản phẩm..." />
                    <div class="input-group-addon search-categories popover-header">
                        <select name='product_cat' id='product_cat' class='postform resizeselect'>
                            <option value='0' selected='selected'>Tất cả danh mục</option>
                            <option class="level-0" value="television">Televisions</option>
                        </select>
                    </div>
                    <!-- .input-group-addon -->
                    <div class="input-group-btn input-group-append">
                        <input type="hidden" id="search-param" name="post_type" value="product" />
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
                <?php include_component('Common', 'cart') ?>
            </ul>

        </div>
        <!-- /.row -->
        <div class="techmarket-sticky-wrap">
            <div class="row">
                <nav id="navbar-primary" class="navbar-primary" aria-label="Navbar Primary" data-nav="flex-menu">
                    <ul id="menu-navbar-primary" class="nav yamm">
                        <li class="menu-item animate-dropdown">
                            <a title="ALL CATEGORIES" href="product-category.html">ALL CATEGORIES</a>
                        </li>
                        <li class="menu-item animate-dropdown">
                            <a title="COMPUTERS &amp; LAPTOPS" href="product-category.html">COMPUTERS &#038; LAPTOPS</a>
                        </li>
                        <li class="menu-item animate-dropdown">
                            <a title="CAMERAS &amp; PHOTO" href="product-category.html">CAMERAS &#038; PHOTO</a>
                        </li>
                        <li class="menu-item animate-dropdown">
                            <a title="PHONES &amp; TABLETS" href="product-category.html">PHONES &#038; TABLETS</a>
                        </li>
                        <li class="menu-item animate-dropdown">
                            <a title="GAMES &amp; CONSOLES" href="product-category.html">GAMES &#038; CONSOLES</a>
                        </li>
                        <li class="menu-item animate-dropdown">
                            <a title="TV &amp; AUDIO" href="product-category.html">TV &#038; AUDIO</a>
                        </li>
                        <li class="menu-item animate-dropdown">
                            <a title="CAR ELECTRONIC &amp; GPS" href="product-category.html">CAR ELECTRONIC &#038; GPS</a>
                        </li>
                        <li class="menu-item animate-dropdown">
                            <a title="ACCESORIES" href="product-category.html">ACCESORIES</a>
                        </li>
                        <li class="techmarket-flex-more-menu-item dropdown">
                            <a title="..." href="#" data-toggle="dropdown" class="dropdown-toggle">...</a>
                            <ul class="overflow-items dropdown-menu"></ul>
                        </li>
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
                    <a href="home-v1.html" class="custom-logo-link" rel="home">
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
                                <li class="highlight menu-item animate-dropdown">
                                    <a title="Value of the Day" href="shop.html">Value of the Day</a>
                                </li>
                                <li class="highlight menu-item animate-dropdown">
                                    <a title="Top 100 Offers" href="shop.html">Top 100 Offers</a>
                                </li>
                                <li class="highlight menu-item animate-dropdown">
                                    <a title="New Arrivals" href="shop.html">New Arrivals</a>
                                </li>
                                <li class="menu-item animate-dropdown">
                                    <a title="Gadgets" href="shop.html">Gadgets</a>
                                </li>
                                <li class="menu-item animate-dropdown">
                                    <a title="Virtual Reality" href="shop.html">Virtual Reality</a>
                                </li>
                            </ul>
                        </div>
                        <!-- .handheld-navigation-menu -->
                    </nav>
                    <!-- .handheld-navigation -->
                    <div class="site-search">
                        <div class="widget woocommerce widget_product_search">
                            <form role="search" method="get" class="woocommerce-product-search" action="home-v1.html">
                                <label class="screen-reader-text" for="woocommerce-product-search-field-0">Search for:</label>
                                <input type="search" id="woocommerce-product-search-field-0" class="search-field" placeholder="Search products&hellip;" value="" name="s" />
                                <input type="submit" value="Search" />
                                <input type="hidden" name="post_type" value="product" />
                            </form>
                        </div>
                        <!-- .widget -->
                    </div>
                    <!-- .site-search -->
                    <a class="handheld-header-cart-link has-icon" href="cart.html" title="View your shopping cart">
                        <i class="tm tm-shopping-bag"></i>
                        <span class="count">2</span>
                    </a>
                </div>
                <!-- /.row -->
            </div>
            <!-- .techmarket-sticky-wrap -->
        </div>
        <!-- .handheld-header -->
    </div>
    <!-- .handheld-only -->
</header>