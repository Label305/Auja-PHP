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

use InvalidArgumentException;

use Label305\Auja\AujaItem;
use Label305\Auja\Utils\Utils;

/**
 * Represents a menu in Auja, which contains `MenuItems`.
 *
 * @author  Niek Haarman - <niek@label305.com>
 *
 * @package Label305\Auja\Menu
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
class Menu extends AujaItem {

    const TYPE = 'menu';

    /**
     * @var MenuItem[] The menuItems in this menu.
     */
    private $menuItems = array();

    function getType() {
        return self::TYPE;
    }

    /**
     * Adds a MenuItem to this Menu.
     *
     * @param MenuItem $menuItem The MenuItem to add.
     * @param int $position The position in the menu the MenuItem should have.
     *                           If not set, it is appended to the end.
     * @return $this
     */
    public function addMenuItem(MenuItem $menuItem, $position = -1) {
        if (!is_int($position)) {
            throw new InvalidArgumentException('position should be of type int.');
        }

        if ($position < 0) {
            $position = count($this->menuItems);
        }

        $menuItem->setOrder($position);

        Utils::array_insert($this->menuItems, $menuItem, $position);

        return $this;
    }

    /**
     * @return MenuItem[] The MenuItems in this Menu.
     */
    public function getMenuItems() {
        return $this->menuItems;
    }

    public function basicSerialize() {
        $result = array();

        foreach ($this->menuItems as $menuItem) {
            $result[] = $menuItem->basicSerialize();
        }

        return $result;
    }
}
