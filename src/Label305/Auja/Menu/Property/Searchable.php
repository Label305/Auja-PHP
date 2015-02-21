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

namespace Label305\Auja\Menu\Property;

/**
 * A class which represents the Searchable property.
 *
 * @author  Niek Haarman - <niek@label305.com>
 *
 * @package Label305\Auja\Menu\Property
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
class Searchable extends Property {

    const TYPE = 'searchable';

    /**
     * @var String The target url.
     */
    private $target;

    /**
     * Creates a new searchable property with given target.
     *
     * @param String $target The target url. It should contain '%s' where the search query should go.
     *
     * @throws \InvalidArgumentException if the target is invalid.
     */
    function __construct($target) {
        $this->setTarget($target);
    }

    /**
     * @param String $target The target url. It should contain '%s' where the search query should go.
     *
     * @return $this
     * @throws \InvalidArgumentException if the target is invalid.
     */
    public function setTarget($target) {
        if (strpos($target, '%s') === false) {
            throw new \InvalidArgumentException('Searchable target url should contain \'%s\'.');
        }
        $this->target = $target;
        return $this;
    }

    /**
     * @return String The target url.
     */
    public function getTarget() {
        return $this->target;
    }

    /**
     * @return array
     */
    public function getProperties() {
        return [
            'target' => $this->target
        ];
    }

    /**
     * @return String
     */
    public function getType() {
        return self::TYPE;
    }
}
