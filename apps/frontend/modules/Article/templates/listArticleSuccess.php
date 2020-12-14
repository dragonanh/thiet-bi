<?php slot('body_class'); echo 'right-sidebar blog-grid'; end_slot() ?>
<div id="content" class="site-content">
  <div class="col-full">
      <div class="row">
          <?php
            include_partial('Common/breadcrumb', array('breadcrumb' => array(
                ['title' => "Tin tức"],
            )))
          ?>
          <!-- .woocommerce-breadcrumb -->
          <div id="primary" class="content-area">
              <main id="main" class="site-main">
                  <?php $results = $pager->getResults()?>
                  <?php foreach($results as $article):?>
                    <article class="post format-image hentry">
                        <div class="media-attachment">
                            <div class="post-thumbnail">
                                <a href="<?php echo url_for('article_detail', array('slug' => $article->getSlug()))?>">
                                    <img alt="" class="wp-post-image" src="<?= sfConfig::get("app_domain_web_root").$article->getImagePath()?>">
                                </a>
                            </div>
                        </div>
                        <!-- .media-attachment -->
                        <div class="content-body">
                            <header class="entry-header">
                                <h1 class="entry-title">
                                    <a rel="bookmark" href="<?php echo url_for('article_detail', array('slug' => $article->getSlug()))?>">
                                      <?php echo $article->getTitle()?>
                                    </a>
                                </h1>
                                <!-- .entry-title -->
                                <div class="entry-meta">
                                    <span class="posted-on">
                                        <a href="<?php echo url_for('article_detail', array('slug' => $article->getSlug()))?>" rel="bookmark">
                                            <time datetime="<?= $article->getCreatedAt()?>" class="entry-date published"><?= $article->getCreatedAt()?></time>
                                        </a>
                                    </span>
                                </div>
                                <!-- .entry-meta -->
                            </header>
                            <!-- .entry-header -->
                            <div class="entry-content">
                                <p><?php echo $article->getDescription()?></p>
                            </div>
                            <!-- .post-excerpt -->
                            <div class="post-readmore">
                                <a class="btn btn-primary" href="<?php echo url_for('article_detail', array('slug' => $article->getSlug()))?>">Chi tiết</a>
                            </div>
                            <!-- .post-readmore -->
                        </div>
                    </article>
                  <?php endforeach;?>
                  <!-- .post-->
                  <?php if($pager->haveToPaginate()): ?>
                    <?php $url = (strpos($url,'?') !== false) ? $url.'&' : $url.'?'?>
                    <nav class="navigation pagination" id="post-navigation">
                        <span class="screen-reader-text">Posts navigation</span>
                        <div class="nav-links">
                            <ul class="page-numbers">
                              <?php foreach ($pager->getLinks() as $page): ?>
                                <?php if ($page == $pager->getPage()): ?>
                                  <li><a href="javascript:void(0)" class="page-numbers current"><?php echo $page ?></a></li>
                                <?php else: ?>
                                  <li><a href="<?php echo $url.'page='.$page?>" class="page-numbers"><?php echo $page ?></a></li>
                                <?php endif; ?>
                              <?php endforeach; ?>
                              <?php if($pager->getPage() != $pager->getLastPage()): ?>
                                <li><a href="<?php echo $url.'page='.$pager->getNextPage()?>" class="next page-numbers"><span aria-hidden="true">&rsaquo;</span></a></li>
                              <?php endif ?>
                            </ul>
                            <!-- .page-numbers -->
                        </div>
                        <!-- .nav-links -->
                    </nav>
                  <?php endif ?>
                  <!-- .navigation -->
              </main>
              <!-- #main -->
          </div>
          <!-- #primary -->
          <?php include_component('Common', 'sidebarRight') ?>
          <!-- .sidebar-blog -->
      </div>
      <!-- .row -->
  </div>
                <!-- .col-full -->
</div>