<?php

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
 * Web service local plugin template external functions and service definitions.
 *
 * @package    local_t4c_moodle
 * @copyright  2011 Jerome Mouneyrac
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// We defined the web service functions to install.
$functions = array(
        'local_t4c_get_recent_course_activities' => array(
                'classname'   => 'local_external',
                'methodname'  => 'get_recent_course_activities',
                'classpath'   => 'local/t4c_moodle/externallib.php',
                'description' => 'Returns events since the specified timestamp of modules within courses specified within the settings',
                'type'        => 'read',
        )
);

// We define the services to install as pre-build services. A pre-build service is not editable by administrator.
$services = array(
	't4c Moodle API Extension' => array(
		'shortname' => 't4c_moodle',
                'functions' => array ('local_t4c_get_recent_course_activities'),
                'restrictedusers' => 0,
                'enabled'=>1,
        )
);
