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

use Label305\Auja\AujaItem;

/**
 * An abstract class which represents a menu item in Auja.
 *
 * @author  Niek Haarman - <niek@label305.com>
 *
 * @package Label305\Auja\Menu
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
abstract class MenuItem extends AujaItem {

    const TYPE = 'menu';

    /**
     * @var int The order of the MenuItem.
     */
    private $order;

    /**
     * @return String The type of the MenuItem.
     */
    public abstract function getMenuType();

    /**
     * @return array A key-value pair of properties of this MenuItem.
     */
    public abstract function getTypeProperties();

    public function getType() {
        return self::TYPE;
    }

    /**
     * Sets the order of this MenuItem in the Menu.
     * This method should usually not be called, as Menu handles this for you.
     *
     * @param int $order The order of this MenuItem in the Menu.
     */
    public function setOrder($order) {
        $this->order = $order;
    }

    /**
     * @return int The order of this MenuItem in the Menu.
     */
    public function getOrder() {
        return $this->order;
    }

    public function jsonSerialize() {
        $result = array();

        $result['type'] = $this->getMenuType();
        $result['order'] = $this->order;
        $result[$this->getMenuType()] = $this->getTypeProperties();

        return $result;
    }

}