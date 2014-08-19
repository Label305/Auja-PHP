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

namespace spec\Label305\Auja\Page\FormItem;

set_include_path(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . PATH_SEPARATOR . get_include_path());
require_once('BaseSpec.php'); // TODO: can this be prettier?

use spec\Label305\Auja\BaseSpec;

class RangeFormItemSpec extends BaseSpec {

    function it_is_initializable() {
        $this->shouldHaveType('Label305\Auja\Page\FormItem\RangeForMitem');
    }

    function it_has_type_range() {
        $this->getType()->shouldBe('range');
    }

    function it_has_a_minimum_value() {
        $this->getMin()->shouldBe(0);
        $this->setMin(4);
        $this->getMin()->shouldBe(4);
    }

    function it_has_a_maximum_value() {
        $this->getMax()->shouldBe(0);
        $this->setMax(4);
        $this->getMax()->shouldBe(4);
    }
}
