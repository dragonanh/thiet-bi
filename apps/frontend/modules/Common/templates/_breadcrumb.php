<nav class="woocommerce-breadcrumb">
    <a href="<?php echo url_for('@homepage') ?>">Trang chủ</a>
    <?php foreach($breadcrumb as $key => $item): ?>
        <?php $isLast = $key == (count($breadcrumb) - 1) ?>
        <span class="delimiter">
            <i class="tm tm-breadcrumbs-arrow-right"></i>
        </span>
        <?php if(!$isLast): ?>
            <a href="<?php echo $item['url'] ?>">
              <?php echo $item['title'] ?>
            </a>
        <?php else: ?>
            <?php echo $item['title'] ?>
        <?php endif ?>
        </li>
    <?php endforeach; ?>
</nav>