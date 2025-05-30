<?php
defined('MOODLE_INTERNAL') || die();

$THEME->name = 'boostunion_legacy';
$THEME->parents = ['boost_union'];
$THEME->sheets = [];

// Pull the SCSS via helper in lib.php
$THEME->scss = function($theme) {
    return theme_boostunion_legacy_get_main_scss_content($theme);
};

// Required: define layouts (inherit from parent)
$THEME->layouts = [];

// Required: enable dock
$THEME->enable_dock = false;

// Use the proper renderer factory for themes
$THEME->rendererfactory = 'theme_overridden_renderer_factory';

// Enable "Raw initial SCSS" and "Raw SCSS" settings from parent
$THEME->extrascsscallback = 'theme_boost_union_get_extra_scss';

// Required: define which renderer classes this theme has
$THEME->csspostprocess = 'theme_boostunion_legacy_process_css';