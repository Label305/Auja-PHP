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
 * Represents a header in a form in Auja.
 *
 * @author  Niek Haarman - <niek@label305.com>
 *
 * @package Label305\Auja\Page
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
class FormHeader extends FormItem {

    const PAGE_TYPE = 'header';

    /**
     * @var String The text to display.
     */
    private $text;

    public function getType() {
        return self::PAGE_TYPE;
    }

    /**
     * @param String $text The text to display.
     */
    public function setText($text) {
        $this->text = $text;
    }

    /**
     * @return String The text which will be displayed.
     */
    public function getText() {
        return $this->text;
    }

    public function basicSerialize() {
        $result = array();
        $result['text'] = $this->text;
        return $result;
    }
}