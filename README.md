# tech4comp Moodle Web Service Extension
------------------------------------------

This plugin implements a function `local_t4c_get_recent_course_activities` which can be enabled as a Moodle Web Service to retrieve entries from the **logstore** data table.
The function expects arguments *courseid* specifying the course and *since* which is an epoch timestamp to filter events by age.
Only view events are returned and the modules (e.g., book, url, quiz, etc.) can be specified in the settings page of the plugin.

## installation
-----------------

To install this plugin, you may [download](https://gitlab.com/Tech4Comp/t4c-moodle-api-extension/-/archive/master/t4c-moodle-api-extension-master.zip) the source code as a zip file, however the zip has to be renamed to **local_t4c_moodle.zip** and the folder inside has to be namen **local_t4c_moodle** which contains the content of this repo. The archive structure must thus look as following:

```
local_t4c_moodle.zip
+-- local_t4c_moodle
|   +-- db
|   |   +-- services.php
|   +-- lang/en
|   |   +-- local_t4c_moodle.php
|   +-- externallib.php
|   +-- settings.php
|   +-- version.php
```

This zip can then be uploaded to Moodle to install the plugin.
