<?php
namespace theme_boostunion_legacy\output;

defined('MOODLE_INTERNAL') || die();

class core_renderer extends \theme_boost_union\output\core_renderer {
    
    /**
     * The standard tags that should be included in the <head> tag
     * including meta tags, links to CSS, etc.
     *
     * @return string HTML fragment.
     */
    public function standard_head_html() {
        // Call page init to add custom JS
        theme_boostunion_legacy_page_init($this->page);
        
        return parent::standard_head_html();
    }
    
    /**
     * Add extra body classes when this theme is active.
     */
    public function body_attributes() {
        $attributes = parent::body_attributes();
        
        // Add legacy-course class
        $bodyclass = $this->body_css_classes(['legacy-course']);
        $attributes = str_replace('class="', 'class="legacy-course ', $attributes);
        
        return $attributes;
    }
}