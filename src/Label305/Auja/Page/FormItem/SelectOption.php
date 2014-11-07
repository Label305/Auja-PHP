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

namespace Label305\Auja\Page\FormItem;


use Label305\Auja\AujaItem;

class SelectOption extends AujaItem {

    /**
     * @var String The label to show.
     */
    private $label;

    /**
     * @var mixed The value of the option when selected.
     */
    private $value;

    /**
     * Creates a new SelectOption.
     *
     * @param String $label The label to show.
     * @param mixed  $value The value of the option when selected.
     */
    function __construct($label, $value) {
        $this->label = $label;
        $this->value = $value;
    }

    /**
     * @return String The type of the `AujaItem`.
     */
    public function getType() {
        /* SelectOption has no type */
        return null;
    }


    /**
     * @return String The label to show.
     */
    public function getLabel() {
        return $this->label;
    }

    /**
     * @param String $label The label to show.
     */
    public function setLabel($label) {
        $this->label = $label;
    }

    /**
     * @return mixed The value of the option when selected.
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * @param mixed $value The value of the option when selected.
     */
    public function setValue($value) {
        $this->value = $value;
    }

    public function jsonSerialize() {
        $result = [];

        $result['label'] = $this->label;
        $result['value'] = $this->value;

        return $result;
    }
}