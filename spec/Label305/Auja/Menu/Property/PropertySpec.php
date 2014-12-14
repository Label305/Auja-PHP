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

namespace spec\Label305\Auja\Menu\Property;

set_include_path(dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.PATH_SEPARATOR.get_include_path());
require_once('BaseSpec.php'); // TODO: can this be prettier?

use Label305\Auja\Menu\Property\Property;
use spec\Label305\Auja\BaseSpec;

class PropertySpec extends BaseSpec {

    function let() {
        $this->beAnInstanceOf('spec\Label305\Auja\Menu\Property\DummyProperty');
    }

    function it_is_initializable() {
        $this->shouldHaveType('Label305\Auja\AujaItem');
        $this->shouldHaveType('Label305\Auja\Menu\Property\Property');
    }

    function it_can_return_basic_serializable_data() {
        $this->basicSerialize()->shouldBeArray();
        $this->basicSerialize()->shouldHaveCount(1);
        $this->basicSerialize()->shouldHaveKey('dummy');
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
