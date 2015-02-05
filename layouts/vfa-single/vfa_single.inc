<?php

/**
 * implementation of hook_panels_layouts()
 */
// Plugin definition
$plugin = array(
  'title' => t('VFA Single Column'),
  'category' => t('VFA'),
  'icon' => 'vfa_single.png',
  'theme' => 'vfa_panels_single',
  'css' => 'vfa_single.css',
  'regions' => array(
    'focus_primary' => t('Focus primary section'),
    'focus_secondary' => t('Focus secondary section'),
    'main' => t('Main content area'),
    'focus_tertiary' => t('Focus tertiary section')
  ),
);
