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
 * Represents a Trumbowyg RTE in a form in Auja.
 *
 * @author  Joris Blaak - <joris@label305.com>
 *
 * @package Label305\Auja\Page\FormItem
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
class TrumbowygFormItem extends FormItem {

    const TYPE = 'trumbowyg';

    /**
     * Buttons in buttonbar, when left NULL will fallback to default
     * @var array|null
     */
    protected $buttons = null;

    public function getType() {
        return self::TYPE;
    }

    /**
     * @param string $button
     */
    public function addButton($button) {
        if(is_null($this->buttons)) {
            $this->buttons = [];
        }
        $this->buttons[] = $button;
    }

    /**
     * @return array|null
     */
    public function getButtons() {
        return $this->buttons;
    }

    /**
     * @param array $buttons
     */
    public function setButtons(array $buttons) {
        $this->buttons = $buttons;
    }
    
    /**
     * @return array
     */
    public function basicSerialize() {
        $result = parent::basicSerialize();

        if(!is_null($this->buttons)) {
            foreach ($this->buttons as $button) {
                $result['buttons'][] = $button;
            }
        }

        return $result;
    }

}
