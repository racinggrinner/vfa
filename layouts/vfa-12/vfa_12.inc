<?php

/**
 * implementation of hook_panels_layouts()
 */
// Plugin definition
$plugin = array(
  'title' => t('VFA 12'),
  'category' => t('VFA'),
  'icon' => 'vfa_12.png',
  'theme' => 'vfa_panels_12',
  'css' => 'vfa_12.css',
  'regions' => array(
    'focus_primary' => t('Focus primary section'),
    'focus_secondary' => t('Focus secondary section'),
    'main' => t('Main content area'),
    'focus_tertiary' => t('Focus tertiary section')
  ),
);
