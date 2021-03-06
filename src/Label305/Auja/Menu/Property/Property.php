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

namespace Label305\Auja\Menu\Property;


use Label305\Auja\AujaItem;

/**
 * A class which represents a property of a ResourceMenuItem.
 *
 * @author  Niek Haarman - <niek@label305.com>
 *
 * @package Label305\Auja\Menu\Property
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
abstract class Property extends AujaItem {

    /**
     * @return array An `array` of key-value pairs of properties of this `AujaItem`.
     */
    public function basicSerialize() {
        $result = [];
        $result[$this->getType()] = $this->getProperties();
        return $result;
    }

    /**
     * @return array An array of key value pairs with the specific properties of the Property.
     */
    function getProperties() {
        return [];
    }
}