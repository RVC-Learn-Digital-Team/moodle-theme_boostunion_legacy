<?php
defined('MOODLE_INTERNAL') || die();

// As a start, inherit the whole theme config from Boost Union.
require($CFG->dirroot . '/theme/boost_union/config.php');

// Then, we overwrite only the settings which differ between Boost Union and Boost Union Legacy.
$THEME->name = 'boostunion_legacy';
$THEME->scss = function($theme) {
    return theme_boostunion_legacy_get_main_scss_content($theme);
};
$THEME->parents = ['boost_union', 'boost'];
$THEME->extrascsscallback = 'theme_boostunion_legacy_get_extra_scss';
$THEME->prescsscallback = 'theme_boostunion_legacy_get_pre_scss';

// We need to duplicate the rendererfactory even if it is set to the same value as in Boost Union.
$THEME->rendererfactory = 'theme_overridden_renderer_factory';

// Replicate some settings from Boost Union at runtime into Boost Union Legacy's settings.
$unaddableblocks = get_config('theme_boost_union', 'unaddableblocks');
if (!empty($unaddableblocks)) {
    $THEME->settings->unaddableblocks = $unaddableblocks;
}
unset($unaddableblocks);

$scss = get_config('theme_boost_union', 'scss');
if (!empty($scss)) {
    $THEME->settings->scss = $scss;
}
unset($scss);

$scsspre = get_config('theme_boost_union', 'scsspre');
if (!empty($scsspre)) {
    $THEME->settings->scsspre = $scsspre;
}
unset($scsspre);