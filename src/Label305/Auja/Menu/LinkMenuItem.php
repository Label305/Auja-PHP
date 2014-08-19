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
 * Represents a link item in a menu.
 *
 * @author  Niek Haarman - <niek@label305.com>
 *
 * @package Label305\Auja\Menu
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
class LinkMenuItem extends MenuItem {

    const MENU_TYPE = 'link';

    /**
     * @var String The name of the LinkMenuItem.
     */
    private $text;

    /**
     * @var String The target.
     */
    private $target;

    /**
     * @var String The icon name.
     */
    private $icon;

    /**
     * @return String The type of the LinkMenuItem
     */
    public function getMenuType() {
        return self::MENU_TYPE;
    }

    /**
     * @return String The name of the LinkMenuItem.
     */
    public function getText() {
        return $this->text;
    }

    /**
     * @param String $text The name of the LinkMenuItem.
     */
    public function setText($text) {
        $this->text = $text;
    }

    /**
     * @param String $target The target this link should point to.
     */
    public function setTarget($target) {
        $this->target = $target;
    }

    /**
     * @return String The target this link points to.
     */
    public function getTarget() {
        return $this->target;
    }

    /**
     * @param String $icon The name of the icon.
     */
    public function setIcon($icon) {
        $this->icon = $icon;
    }

    /**
     * @return String The name of the icon.
     */
    public function getIcon() {
        return $this->icon;
    }

    public function getTypeProperties() {
        $result = array();

        $result['text'] = $this->text;
        $result['target'] = $this->target;
        $result['icon'] = $this->icon;

        return $result;
    }

}
