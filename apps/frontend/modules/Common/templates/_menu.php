<?php foreach ($listCategory as $category): ?>
  <li class="menu-item animate-dropdown">
    <a title="<?php echo $category['name'] ?>" href="<?php echo url_for('list_product_category', ['slug' => $category['slug']]) ?>"><?php echo $category['name'] ?></a>
  </li>
<?php endforeach; ?>
<li class="menu-item animate-dropdown">
    <a title="tin tức" href="<?php echo url_for('@list_article') ?>">Tin tức</a>
</li>