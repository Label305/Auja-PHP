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

namespace Label305\Auja\Page;

use Label305\Auja\Shared\Button;

/**
 * Represents a header in a page in Auja.
 *
 * @author  Niek Haarman - <niek@label305.com>
 *
 * @package Label305\Auja\Page
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
class PageHeader extends PageComponent {

    const PAGE_TYPE = 'header';

    /**
     * @var String The text to display.
     */
    private $text;

    /**
     * @var Button[] The `Button`s to display.
     */
    private $buttons = array();

    public function getType() {
        return self::PAGE_TYPE;
    }

    /**
     * @param String $text The text to display.
     * @return String
     */
    public function setText($text) {
        $this->text = $text;
        return $text;
    }

    /**
     * @return String The text which will be displayed.
     */
    public function getText() {
        return $this->text;
    }

    /**
     * Adds a `Button` to this `PageHeader`.
     *
     * @param Button $button The `Button` to add.
     * @return $this
     */
    public function addButton(Button $button) {
        $this->buttons[] = $button;
        return $this;
    }

    /**
     * @return Button[] The `Button`s that will be displayed.
     */
    public function getButtons() {
        return $this->buttons;
    }

    /**
     * @return array
     */
    public function basicSerialize() {
        $result = array();

        $result['text'] = $this->text;

        $result['buttons'] = array();
        foreach ($this->buttons as $button) {
            $result['buttons'][] = $button->basicSerialize();
        }

        return $result;
    }
}