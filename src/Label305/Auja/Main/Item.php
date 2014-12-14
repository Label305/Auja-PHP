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

namespace Label305\Auja\Main;

use Label305\Auja\AujaItem;

/**
 * Represents a square button at the left hand side of the screen.
 *
 * @author  Niek Haarman - <niek@label305.com>
 *
 * @package Label305\Auja
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
class Item extends AujaItem {

    /**
     * @var String The title of this `Item`.
     */
    private $title;

    /**
     * @var String The icon name. See `Label305\Auja\Icons` for a list of supported icons.
     */
    private $icon;

    /**
     * @var String The target URL.
     */
    private $target;

    public function getType() {
        /* Type is not used. */
        return null;
    }

    /**
     * @return String The title of this `Item`.
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param String $title The title of this `Item`.
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * @return String The icon name.
     */
    public function getIcon() {
        return $this->icon;
    }

    /**
     * @param String $icon The icon name. See `Label305\Auja\Icons` for a list of supported icons.
     */
    public function setIcon($icon) {
        $this->icon = $icon;
    }

    /**
     * @return String The target URL.
     */
    public function getTarget() {
        return $this->target;
    }

    /**
     * @param String $target The target URL.
     */
    public function setTarget($target) {
        $this->target = $target;
    }

    public function basicSerialize() {
        $result = array();

        $result['title'] = $this->title;
        $result['icon'] = $this->icon;
        $result['target'] = $this->target;

        return $result;
    }

    /**
     * Overridden to return the direct result of `basicSerialize()`.
     *
     * @return array The result of `basicSerialize()`.
     */
    public function aujaSerialize() {
        return $this->basicSerialize();
    }
}