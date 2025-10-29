<?php
// This file is part of Moodle - http://moodle.org/
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
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Settings for the eledia_telc_coursesearch block
 *
 * @package    block_eledia_telc_coursesearch
 * @copyright  2019 Tom Dickman <tomdickman@catalyst-au.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    require_once($CFG->dirroot . '/blocks/eledia_telc_coursesearch/lib.php');

    // Presentation options heading.
    $settings->add(new admin_setting_heading('block_eledia_telc_coursesearch/appearance',
            get_string('appearance', 'admin'),
            ''));

    // Display Course Categories on Dashboard course items (cards, lists, summary items).
    $settings->add(new admin_setting_configcheckbox(
            'block_eledia_telc_coursesearch/displaycategories',
            get_string('displaycategories', 'block_eledia_telc_coursesearch'),
            get_string('displaycategories_help', 'block_eledia_telc_coursesearch'),
            1));

    // Enable / Disable available layouts.
    $choices = array(BLOCK_ETCOURSESEARCH_VIEW_CARD => get_string('list', 'block_eledia_telc_coursesearch'),
            // BLOCK_ETCOURSESEARCH_VIEW_LIST => get_string('list', 'block_eledia_telc_coursesearch'),
            BLOCK_ETCOURSESEARCH_VIEW_SUMMARY => get_string('cards', 'block_eledia_telc_coursesearch'));
    $settings->add(new admin_setting_configmulticheckbox(
            'block_eledia_telc_coursesearch/layouts',
            get_string('layouts', 'block_eledia_telc_coursesearch'),
            get_string('layouts_help', 'block_eledia_telc_coursesearch'),
            $choices,
            $choices));
    unset ($choices);

    // Enable / Disable course filter items.
    $settings->add(new admin_setting_heading('block_eledia_telc_coursesearch/availablegroupings',
            get_string('availablegroupings', 'block_eledia_telc_coursesearch'),
            get_string('availablegroupings_desc', 'block_eledia_telc_coursesearch')));

    $settings->add(new admin_setting_configcheckbox(
            'block_eledia_telc_coursesearch/displaygroupingallincludinghidden',
            get_string('allincludinghidden', 'block_eledia_telc_coursesearch'),
            '',
            0));

    $settings->add(new admin_setting_configcheckbox(
            'block_eledia_telc_coursesearch/displaygroupingall',
            get_string('all', 'block_eledia_telc_coursesearch'),
            '',
            1));

    $settings->add(new admin_setting_configcheckbox(
            'block_eledia_telc_coursesearch/displaygroupinginprogress',
            get_string('inprogress', 'block_eledia_telc_coursesearch'),
            '',
            1));

    $settings->add(new admin_setting_configcheckbox(
            'block_eledia_telc_coursesearch/displaygroupingpast',
            get_string('past', 'block_eledia_telc_coursesearch'),
            '',
            1));

    $settings->add(new admin_setting_configcheckbox(
            'block_eledia_telc_coursesearch/displaygroupingfuture',
            get_string('future', 'block_eledia_telc_coursesearch'),
            '',
            1));

    $settings->add(new admin_setting_configcheckbox(
            'block_eledia_telc_coursesearch/displaygroupingcustomfield',
            get_string('customfield', 'block_eledia_telc_coursesearch'),
            '',
            0));

    $choices = \core_customfield\api::get_fields_supporting_course_grouping();
    if ($choices) {
        $choices  = ['' => get_string('choosedots')] + $choices;
        $settings->add(new admin_setting_configselect(
                'block_eledia_telc_coursesearch/customfiltergrouping',
                get_string('customfiltergrouping', 'block_eledia_telc_coursesearch'),
                '',
                '',
                $choices));
    } else {
        $settings->add(new admin_setting_configempty(
                'block_eledia_telc_coursesearch/customfiltergrouping',
                get_string('customfiltergrouping', 'block_eledia_telc_coursesearch'),
                get_string('customfiltergrouping_nofields', 'block_eledia_telc_coursesearch')));
    }
    $settings->hide_if('block_eledia_telc_coursesearch/customfiltergrouping', 'block_eledia_telc_coursesearch/displaygroupingcustomfield');

    $settings->add(new admin_setting_configcheckbox(
            'block_eledia_telc_coursesearch/displaygroupingfavourites',
            get_string('favourites', 'block_eledia_telc_coursesearch'),
            '',
            1));

    $settings->add(new admin_setting_configcheckbox(
            'block_eledia_telc_coursesearch/displaygroupinghidden',
            get_string('hiddencourses', 'block_eledia_telc_coursesearch'),
            '',
            1));
}
