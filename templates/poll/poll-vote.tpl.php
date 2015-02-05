<?php

/**
 * @file
 * Default theme implementation to display voting form for a poll.
 *
 * - $choice: The radio buttons for the choices in the poll.
 * - $title: The title of the poll.
 * - $block: True if this is being displayed as a block.
 * - $vote: The vote button
 * - $rest: Anything else in the form that may have been added via
 *   form_alter hooks.
 *
 * @see template_preprocess_poll_vote()
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
      <?php print $choice; ?>
    </div>
    <?php print $rest; ?>
  </section>

  <section class="block__footer">
    <?php print $vote; ?>
  </section>
</div>
