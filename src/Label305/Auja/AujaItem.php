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

namespace Label305\Auja;

/**
 * The base class of all items in Auja.
 *
 * It provides amongst others both `jsonSerialize()` and `aujaSerialize()` methods, where:
 *  - `jsonSerialize()` should provide an array with key value pairs of properties of the AujaItem;
 *  - `aujaSerialize()` provides an array with at least the same properties which can directly be used to provide to the GUI.
 *
 * For convenience, the `__toString()` method is overriden to return the Json encoded value of the result of `aujaSerialize()`.
 *
 * @author  Niek Haarman - <niek@label305.com>
 *
 * @package Label305\Auja
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
abstract class AujaItem {

    /**
     * @return String The type of the `AujaItem`.
     */
    public abstract function getType();

    /**
     * @return array An `array` of key-value pairs of properties of this `AujaItem`.
     */
    public abstract function jsonSerialize();

    /**
     * Returns a ready-to-use `array` to be provided to the Auja GUI.
     *
     * This typically (but not always) consists of:
     *  - a `type` key with a value of `getType()`;
     *  - a `getType()` key with a value of `jsonSerialize()`. This will contain the properties of this `AujaItem`.
     *
     * @return array The ready-to-use `array`.
     */
    public function aujaSerialize() {
        $result = array();

        $result['type'] = $this->getType();
        $result[$this->getType()] = $this->jsonSerialize();

        return $result;
    }

    /**
     * @return String The Json encoded value of the result of `aujaSerialize()`.
     */
    function __toString() {
        return json_encode($this->aujaSerialize());
    }

}