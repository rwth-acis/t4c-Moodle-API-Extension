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
 * External Web Service Template
 *
 * @package    local_t4c_moodle
 * @copyright  2011 Moodle Pty Ltd (http://moodle.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once($CFG->libdir . "/externallib.php");

class local_external extends external_api {

    /**
     * Returns description of method parameters
     * @return external_function_parameters
     */
    public static function get_recent_course_activities_parameters() {
        return new external_function_parameters(
                array('since' => new external_value(PARAM_TEXT, 'The timestamp of the oldest events that should be retrieved.'))
        );
    }

    /**
     * Returns recent event
     * @return string events
     */
     public static function get_recent_course_activities($since){
        global $DB;
        // TODO: add courseid parameter (or from setting)
        // TODO: add module filter from settings
        $params = self::validate_parameters(self::get_recent_course_activities_parameters(),
                                             array('since' => $since));

        $events = $DB->get_records_sql('SELECT * FROM {logstore_standard_log} WHERE action = ? AND timecreated > ?',
                                    array("viewed",$since));

        // TODO: find a better way to format the output
	      return json_encode($events);
     }


     /*
      * Helper function to build the query which retrieves the events specified
      * in the plugin settings.
      */
     static function get_conditions() {
         $modules = '';

         if (get_config('local_t4c_moodle','assign') == 1)
              $modules .= "'mod_assign',";

         if (get_config('local_t4c_moodle','feedback') == 1)
              $modules .= "'mod_feedback',";

         if (get_config('local_t4c_moodle','mod_quiz') == 1)
              $modules .= "'mod_quiz',";

         if (get_config('local_t4c_moodle','url') == 1)
              $modules .= "'mod_url',";

         if (get_config('local_t4c_moodle','book') == 1)
              $modules .= "'mod_book',";

         if (get_config('local_t4c_moodle','resource') == 1)
              $modules .= "'mod_resource',";

         if (get_config('local_t4c_moodle','page') == 1)
              $modules .= "'mod_page',";

         if (get_config('local_t4c_moodle','data') == 1)
              $modules .= "'mod_data',";

         if (get_config('local_t4c_moodle','dialogue') == 1)
              $modules .= "'mod_dialogue',";

         if (get_config('local_t4c_moodle','forum') == 1)
              $modules .= "'mod_forum',";

         if (get_config('local_t4c_moodle','lesson') == 1)
               $modules .= "'mod_lesson',";

         if ($modules[$modules->length-1] == ',')
             $modules = $modules.substr($modules,0,$modules->length-1);

          return $modules;
     }

    /**
     * Returns description of method result value
     * @return external_description
     */
    public static function get_recent_course_activities_returns() {
        return new external_value(PARAM_TEXT, 'All events since the given timestamp for the courses specified in the plugin settings');
    }
}
