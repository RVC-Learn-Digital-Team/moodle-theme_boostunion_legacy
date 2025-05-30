<?php

/**
 * Returns the main SCSS content.
 *
 * @param \core\output\theme_config $theme The theme config object.
 * @return string
 */
function theme_boostunion_legacy_get_main_scss_content($theme) {
    global $CFG;

    // Require the necessary libraries.
    require_once($CFG->dirroot . '/theme/boost_union/lib.php');

    // As a start, get the compiled main SCSS from Boost Union.
    // This way, Boost Union Legacy will ship the same SCSS code as Boost Union itself.
    $scss = theme_boost_union_get_main_scss_content(\core\output\theme_config::load('boost_union'));

    // Add Boost Union Legacy's post SCSS file to the stack.
    $scss .= file_get_contents($CFG->dirroot . '/theme/boostunion_legacy/scss/post.scss');

    return $scss;
}

/**
 * Get SCSS to prepend.
 *
 * @param \core\output\theme_config $theme The theme config object.
 * @return string
 */
function theme_boostunion_legacy_get_pre_scss($theme) {
    global $CFG;

    // Require the necessary libraries.
    require_once($CFG->dirroot . '/theme/boost_union/lib.php');

    // Initialize the Pre SCSS code
    $scss = '';

    // Add Boost Union Legacy's pre SCSS file to the stack.
    $scss .= file_get_contents($CFG->dirroot . '/theme/boostunion_legacy/scss/pre.scss');

    return $scss;
}

/**
 * Inject additional SCSS.
 *
 * @param \core\output\theme_config $theme The theme config object.
 * @return string
 */
function theme_boostunion_legacy_get_extra_scss($theme) {
    global $CFG;

    // Initialize the Extra SCSS code
    $scss = '';

    // Add custom SCSS from settings
    $custom = get_config('theme_boostunion_legacy', 'customscss');
    if (trim($custom)) {
        $scss .= "\n/* ---- admin custom SCSS ---- */\n" . $custom;
    }

    return $scss;
}

function theme_boostunion_legacy_page_init(moodle_page $page) {
    if ($code = trim(get_config('theme_boostunion_legacy', 'customjs'))) {
        // true ⇒ run after DOM is ready, avoids FOUC.
        $page->requires->js_init_code($code, true);
    }
}