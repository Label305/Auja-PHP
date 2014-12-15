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
use Label305\Auja\Menu\Property\Property;

/**
 * A placeholder `MenuItem` which typically will hold database entries.
 *
 * When provided to Auja, a call is typically made to the `target` url
 * to fetch database entries, which will be placed inside the `ResourceMenuItem`.
 *
 * Behavior properties can be added to instances of this class, such as `Searchable`.
 *
 * @author  Niek Haarman - <niek@label305.com>
 *
 * @package Label305\Auja\Menu
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
class ResourceMenuItem extends MenuItem {

    const TYPE = 'resource';

    /**
     * @var String The url where to fetch resource items.
     */
    private $target;

    /**
     * @var Property[] The properties this resource has.
     */
    private $properties = array();

    public function getMenuType() {
        return self::TYPE;
    }

    /**
     * @param String $target The target url where to fetch resource items.
     * @return $this
     */
    public function setTarget($target) {
        $this->target = $target;
        return $this;
    }

    /**
     * @return String The target url where to fetch resource items.
     */
    public function getTarget(){
        return $this->target;
    }

    /**
     * @param Property $property The property to add.
     * @return $this
     */
    public function addProperty(Property $property) {
        $this->properties[] = $property;
        return $this;
    }

    /**
     * @return Property[] The properties this `ResourceMenuItem` has.
     */
    public function getProperties() {
        return $this->properties;
    }

    public function getTypeProperties() {
        $result = array();

        $result['target'] = $this->target;

        $result['properties'] = [];
        foreach ($this->properties as $property){
            $data = $property->basicSerialize();
            $result['properties'][key($data)] = $data[key($data)];
        }

        return $result;
    }
}