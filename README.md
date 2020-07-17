tech4comp Moodle Web Service Extension
------------------------------------------

This plugin implements a function `local_t4c_get_recent_course_activities` which can be enabled as a Moodle Web Service to retrieve entries from the **logstore** data table.
The function expects arguments *courseid* specifying the course and *since* which is an epoch timestamp to filter events by age.
Only view events are returned and the modules (e.g., book, url, quiz, etc.) can be specified in the settings page of the plugin.
