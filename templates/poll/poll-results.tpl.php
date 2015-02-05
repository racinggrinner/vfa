<?php

/**
 * @file
 * Default theme implementation to display the poll results in a block.
 *
 * Variables available:
 * - $title: The title of the poll.
 * - $results: The results of the poll.
 * - $votes: The total results in the poll.
 * - $links: Links in the poll.
 * - $nid: The nid of the poll
 * - $cancel_form: A form to cancel the user's vote, if allowed.
 * - $raw_links: The raw array of links.
 * - $vote: The choice number of the current user's vote.
 *
 * @see template_preprocess_poll_results()
 *
 * @ingroup themeable
 */
?>
<div class="block block--center poll">
  <section class="block__body">
    <?php if ($block): ?>
      <h5 class="block__heading"><?php print $title; ?></h5>
    <?php endif ?>
    <div class="poll__choices">
      <?php print $results; ?>
    </div>
  </section>

  <section class="block__footer">
    <?php if (!empty($cancel_form)): ?>
      <?php print $cancel_form; ?>
    <?php endif; ?>
  </section>
</div>
<?php print t('Total votes: @votes', array('@votes' => $votes)); ?>
