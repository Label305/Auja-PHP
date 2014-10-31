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

namespace spec\Label305\Auja\Menu;

set_include_path(dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.PATH_SEPARATOR.get_include_path());
require_once('BaseSpec.php'); // TODO: can this be prettier?

use Label305\Auja\Menu\Property\Property;
use spec\Label305\Auja\BaseSpec;

class ResourceMenuItemSpec extends BaseSpec {

    function it_is_initializable() {
        $this->shouldHaveType('Label305\Auja\AujaItem');
        $this->shouldHaveType('Label305\Auja\Menu\MenuItem');
        $this->shouldHaveType('Label305\Auja\Menu\ResourceMenuItem');
    }

    function it_has_resource_menu_type() {
        $this->getMenuType()->shouldBe('resource');
    }

    function it_has_a_target_url() {
        $this->setTarget('url');
        $this->getTarget()->shouldBe('url');
    }

    function it_has_properties(Property $property1, Property $property2){
        $this->addProperty($property1);
        $this->addProperty($property2);

        $this->getProperties()->shouldBeArray();
        $this->getProperties()->shouldContain($property1);
        $this->getProperties()->shouldContain($property2);
    }

    function it_has_type_properties() {
        $this->getTypeProperties()->shouldHaveKeys(array(
            'target',
            'properties'
        ));
    }

    function it_can_return_json_serializable_data() {
        $property = new DummyProperty('target');
        $this->addProperty($property);

        $this->jsonSerialize()->shouldHaveKey('resource');

        $data = $this->jsonSerialize()->getWrappedObject();
        if(!is_array($data['resource']['properties'])) {
            throw new \Exception('properties value is no array');
        }

        if(!isset($data['resource']['properties']['dummy'])) {
            throw new \Exception('Properties array not correctly filled');
        }
    }
}

class DummyProperty extends Property {

    /**
     * @return String The type of the `AujaItem`.
     */
    public function getType() {
        return 'dummy';
    }
}
