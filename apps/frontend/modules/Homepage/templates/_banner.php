<?php if(count($banners)):?>
<div class="homev3-slider-with-banners row">
  <div class="slider">
    <div class="home-v3-slider home-slider">

      <?php foreach($banners as $banner):?>
        <div class="slider-1">
          <img class="banner_image" src="<?php echo sfConfig::get("app_domain_web_root").$banner["image_path"]?>" alt="<?= $banner["title"] ?>">
          <div class="caption">
            <div class="title"><?= $banner["title"] ?></div>
            <div class="sub-title"><?= $banner["description"] ?></div>
            <?php if($banner["link"]): ?>
              <div class="button">
                <a href="<?= $banner["link"] ?>">
                  Xem ngay
                  <i class="tm tm-long-arrow-right"></i>
                </a>
              </div>
            <?php endif;?>
          </div>
        </div>
      <?php endforeach;?>

    </div>
  </div>
</div>
<?php endif?>