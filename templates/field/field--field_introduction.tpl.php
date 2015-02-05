<?php

/**
 * @file field--field_introduction.tpl.php
 * @author Tom Grinsted <tg@peytz.dk>
 * Render introduction field without wrapping divs.
 */
?>
<?php foreach ($items as $delta => $item): ?>
  <?php print render($item); ?>
<?php endforeach; ?>
