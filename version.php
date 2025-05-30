<?php
// This file is part of Moodle – http://moodle.org/

defined('MOODLE_INTERNAL') || die();

$plugin->component   = 'theme_boostunion_legacy';
$plugin->version     = 2025053000;   // YYYYMMDDXX – bump on each release
$plugin->release     = 'v1.0.0';
$plugin->maturity    = MATURITY_ALPHA;

// Must have Boost Union already installed (change version to match yours)
$plugin->dependencies = [
    'theme_boost_union' => 2024041811,
];