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
 * A class which is used to provide a list of database entries to Auja.
 *
 * @author  Niek Haarman - <niek@label305.com>
 *
 * @package Label305\Auja\Menu
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
class Resource extends AujaItem {

    const TYPE = 'items';

    /**
     * @var MenuItem[] The `MenuItem`s which contain the database entries.
     */
    private $items = [];

    /**
     * @var String|null The url to the next set of items, or `null` if none.
     */
    private $nextPageUrl;

    public function getType() {
        return self::TYPE;
    }

    /**
     * Adds a `MenuItem`, which contains a database entry.
     *
     * @param MenuItem $item The item to add. Must not be a `ResourceMenuItem`.
     * @return $this
     */
    public function addItem(MenuItem $item) {
        if($item instanceof ResourceMenuItem){
            throw new \InvalidArgumentException('ResourceMenuItem passed to Resource::addItem(MenuItem). You cannot nest ResourceMenuItems.');
        }

        $this->items[] = $item;

        return $this;
    }

    /**
     * @return LinkMenuItem[] The added LinkMenuItems.
     */
    public function getItems() {
        return $this->items;
    }

    /**
     * @param String|null $nextPageUrl The url to the next set of items, or `null` if none.
     * @return $this
     */
    public function setNextPageUrl($nextPageUrl) {
        $this->nextPageUrl = $nextPageUrl;
        return $this;
    }

    /**
     * @return String The url to the next set of items, or `null` if none.
     */
    public function getNextPageUrl() {
        return $this->nextPageUrl;
    }

    /**
     * @return array
     */
    public function basicSerialize() {
        $result = array();

        foreach ($this->items as $item) {
            $result[] = $item->basicSerialize();
        }

        return $result;
    }

    /**
     * Overridden to add an extra `paging` section to the result.
     *
     * @return array The ready-to-use `array`.
     */
    public function aujaSerialize() {
        $result = array();

        $result['type'] = $this->getType();
        $result[$this->getType()] = $this->basicSerialize();

        if ($this->nextPageUrl != null) {
            $result['paging'] = array();
            $result['paging']['next'] = $this->nextPageUrl;
        }

        return $result;
    }
}