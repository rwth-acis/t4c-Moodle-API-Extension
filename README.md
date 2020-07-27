# tech4comp Moodle Web Service Extension

This plugin implements a function `local_t4c_get_recent_course_activities` which can be enabled as a Moodle Web Service to retrieve entries from the **logstore** data table.
The function expects arguments *courseid* specifying the course and *since* which is an epoch timestamp to filter events by age.
Only view events are returned and the modules (e.g., book, url, quiz, etc.) can be specified in the settings page of the plugin.

## Installation

### Enable Web Services

Before the plugin is installed, please make sure that Moodle Web Services are enabled.
If they are not, go to `Site administration > Advanced features` and tick the checkbox **Enable web services**.
Furthermore, the REST protocol has to be activated which is done at `Administration > Site administration > Plugins > Web services > Manage protocols`.

### Upload Plugin

To install this plugin, you may [download](https://gitlab.com/Tech4Comp/t4c-moodle-api-extension/-/archive/master/t4c-moodle-api-extension-master.zip) the source code as a zip file, however the zip has to be renamed to **local_t4c_moodle.zip** and the folder inside has to be namen **local_t4c_moodle** which contains the content of this repo.
The archive structure must thus look as following, note that no **.git** directory must be present as this breaks the plugin:

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

Alternatively, the latest stable [release](https://github.com/rwth-acis/t4c-Moodle-API-Extension/releases/tag/v1.0) can be downloaded [here](https://github.com/rwth-acis/t4c-Moodle-API-Extension/releases/download/v1.0/local_t4c_moodle.zip) from GitHub as an already correctly formatted zip.

This zip can then be uploaded to Moodle to install the plugin by going to `Site administration > Plugins > Install plugins`.
Continue once the plugin has been validated and update the database (*this does not apply any changes to your existing database structure, but is a required step for the Moodle Plugin installation process*).
Once the plugin has been successfully installed, go to `Site administration > Plugins > Web services > External services`.
The last step is to enable the Web Service function for which an external service has to be registered, so if no external service exists yet, please add one.
The Web Service is then enabled by clicking on Functions of your respective external service and adding the function called **local_t4c_get_recent_course_activities**.


## Settings

The plugin settings provide a filter to only return view events of certain Moodle elemets via the `local_t4c_get_recent_course_activities` function.
To adjust the settings go to `Site administration > Plugins > Local plugins > tech4comp Moodle API Extension` and set the checkboxes of the modules that should be included.
The following table shows what effect the checkboxes have:

| Key | Description |
| --- | ----------- |
| meta | This key comprises all event targets without an objectid which constitute various components not stored as modules in Moodle (e.g. reports, or editing pages) |
| assign | Moodle Assignment Activity |
| feedback | Feedback for Moodle Quizzes or Assignments |
| quiz | Moodle Quiz Activity |
| url | Moodle URL Resource |
| book | Moodle Book Resource |
| resource | Although resource refers to different kinds of modules, in this context it refres to the Moodle File Resource |
| page | Moodle Page Resource |
| data | Moodle Database Activity |
| forum | Moodle Forum Activity |
| lesson | Moodle Lesson Activity |
| folder | Moodle Folder Resource |
