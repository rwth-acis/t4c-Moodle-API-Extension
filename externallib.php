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
                array('since' => new external_value(PARAM_TEXT, 'The timestamp of the oldest events that should be retrieved.'),
                      'courseid' => new external_value(PARAM_TEXT, 'The id of the course from which activities should be retrieved'))
        );
    }


     /*
      * Helper function to build the query which retrieves the events specified
      * in the plugin settings.
      */
     static function get_modules() {
         $modules = array();

         if (get_config('local_t4c_moodle','assign') == 1)
              $modules[] = "'mod_assign'";

         if (get_config('local_t4c_moodle','feedback') == 1)
              $modules[] = "'mod_feedback'";

         if (get_config('local_t4c_moodle','quiz') == 1)
              $modules[] = "'mod_quiz'";

         if (get_config('local_t4c_moodle','url') == 1)
              $modules[] = "'mod_url'";

         if (get_config('local_t4c_moodle','book') == 1)
              $modules[] = "'mod_book'";

         if (get_config('local_t4c_moodle','resource') == 1)
              $modules[] = "'mod_resource'";

         if (get_config('local_t4c_moodle','page') == 1)
              $modules[] = "'mod_page'";

         if (get_config('local_t4c_moodle','data') == 1)
              $modules[] = "'mod_data'";

         if (get_config('local_t4c_moodle','dialogue') == 1)
              $modules[] = "'mod_dialogue'";

         if (get_config('local_t4c_moodle','forum') == 1)
              $modules[] = "'mod_forum'";

         if (get_config('local_t4c_moodle','lesson') == 1)
               $modules[] = "'mod_lesson'";

          return $modules;
     }

     /**
      * Returns recent event
      * @return array events
      */
      public static function get_recent_course_activities($since,$courseid){
          global $DB;
          $params = self::validate_parameters(self::get_recent_course_activities_parameters(),
                                                array('since' => $since, 'courseid' => $courseid));
          if (!is_numeric($since) or !is_numeric($courseid)) {
            return [];
          }
          $query = "SELECT * FROM {logstore_standard_log} WHERE action = 'viewed' AND timecreated > " .$since. " AND courseid = " .$courseid. " AND component IN (" .implode(',', self::get_modules()). ")";
          $events = $DB->get_records_sql($query);

   	      return $events;
      }

    /**
     * Returns description of method result value
     * @return external_multiple_structure
     */
    public static function get_recent_course_activities_returns() {
        return new external_multiple_structure(
              new external_single_structure(array(
                'id' => new external_value(PARAM_RAW, "event id"),
                'eventname' => new external_value(PARAM_RAW, "event name"),
                'component' => new external_value(PARAM_RAW, "module name"),
                'action' => new external_value(PARAM_RAW, "type of event"),
                'target' => new external_value(PARAM_RAW, "object that was interacted with"),
                'objecttable' => new external_value(PARAM_RAW, "database table where module is stored"),
                'objectid' => new external_value(PARAM_RAW, "module specific id"),
                'crud' => new external_value(PARAM_RAW, "type of operation"),
                'edulevel' => new external_value(PARAM_RAW, "no idea"),
                'contextid' => new external_value(PARAM_RAW, "context id"),
                'contextlevel' => new external_value(PARAM_RAW, "no idea"),
                'contextinstanceid' => new external_value(PARAM_RAW, "context instance id"),
                'userid' => new external_value(PARAM_RAW, "id of interacting user"),
                'courseid' => new external_value(PARAM_RAW, "id of course containing module"),
                'relateduserid' => new external_value(PARAM_RAW, "id of additional involved user"),
                'anonymous' => new external_value(PARAM_RAW, "no idea"),
                'other' => new external_value(PARAM_RAW, "free text field"),
                'timecreated' => new external_value(PARAM_RAW, "timestamp of event"),
                'origin' => new external_value(PARAM_RAW, "how the event was triggered"),
                'ip' => new external_value(PARAM_RAW, "ip of event trigger"),
                'realuserid' => new external_value(PARAM_RAW, "real user id")
              ))
          );
    }
}
