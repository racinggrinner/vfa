<?php
/**
 * @file views-view-list--vfa-article-views.tpl.php
 * Note: This file overrides the views default template views-view-list.tpl.php
 * @author Tom Grinsted <tg@peytz.dk>
 * Render list without $wrapper_prefix, $wrapper_suffix element (.item-list) 
 * and remove classes from the <li>
 */
?>
<?php if (!empty($title)) : ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<?php print $list_type_prefix; ?>
  <?php foreach ($rows as $id => $row): ?>
    <li><?php print $row; ?></li>
  <?php endforeach; ?>
<?php print $list_type_suffix; ?>
