<div class="col-md-3">
  <aside class="sidebar">
    <div class="tabs mb-xlg">
      <div class="tab-content">
        <div class="tab-pane active" id="popularPosts">
          <h5 class="heading-primary text-center"><i class="fa fa-star"></i> Sản phẩm nổi bật</h5>
          <hr>
          <ul class="simple-post-list">
            <?php foreach ($listFeaturedProduct as $product): ?>
              <li>
                <div class="post-image">
                  <div class="img-thumbnail">
                    <a href="<?php echo url_for('detail_product', array('slug' => $product['slug'])) ?>">
                      <img alt="" width="60" height="60" class="img-responsive" src="<?php echo $product['image_path'] ?>">
                    </a>
                  </div>
                </div>
                <div class="post-info">
                  <a href="<?php echo url_for('detail_product', array('slug' => $product['slug'])) ?>"><?php echo $product['name'] ?></a>
                  <div class="post-meta">
                    liên hệ 01654926551
                  </div>
                </div>
              </li>
            <?php endforeach ?>
          </ul>
        </div>
      </div>

      <br>

      <div class="tab-content">
        <div class="tab-pane active" id="popularPosts">
          <h5 class="heading-primary text-center"><i class="fa fa-tags"></i> Tin tức</h5>
          <hr>
          <ul class="simple-post-list">
            <?php foreach ($listArticle as $article): ?>
              <li>
<!--              <div class="post-image">-->
<!--                  <div class="img-thumbnail">-->
<!--                      <a href="--><?php //echo url_for('detail_article', array('slug' => $article->getSlug())) ?><!--">-->
<!--                          <img alt="" width="60" height="60" class="img-responsive" src="--><?php //echo $article->getImagePath() ?><!--">-->
<!--                      </a>-->
<!--                  </div>-->
<!--              </div>-->
                <div class="post-info">
                  <a href="<?php echo url_for('detail_article', array('slug' => $article->getSlug())) ?>"><?php echo $article->getTitle() ?></a>
                <div class="post-meta">
                    <?php echo VtHelper::truncate($article->getDescription(),40) ?>
                </div>
                </div>
              </li>
            <?php endforeach ?>
          </ul>
        </div>
      </div>
    </div>
  </aside>
</div>