<div role="main" class="main shop">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <hr class="tall">
      </div>
    </div>

    <div class="row">
      <div class="col-md-9">
        <div class="col-md-12 cate-title">
          <h3><?php echo $category->getName() ?></h3>
        </div>
        <?php $results = $pager->getResults(Doctrine::HYDRATE_ARRAY) ?>
        <?php include_partial('vtCommon/list4Product', array('listProduct' => $results)) ?>

        <?php if($pager && $pager->haveToPaginate()): ?>
          <div class="row">
            <div class="col-md-12">
              <?php include_partial('vtCommon/pagination', array('pager' => $pager, 'url' => $url)) ?>
            </div>
          </div>
        <?php endif ?>
      </div>

      <?php include_component('vtCommon','sidebarRight')?>
    </div>
  </div>
</div>