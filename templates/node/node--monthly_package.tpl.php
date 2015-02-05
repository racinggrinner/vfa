<?php
/**
 * @file
 * Returns the HTML for an Package node.
 *
 * node--monthly_package.tpl.php
 *
 * @author Tom Grinsted <tg@peytz.dk>
 */
?>
<div class="content node node--package <?php if (!empty($content['field_feature_image'])) : ?>has-media<?php endif; ?>">
  <?php if ($title_prefix || $title_suffix || $display_submitted || $unpublished || !$page && $title): ?>
    <header class="header header--node-wide">
      <div class="container">
        <div class="header__body col-10 push-1">
          <span><?php print t('Package'); ?></span>
          <?php print render($title_prefix); ?>
          <h1<?php print $title_attributes; ?>><?php print render($title); ?></h1>
          <?php print render($title_suffix); ?>
          <?php if (!empty($content['field_introduction'])): ?>
          <div class="lead">
          <?php print render($content['field_introduction']); ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </header>
  <?php endif; ?>

  <div class="container">
    <div class="col-10 push-1">
      <?php if (!empty($content['field_feature_image'])): ?>
      <figure class="feature feature--image">
        <?php print render($content['field_feature_image']); ?>

        <?php if (isset($content['field_feature_image']['#items'][0]['field_image_text']['und'][0]['safe_value'])): ?>
        <figcaption class="field--photo-meta">
        <?php print check_plain($content['field_feature_image']['#items'][0]['field_image_text']['und'][0]['safe_value']); ?>
        </figcaption>
        <?php endif; ?>

      </figure>
      <?php endif; ?>
    </div>
  </div>
</div>
