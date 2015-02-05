<?php
/**
 * @file
 * Returns the HTML for the user login form
 *
 * user-login.tpl.php
 *
 * @author Tom Grinsted <tg@peytz.dk>
 */
?>

<?php print drupal_render($form['name']); ?>
<?php print drupal_render($form['pass']); ?>
<?php print drupal_render($form['form_build_id']); ?>
<?php print drupal_render($form['form_id']); ?>
<div class="form__help">
  <a href="/user/password"><?php print t('Forgot your password?'); ?></a>
</div>
<?php print drupal_render($form['actions']); ?>
