<?php
defined('MOODLE_INTERNAL') || die();

$THEME->name = 'boostunion_legacy';
$THEME->parents = ['boost_union'];
$THEME->sheets = []; // we compile SCSS instead

// Pull the SCSS via helper in lib.php
$THEME->scss = function($theme) {
    return theme_boostunion_legacy_get_main_scss_content($theme);
};

// Use Boost renderer factory but override core_renderer to inject body class
$THEME->rendererfactory = 'theme_overridden_renderer_factory';

// Inherit all layouts from parent
$THEME->layouts = $THEME->parents[0]::$LAYOUTS ?? [];

// Enable "Raw initial SCSS" and "Raw SCSS" settings from parent
$THEME->extrascsscallback = 'theme_boost_union_get_extra_scss';