<?php if($pager->haveToPaginate()): ?>
<?php $url = (strpos($url,'?') !== false) ? $url.'&' : $url.'?'?>
<nav class="woocommerce-pagination">
    <ul class="page-numbers">
        <?php if($pager->getPage() != $pager->getFirstPage()): ?>
          <li><a class="page-numbers" href="<?php echo $url.'page=1'?>" aria-label="First"><span aria-hidden="true">&laquo;</span></a></li>
          <li><a class="page-numbers" href="<?php echo $url.'page='.$pager->getPreviousPage()?>" aria-label="Previous"><span aria-hidden="true">&lsaquo;</span></a></li>
        <?php endif ?>
        <?php foreach ($pager->getLinks() as $page): ?>
          <?php if ($page == $pager->getPage()): ?>
                <li><span class="page-numbers current"><?php echo $page ?></span></li>
          <?php else: ?>
            <li><a href="<?php echo $url.'page='.$page?>" class="page-numbers"><?php echo $page ?></a></li>
          <?php endif; ?>
        <?php endforeach; ?>
        <?php if($pager->getPage() != $pager->getLastPage()): ?>
          <li><a href="<?php echo $url.'page='.$pager->getNextPage()?>" class="page-numbers" aria-label="Next"><span aria-hidden="true">&rsaquo;</span></a></li>
          <li><a href="<?php echo $url.'page='.$pager->getLastPage()?>" class="page-numbers" aria-label="Last"><span aria-hidden="true">&raquo;</span></a></li>
        <?php endif ?>
    </ul>
</nav>
<?php endif ?>