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
 * @package local_t4c_moodle
 *
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$plugin->version  = 2020071913;   // The (date) version of this module + 2 extra digital for daily versions
                                  // This version number is displayed into /admin/forms.php
                                  // TODO: if ever this plugin get branched, the old branch number
                                  // will not be updated to the current date but just incremented. We will
                                  // need then a $plugin->release human friendly date. For the moment, we use
                                  // display this version number with userdate (dev friendly)
$plugin->requires = 2019111802.02;  // Requires this Moodle version - at least 2.0
$plugin->cron     = 0;
$plugin->release = '3.8.2+ (Build: 20200320)';
$plugin->maturity = MATURITY_ALPHA;
$plugin->component = 'local_t4c_moodle';
