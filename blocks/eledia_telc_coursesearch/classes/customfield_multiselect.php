<?php

namespace block_eledia_telc_coursesearch;

class customfield_multiselect {
    private $customfield;

    public function __construct($customfield) {
        $this->customfield = $customfield;
    }

    public function course_grouping_format_values($values) {
        $all_options = $this->customfield->get_options_array($this->customfield);

        $intermediate = [];
        foreach ($values as $value) {
            $intermediate = array_merge($intermediate, explode(',', $value));
        }
        $unique_values = array_values(array_unique($intermediate));
        $options = [];
        foreach ($unique_values as $unique_value) {
            $options[$unique_value] = $all_options[$unique_value];
        }
        return $options;
    }
}
