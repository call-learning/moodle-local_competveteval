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
 * Evaluation planning
 *
 * @package   local_cveteval
 * @copyright 2021 - CALL Learning - Laurent David <laurent@call-learning.fr>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_cveteval\local\persistent\planning;

use coding_exception;
use core\persistent;

defined('MOODLE_INTERNAL') || die();

/**
 * Evaluation planning entity
 *
 * @package   local_cveteval
 * @copyright 2021 - CALL Learning - Laurent David <laurent@call-learning.fr>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class entity extends persistent {
    const TABLE = 'local_cveteval_evalplan';

    /**
     * Usual properties definition for a persistent
     *
     * @return array|array[]
     * @throws coding_exception
     */
    protected static function define_properties() {
        return array(
            'groupid' => array(
                'type' => PARAM_INT,
                'default' => '',
                'format' => [
                    'type' => 'entity_selector',
                    'entityclass' => '\\local_cveteval\\local\\persistent\\group\\entity',
                    'displayfield' => 'name'
                ]
            ),
            'clsituationid' => array(
                'type' => PARAM_INT,
                'format' => [
                    'type' => 'entity_selector',
                    'entityclass' => '\\local_cveteval\\local\\persistent\\situation\\entity',
                    'displayfield' => 'title'
                ]
            ),
            'starttime' => array(
                'type' => PARAM_INT,
                'default' => '',
                'format' => [
                    'type' => 'datetime'
                ]
            ),
            'endtime' => array(
                'type' => PARAM_INT,
                'default' => '',
                'format' => [
                    'type' => 'datetime'
                ]
            )
        );
    }
}
