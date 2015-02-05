<?php

/**
 * @file field--field_category.tpl.php
 * @author Tom Grinsted <tg@peytz.dk>
 * Render category field without wrapping divs.
 */
?>
<?php foreach ($items as $delta => $item): ?>
  <?php print render($item); ?>
<?php endforeach; ?>
