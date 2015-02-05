<?php
/**
 * @file
 * This template provides a very simple "one column" panel display layout.
 *
 */
?>

<?php if (!empty($content['focus_primary'])) : ?>
  <div class="container">
    <div class="col-12">
      <?php print $content['focus_primary']; ?>
    </div>
  </div>
<?php endif; ?>

<?php if (!empty($content['focus_secondary'])) : ?>
  <div class="container">
    <div class="col-12">
      <?php print $content['focus_secondary']; ?>
    </div>
  </div>
<?php endif; ?>

<?php if (!empty($content['main'])) : ?>
  <div class="main">
    <?php print $content['main']; ?>
  </div>
<?php endif; ?>

<?php if (!empty($content['focus_tertiary'])) : ?>
  <div class="container">
    <div class="col-12">
      <?php print $content['focus_tertiary']; ?>
    </div>
  </div>
<?php endif; ?>
