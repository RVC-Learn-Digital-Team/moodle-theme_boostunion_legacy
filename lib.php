<?php
function theme_boostunion_legacy_get_main_scss_content($theme) {
    global $CFG;
    $parentpreset = $CFG->dirroot.'/theme/boost_union/scss/preset/default.scss';
    $legacy       = __DIR__.'/scss/legacy.scss';

    $scss  = file_get_contents($parentpreset);
    $scss .= "\n/* ---- legacy overrides ---- */\n";
    $scss .= file_get_contents($legacy);

    $custom = get_config('theme_boostunion_legacy', 'customscss');
    if (trim($custom)) {
        $scss .= "/* ---- admin custom SCSS ---- */" . $custom;
    }


    return $scss;
}

function theme_boostunion_legacy_page_init(moodle_page $page) {
    if ($code = trim(get_config('theme_boostunion_legacy', 'customjs'))) {
        // true ⇒ run after DOM is ready, avoids FOUC.
        $page->requires->js_init_code($code, true);
    }
}