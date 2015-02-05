<?php
/**
 * @file field--field_feature_image.tpl.php
 * @author Tom Grinsted <tg@peytz.dk>
 * Render clean image text field with a smacss like class.
 */
?>
<div class="field--photo-meta">
  <?php foreach ($items as $delta => $item): ?>
    <?php print render($item); ?>
  <?php endforeach; ?>
</div>
