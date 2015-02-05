<?php
/**
 * @file
 * Returns the HTML for an Article node teaser (full).
 *
 * node--article--vfa-teaser-full.tpl.php
 *
 * @author Tom Grinsted <tg@peytz.dk>
 */
?>
<article class="teaser teaser--article <?php if (!empty($content['field_feature_image'])) : ?>has-media<?php endif; ?>">

	<?php if ($content['field_category']): ?>
	  <span class="teaser__meta">
	  	<span class="label">
	  		<?php print render($content['field_category']); ?>
	  	</span>
	  </span>
  <?php endif; ?>
  
  <a href="<?php print $node_url; ?>">
	  <?php if ($content['field_feature_image']): ?>
		  <div class="teaser__media">
		    <?php print render($content['field_feature_image']); ?>
		  </div>
	  <?php endif; ?>

	  <?php if ($title): ?>
	  <h3 class="teaser__title">
	    <?php print $title; ?>
	  </h3>
	  <?php endif; ?>
	  <?php if ($content['field_introduction']): ?>
	  	<p class="teaser__body">
	  		<?php print truncate_utf8(render($content['field_introduction']), 100, TRUE, TRUE); ?>
	  	</p>
	  <?php endif; ?>
	</a>

</article>
