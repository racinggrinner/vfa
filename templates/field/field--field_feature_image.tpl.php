<?php

/**
 * @file field--field_feature_image.tpl.php
 * @author Tom Grinsted <tg@peytz.dk>
 * Render feature image field without ugly wrapping divs.
 */
?>
<?php foreach ($items as $delta => $item): ?>
  <?php print render($item); ?>
<?php endforeach; ?>
