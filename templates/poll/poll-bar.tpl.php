<?php

/**
 * @file
 * Default theme implementation to display the bar for a single choice in a
 * poll.
 *
 * Variables available:
 * - $title: The title of the poll.
 * - $votes: The number of votes for this choice
 * - $total_votes: The number of votes for this choice
 * - $percentage: The percentage of votes for this choice.
 * - $vote: The choice number of the current user's vote.
 * - $voted: Set to TRUE if the user voted for this choice.
 *
 * @see template_preprocess_poll_bar()
 */

// Check wether this choice were voted for
$voted_class = ((bool)$vote) ? ' item--selected' : '';
?>

<div class="choices__item<?php print $voted_class; ?>">

  <div class="poll__title"><?php print $title; ?>
    <span class="poll__text">– <?php print format_plural($votes, '1 vote', '@count votes'); ?></span>
  </div>
  <div class="progress">
    <div class="progress__bar" role="progressbar" aria-valuenow="<?php print $percentage; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php print $percentage; ?>%;">
    </div>
  </div>

</div>
