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

namespace Label305\Auja\Menu;

/**
 * Represents a spacer in a menu.
 *
 * @author  Niek Haarman - <niek@label305.com>
 *
 * @package Label305\Auja\Menu
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
class SpacerMenuItem extends MenuItem {

    const TYPE = 'spacer';

    /**
     * @var String The text to display.
     */
    private $text;

    public function getMenuType() {
        return self::TYPE;
    }

    /**
     * @return String The text to display.
     */
    public function getText() {
        return $this->text;
    }

    /**
     * @param String $name The text to display.
     * @return $this
     */
    public function setText($name) {
        $this->text = $name;
        return $this;
    }

    public function getTypeProperties() {
        $result = array();

        $result['text'] = $this->text;

        return $result;
    }
}