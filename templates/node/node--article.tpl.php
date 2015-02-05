<?php
/**
 * @file
 * Returns the HTML for an Article node.
 *
 * node--article.tpl.php
 *
 * @author Christian Peterson <chp@peytz.dk> & Tom Grinsted <tg@peytz.dk>
 */
?>
<div class="content">
  <div class="container">
    <div class="col-10 push-1">
      <article class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix node node--article"<?php print $attributes; ?>>

        <?php if ($title_prefix || $title_suffix || $display_submitted || $unpublished || !$page && $title): ?>
          <header class="header header--node">
            <?php print render($title_prefix); ?>
            <h1<?php print $title_attributes; ?>><?php print render($title); ?></h1>
            <?php print render($title_suffix); ?>

            <?php if (!empty($content['field_introduction'])): ?>
            <div class="lead">
            <?php print render($content['field_introduction']); ?>
            </div>
            <?php endif; ?>

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
          </header>
        <?php endif; ?>

        <div class="node__meta text-small">
          <section class="flow-list">
            <dl class="flow-list__item">
              <dt class="item__header"><?php print t('Author'); ?></dt>
              <dd class="item__text"><?php print render($author_full_name); ?></dd>
            </dl>
          </section>

          <section class="flow-list">
            <dl class="flow-list__item">
              <dt class="item__header"><?php print t('Magazine'); ?></dt>
              <dd class="item__text">
                <?php print render($content['field_magazine']); ?>
              </dd>
            </dl>
            <dl class="flow-list__item">
              <dt class="item__header"><?php print t('Last Updated'); ?></dt>
              <dd class="item__text">
                <time pubdate datetime="<?php print $changed_date['date_iso']; ?>"><?php print $changed_date['date']; ?></time>
              </dd>
            </dl>
          </section>

          <section class="flow-list">
            <dl class="flow-list__item">
              <dd class="item__text">
                <?php print render($content['links']); ?>
                <?php if ($unpublished): ?>
                <mark class="unpublished"><?php print t('Unpublished'); ?></mark>
                <?php endif; ?>
              </dd>
            </dl>
          </section>
        </div>

        <div class="node__body">
          <?php print render($content['body']); ?>
        </div>

      </article>
    </div>
  </div>
</div>
