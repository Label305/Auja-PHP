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

/**
 * Represents an item (field, selector, etc) in a form in Auja.
 *
 * @author  Niek Haarman - <niek@label305.com>
 *
 * @package Label305\Auja\Page\FormItem
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
abstract class FormItem extends AujaItem {

    /**
     * @var String The name of the item.
     */
    private $name;

    /**
     * @var String The human readable name of the item.
     */
    private $label;

    /**
     * @var mixed The value of the item.
     */
    private $value;

    /**
     * @var bool Whether the property this item represents is required.
     */
    private $required = false;

    /**
     * @return String The name of the item.
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param String $name The name of the item.
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return String The human readable name of the item.
     */
    public function getLabel() {
        return $this->label;
    }

    /**
     * @param String $label The human readable name of the item.
     */
    public function setLabel($label) {
        $this->label = $label;
    }

    /**
     * @return mixed The value of the item.
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * @param mixed $value The value of the item.
     */
    public function setValue($value) {
        $this->value = $value;
    }

    /**
     * @param bool $required Whether the property this item represents is required.
     */
    public function setRequired($required) {
        $this->required = $required;
    }

    /**
     * @return bool Whether the property this item represents is required.
     */
    public function isRequired(){
        return $this->required;
    }

    public function basicSerialize() {
        $result = array();

        $result['name'] = $this->name;
        $result['label'] = $this->label;
        $result['value'] = $this->value;
        $result['required'] = $this->required;

        return $result;
    }

}