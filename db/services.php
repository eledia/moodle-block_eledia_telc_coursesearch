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

/**
 * External functions and service declarations for eledia_telc_coursesearch block
 *
 * @package    block_eledia_telc_coursesearch
 * @copyright  2024 Immanuel Pasanec <info@eledia.de>, eLeDia GmbH (made possible by TU Ilmenau)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$functions = [
    // The name of your web service function, as discussed above.
    'block_eledia_telc_coursesearch_get_categories' => [
        'classname' => 'core_course_external',
        'methodname' => 'get_categories',
        'classpath' => 'course/externallib.php',
        'description' => 'Return category details',
        'type' => 'read',
        'capabilities' => 'moodle/category:viewhiddencategories',
    ],
    'block_eledia_telc_coursesearch_get_available_categories' => [
        'classname' => 'block_eledia_telc_coursesearch\externallib',
        'methodname' => 'get_available_categories',
        'description' => 'Return category details',
        'type' => 'read',
        'ajax' => true,
    ],
    'block_eledia_telc_coursesearch_get_available_tags' => [
        'classname' => 'block_eledia_telc_coursesearch\externallib',
        'methodname' => 'get_available_tags',
        'description' => 'Return course tags',
        'type' => 'read',
        'ajax' => true,
    ],
    'block_eledia_telc_coursesearch_get_customfield_available_options' => [
        'classname' => 'block_eledia_telc_coursesearch\externallib',
        'methodname' => 'get_customfield_available_options',
        'description' => 'Return category details',
        'type' => 'read',
        'ajax' => true,
    ],
    'block_eledia_telc_coursesearch_get_customfields' => [
        'classname' => 'block_eledia_telc_coursesearch\externallib',
        'methodname' => 'get_customfields',
        'description' => 'Return customfields for filter rendering.',
        'type' => 'read',
        'ajax' => true,
    ],
    'block_eledia_telc_coursesearch_get_courseview' => [
        'classname' => 'block_eledia_telc_coursesearch\externallib',
        'methodname' => 'get_courseview',
        'description' => 'Return category details',
        'type' => 'read',
        'ajax' => true,
        // An optional list of services where the function will be included.
        /*'services' => [*/
        /*    // A standard Moodle install includes one default service:*/
        /*    // - MOODLE_OFFICIAL_MOBILE_SERVICE.*/
        /*    // Specifying this service means that your function will be available for*/
        /*    // use in the Moodle Mobile App.*/
        /*    MOODLE_OFFICIAL_MOBILE_SERVICE,*/
        /*]*/
    ],
];
