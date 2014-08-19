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

use Label305\Auja\AujaItem;
use Label305\Auja\Utils\Utils;

/**
 * Represents a page in Auja, which typically contains some sort of form,
 * amongst other `PageComponent`s.
 *
 * @author  Niek Haarman - <niek@label305.com>
 *
 * @package Label305\Auja\Page
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
class Page extends AujaItem {

    const TYPE = 'page';

    /**
     * @var PageComponent[] The PageComponents in this `Page`.
     */
    private $pageComponents = array();

    function getType() {
        return self::TYPE;
    }

    /**
     * Adds a `PageComponent` to this `Page`.
     *
     * @param PageComponent $pageComponent The `PageComponent` to add.
     * @param int           $position      The position in the page the `PageComponent` should have.
     *                                     If not set, it is appended to the end.
     */
    public function addPageComponent(PageComponent $pageComponent, $position = -1) {
        if (!is_int($position)) {
            throw new \InvalidArgumentException('position should be of type int');
        }

        if ($position < 0) {
            $position = count($this->pageComponents);
        }

        Utils::array_insert($this->pageComponents, $pageComponent, $position);
    }

    /**
     * @return PageComponent[] The `PageComponents` in this `Page`.
     */
    public function getPageComponents() {
        return $this->pageComponents;
    }

    function jsonSerialize() {
        $result = array();

        foreach ($this->pageComponents as $pageComponent) {
            $result[] = $pageComponent->aujaSerialize();
        }

        return $result;
    }

}
