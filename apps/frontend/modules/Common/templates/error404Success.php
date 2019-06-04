<?php slot('body_class'); echo 'page-template-default error-page'; end_slot() ?>

<div id="content" class="site-content">
  <div class="col-full">
    <div class="row">
      <div id="primary" class="content-area">
        <main id="main" class="site-main">
          <div class="error404">
            <div class="info-404">
              <h2 class="title">404!</h2>
              <p class="lead">Liên kết không tồn tại, Quý khách vui lòng truy cập liên kết khác</p>
              <div class="sub-form-row">
                <a class="btn btn-danger" href="<?php echo url_for('@homepage') ?>">Quay về trang chủ</a>
              </div>
            </div>
            <!-- .sub-form-row -->
          </div>
          <!-- .error404 -->
        </main>
        <!-- #main -->
      </div>
      <!-- #primary -->
    </div>
    <!-- .row -->
  </div>
  <!-- .col-full -->
</div>