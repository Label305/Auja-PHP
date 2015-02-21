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
 * Represents a select field with options in a form in Auja.
 *
 * @author  Niek Haarman - <niek@label305.com>
 *
 * @package Label305\Auja\Page\FormItem
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
class SelectFormItem extends FormItem {

    const TYPE = 'select';

    /**
     * @var SelectOption[] The options.
     */
    private $options = [];

    public function getType() {
        return self::TYPE;
    }

    /**
     * @return SelectOption[] The options.
     */
    public function getOptions() {
        return $this->options;
    }

    /**
     * @param SelectOption[] $options The options.
     * @return $this
     */
    public function setOptions($options) {
        $this->options = $options;
        return $this;
    }

    /**
     * @param SelectOption $option The option to add.
     * @return $this
     */
    public function addOption(SelectOption $option) {
        $this->options[] = $option;
        return $this;
    }

    /**
     * @return array
     */
    public function basicSerialize() {
        $result = parent::basicSerialize();

        $result['options'] = [];
        foreach ($this->options as $option) {
            $result['options'][] = $option->basicSerialize();
        }

        return $result;
    }
}
