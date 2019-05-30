<div role="main" class="main shop">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9">
              <form action="<?php echo url_for('search_product')?>">
                  <div class="input-group">
                      <input class="form-control" placeholder="Nhập từ khóa để tìm kiếm..." name="key_search"  type="text">
                      <span class="input-group-btn">
                                      <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                  </span>
                  </div>
              </form>
              <div class="col-md-12 cate-title">
                  <h3><?php echo sprintf('Có %s kết quả tìm kiếm cho: %s',$pager->getNbResults(), $searchParams['key_search']) ?></h3>
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