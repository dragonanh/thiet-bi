<div role="main" class="main">

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <hr>
      </div>
    </div>

    <div class="row">
      <div class="col-md-9">
        <div class="blog-posts single-post">

          <article class="post post-large blog-single-post">
            <div class="post-date">
              <span class="day"><?php echo date('d', strtotime($article->getCreatedAt())) ?></span>
              <span class="month">T<?php echo ltrim(date('m', strtotime($article->getCreatedAt())),"0") ?></span>
            </div>

            <div class="post-content">

              <p class="post-title"><?php echo $article->getTitle() ?></p>

              <?php echo VtHelper::strip_html_tags_and_decode($article->getContent()) ?>

            </div>
          </article>

        </div>
      </div>

      <?php include_component('vtCommon','sidebarRight') ?>
    </div>

  </div>

</div>