<?php
function theme_boostunion_legacy_get_main_scss_content($theme) {
    global $CFG;
    
    // Use your preset.scss file instead of trying to load individual files
    $preset = __DIR__ . '/scss/preset.scss';
    
    if (!file_exists($preset)) {
        // Fallback to parent theme if preset doesn't exist
        return file_get_contents($CFG->dirroot . '/theme/boost_union/scss/preset/default.scss');
    }
    
    $scss = file_get_contents($preset);
    
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

function theme_boostunion_legacy_process_css($css, $theme) {
    // Allow parent theme to process CSS first
    if (function_exists('theme_boost_union_process_css')) {
        $css = theme_boost_union_process_css($css, $theme);
    }
    return $css;
}