<?php foreach ($results as $key => $result): ?>
  <section class="section-products-carousel new-arrival-carousel" id="section-products-carousel-<?php echo $result['id']?>">
    <header class="section-header">
      <h2 class="section-title"><?php echo $result['name'] ?></h2>
      <nav class="custom-slick-nav"></nav>
    </header>
    <!-- .section-header -->
    <div class="products-carousel 7-column-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:7,&quot;dots&quot;:true,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#section-products-carousel-<?php echo $result['id']?> .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:779,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1600,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
      <div class="container-fluid">
        <div class="woocommerce columns-7">
          <div class="products">
            <?php foreach ($result['list_product'] as $product): ?>
              <?php include_partial('Common/product', ['product' => $product]) ?>
            <?php endforeach; ?>
          </div>
        </div>
        <!-- .woocommerce -->
      </div>
      <!-- .row -->
    </div>
    <!-- .products-carousel -->
  </section>
  <!-- .section-products-carousel -->
<?php endforeach; ?>