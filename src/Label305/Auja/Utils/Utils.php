<?php
/*   _            _          _ ____   ___  _____
 *  | |          | |        | |___ \ / _ \| ____|
 *  | |      __ _| |__   ___| | __) | | | | |__
 *  | |     / _` | '_ \ / _ \ ||__ <|  -  |___ \
 *  | |____| (_| | |_) |  __/ |___) |     |___) |
 *  |______|\__,_|_.__/ \___|_|____/ \___/|____/
 *
 *  Copyright Label305 B.V. All rights reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Label305\Auja\Utils;

/**
 * A class providing some utility functions.
 *
 * @author  Niek Haarman - <niek@label305.com>
 *
 * @package Label305\Auja\Utils
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
class Utils {

    /**
     * Inserts given item into given array at given position.
     *
     * @param array   $array    The array to insert the item in.
     * @param mixed   $item     The item to insert.
     * @param integer $position The position to insert the item at.
     */
    public static function array_insert(&$array, $item, $position) {
        if ($position == 0) {
            /* Prepend the item */
            array_unshift($array, $item);
        } else {
            if (count($array) == $position) {
                $array[] = $item;
            } else {
                array_splice($array, $position, 0, array($item));
            }
        }
    }
}