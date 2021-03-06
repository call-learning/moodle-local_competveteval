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
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Plugin upgrade steps are defined here.
 *
 * @package     local_cveteval
 * @category    upgrade
 * @copyright   2020 CALL Learning <contact@call-learning.fr>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Execute local_cveteval upgrade from the given old version.
 *
 * @param int $oldversion
 * @return bool
 */
function xmldb_local_cveteval_upgrade($oldversion) {
    if ($oldversion < 2021033016) {
        \local_cveteval\local\utils::create_scale_if_not_present();
        upgrade_plugin_savepoint(true, 2021033016, 'local', 'cveteval');
    }
    if ($oldversion < 2021033034) {
        \local_cveteval\local\utils::setup_mobile_service(true);
        upgrade_plugin_savepoint(true, 2021033034, 'local', 'cveteval');
    }
    return true;
}