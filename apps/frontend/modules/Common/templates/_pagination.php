<?php $url = (strpos($url,'?') !== false) ? $url.'&' : $url.'?'?>
<nav>
  <ul class="pagination pull-right">
    <?php if($pager->getPage() != $pager->getFirstPage()): ?>
      <li><a href="<?php echo $url.'page=1'?>" aria-label="First"><span aria-hidden="true">&laquo;</span></a></li>
      <li><a href="<?php echo $url.'page='.$pager->getPreviousPage()?>" aria-label="Previous"><span aria-hidden="true">&lsaquo;</span></a></li>
    <?php endif ?>
    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <li class="active"><a href="javascript:void(0)"><?php echo $page ?></a></li>
      <?php else: ?>
        <li><a href="<?php echo $url.'page='.$page?>"><?php echo $page ?></a></li>
      <?php endif; ?>
    <?php endforeach; ?>
    <?php if($pager->getPage() != $pager->getLastPage()): ?>
      <li><a href="<?php echo $url.'page='.$pager->getNextPage()?>" aria-label="Next"><span aria-hidden="true">&rsaquo;</span></a></li>
      <li><a href="<?php echo $url.'page='.$pager->getLastPage()?>" aria-label="Last"><span aria-hidden="true">&raquo;</span></a></li>
    <?php endif ?>
  </ul>
</nav>