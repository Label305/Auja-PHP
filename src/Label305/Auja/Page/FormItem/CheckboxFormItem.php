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

/**
 * Represents a checkbox in a form in Auja.
 *
 * @author  Niek Haarman - <niek@label305.com>
 *
 * @package Label305\Auja\Page\FormItem
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
class CheckboxFormItem extends FormItem {

    const TYPE = 'checkbox';

    /**
     * @var bool The checked status of the checkbox.
     */
    private $checked = false;

    function __construct() {
        $this->setValue(true);
    }

    public function getType() {
        return self::TYPE;
    }

    /**
     * @return boolean The checked status of the checkbox.
     */
    public function isChecked() {
        return $this->checked;
    }

    /**
     * @param boolean $checked The checked status of the checkbox.
     * @return $this
     */
    public function setChecked($checked) {
        $this->checked = $checked;
        return $this;
    }

    /**
     * @return array
     */
    public function basicSerialize() {
        $result = parent::basicSerialize();

        $result['checked'] = $this->checked;

        return $result;
    }
}