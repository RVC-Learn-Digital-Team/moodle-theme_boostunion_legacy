<?php
namespace theme_boostunion_legacy\output;

defined('MOODLE_INTERNAL') || die();

class core_renderer extends \theme_boost_union\output\core_renderer {
    /**
     * Add extra class when this theme is active.
     */
    protected function add_body_classes() {
        parent::add_body_classes();
        $this->page->add_body_class('legacy-course');
    }
}