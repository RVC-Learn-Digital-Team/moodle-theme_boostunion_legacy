<?php
defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    $page = new admin_settingpage('theme_boostunion_legacy', get_string('configtitle', 'theme_boostunion_legacy'));

    $page->add(new admin_setting_configcheckbox(
        'theme_boostunion_legacy/enablelegacy',
        get_string('enablelegacy', 'theme_boostunion_legacy'),
        get_string('enablelegacy_desc', 'theme_boostunion_legacy'),
        1
    ));

    $page->add(new admin_setting_configtextarea(
        'theme_boostunion_legacy/customjs',
        get_string('customjs', 'theme_boostunion_legacy'),
        get_string('customjs_desc', 'theme_boostunion_legacy'),
        '', PARAM_RAW, 80, 10
    ));

    $page->add(new admin_setting_configtextarea(
        'theme_boostunion_legacy/customscss',
        get_string('customscss', 'theme_boostunion_legacy'),
        get_string('customscss_desc', 'theme_boostunion_legacy'),
        '', PARAM_RAW, 80, 20
    ));

    $settings->add($page);
}