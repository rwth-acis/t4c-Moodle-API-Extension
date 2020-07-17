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
 * Plugin settings
 *
 * @package local_t4c_moodle
 * @copyright
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();


if ($hassiteconfig) {

    $settings = new admin_settingpage('local_t4c_moodle', new lang_string('pluginname', 'local_t4c_moodle'));
    $ADMIN->add('localplugins', $settings);

	$settings->add(new admin_setting_configtext('local_t4c_moodle/courseids', get_string('local_t4c_moodle_courseids_key', 'local_t4c_moodle'),
	                   get_string('local_t4c_moodle_courseids', 'local_t4c_moodle'), PARAM_TEXT));

	$settings->add(new admin_setting_configcheckbox('local_t4c_moodle/assign', get_string('local_t4c_moodle_assign_key', 'local_t4c_moodle'),
	                   get_string('local_t4c_moodle_assign', 'local_t4c_moodle'), 1));

	$settings->add(new admin_setting_configcheckbox('local_t4c_moodle/feedback', get_string('local_t4c_moodle_feedback_key', 'local_t4c_moodle'),
	                   get_string('local_t4c_moodle_feedback', 'local_t4c_moodle'), 1));

	$settings->add(new admin_setting_configcheckbox('local_t4c_moodle/quiz', get_string('local_t4c_moodle_quiz_key', 'local_t4c_moodle'),
	                   get_string('local_t4c_moodle_quiz', 'local_t4c_moodle'), 1));

	$settings->add(new admin_setting_configcheckbox('local_t4c_moodle/url', get_string('local_t4c_moodle_url_key', 'local_t4c_moodle'),
	                   get_string('local_t4c_moodle_url', 'local_t4c_moodle'), 1));

	$settings->add(new admin_setting_configcheckbox('local_t4c_moodle/book', get_string('local_t4c_moodle_book_key', 'local_t4c_moodle'),
	                   get_string('local_t4c_moodle_book', 'local_t4c_moodle'), 1));

	$settings->add(new admin_setting_configcheckbox('local_t4c_moodle/resource', get_string('local_t4c_moodle_resource_key', 'local_t4c_moodle'),
	                   get_string('local_t4c_moodle_resource', 'local_t4c_moodle'), 1));

	$settings->add(new admin_setting_configcheckbox('local_t4c_moodle/page', get_string('local_t4c_moodle_page_key', 'local_t4c_moodle'),
	                   get_string('local_t4c_moodle_page', 'local_t4c_moodle'), 1));

	$settings->add(new admin_setting_configcheckbox('local_t4c_moodle/data', get_string('local_t4c_moodle_data_key', 'local_t4c_moodle'),
	                   get_string('local_t4c_moodle_data', 'local_t4c_moodle'), 1));

	$settings->add(new admin_setting_configcheckbox('local_t4c_moodle/dialogue', get_string('local_t4c_moodle_dialogue_key', 'local_t4c_moodle'),
	                   get_string('local_t4c_moodle_dialogue', 'local_t4c_moodle'), 1));

	$settings->add(new admin_setting_configcheckbox('local_t4c_moodle/forum', get_string('local_t4c_moodle_forum_key', 'local_t4c_moodle'),
	                   get_string('local_t4c_moodle_forum', 'local_t4c_moodle'), 1));

	$settings->add(new admin_setting_configcheckbox('local_t4c_moodle/lesson', get_string('local_t4c_moodle_lesson_key', 'local_t4c_moodle'),
	                   get_string('local_t4c_moodle_lesson', 'local_t4c_moodle'), 1));
}
