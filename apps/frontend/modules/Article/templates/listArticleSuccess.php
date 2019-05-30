<?php
slot('metas');
include_partial('vtCommon/metas', array('metaArr' => $metaArr));
end_slot();
?>
<div class="row">
  <div class="col-md-9 main-content">
    <?php include_partial('vtCommon/boxSearch')?>

    <div class="wrap-order-sim">
      <div class="wrap-title"><?php echo $title?></div>
      <div class="wrap-content">
        <?php $results = $pager->getResults()?>
        <?php foreach ($results as $article):?>
          <div class="article-item">
            <div class="title"><a href="<?php echo url_for('article_detail', array('slug' => $article->getSlug()))?>"><?php echo $article->getTitle()?></a></div>
            <div class="description"><?php echo $article->getDescription()?></div>
          </div>
        <?php endforeach;?>
        <?php if($pager->haveToPaginate()):?>
          <?php include_partial('vtCommon/pagination', array('pager' => $pager, 'url' => $url))?>
        <?php endif?>
        
      </div>
    </div>
  </div>

  <?php include_partial('vtCommon/sidebarRight')?>
</div>