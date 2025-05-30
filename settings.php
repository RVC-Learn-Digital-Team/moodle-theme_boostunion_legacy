<?php
defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    // Create the settings page
    $settings = new theme_boost_admin_settingspage_tabs('themesettingboostunion_legacy', 
        get_string('configtitle', 'theme_boostunion_legacy'));

    // General settings tab
    $page = new admin_settingpage('theme_boostunion_legacy_general', 
        get_string('generalsettings', 'theme_boostunion_legacy'));

    // Checkbox setting for enabling legacy tweaks
    $name = 'theme_boostunion_legacy/enablelegacy';
    $title = get_string('enablelegacy', 'theme_boostunion_legacy');
    $description = get_string('enablelegacy_desc', 'theme_boostunion_legacy');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    // Custom JS textarea
    $name = 'theme_boostunion_legacy/customjs';
    $title = get_string('customjs', 'theme_boostunion_legacy');
    $description = get_string('customjs_desc', 'theme_boostunion_legacy');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, 80, 10);
    $page->add($setting);

    // Custom SCSS textarea
    $name = 'theme_boostunion_legacy/customscss';
    $title = get_string('customscss', 'theme_boostunion_legacy');
    $description = get_string('customscss_desc', 'theme_boostunion_legacy');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, 80, 20);
    $page->add($setting);

    $settings->add($page);
}