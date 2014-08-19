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

namespace spec\Label305\Auja;

set_include_path(dirname(__FILE__) . DIRECTORY_SEPARATOR . PATH_SEPARATOR . get_include_path());
require_once('BaseSpec.php'); // TODO: can this be prettier?

class AujaItemSpec extends BaseSpec {

    function it_is_initializable() {
        $this->beAnInstanceOf('Label305\Auja\Main\Main');
        $this->shouldHaveType('Label305\Auja\AujaItem');
    }

    function it_can_return_auja_serializable_data(){
        $this->beAnInstanceOf('Label305\Auja\Main\Main');

        $this->aujaSerialize()->shouldHaveCount(2);
        $this->aujaSerialize()->shouldHaveKeys([
            'type',
            $this->getType()
        ]);
    }

    function it_returns_aujaSerialize_as_toString(){
        $this->beAnInstanceOf('Label305\Auja\Main\Main');

        $this->__toString()->shouldBeString(json_encode($this->aujaSerialize()->getWrappedObject()));
    }
}
