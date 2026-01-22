<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

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
