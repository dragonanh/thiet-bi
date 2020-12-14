<?php slot('body_class'); echo 'right-sidebar single single-post'; end_slot() ?>
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
                    <article class="post format-image">
                        <header class="entry-header">
                            <h1 class="entry-title"><?php echo $article->getTitle() ?></h1>
                            <!-- .entry-title -->
                            <div class="entry-meta">
                                <span class="posted-on">
                                    <a rel="bookmark" href="javascript:void(0)">
                                      <time datetime="<?= $article->getCreatedAt()?>" class="entry-date published"><?= $article->getCreatedAt()?></time>
                                    </a>
                                </span>
                                <!-- .posted-on -->
                            </div>
                            <!-- .entry-meta -->
                        </header>
                        <!-- .entry-header -->
                        <div class="entry-content" itemprop="articleBody">
                          <?php echo VtHelper::strip_html_tags_and_decode($article->getContent()) ?>
                        </div>
                        <!-- .entry-content -->
                    </article>
                    <!-- .post -->
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