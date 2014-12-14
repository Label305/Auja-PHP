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

use Label305\Auja\Page\FormItem\SelectOption;
use spec\Label305\Auja\BaseSpec;

class SelectFormItemSpec extends BaseSpec {

    function it_is_initializable() {
        $this->shouldHaveType('Label305\Auja\Page\FormItem\SelectFormItem');
    }

    function it_has_type_select() {
        $this->getType()->shouldBe('select');
    }

    function it_has_options(SelectOption $option1, SelectOption $option2) {
        $this->getOptions()->shouldBeArray();
        $this->addOption($option1);
        $this->addOption($option2);
        $this->getOptions()->shouldContain($option1);
        $this->getOptions()->shouldContain($option2);
    }

    function it_can_mass_assign_options(SelectOption $option1, SelectOption $option2) {
        $this->setOptions([$option1, $option2]);
        $this->getOptions()->shouldContain($option1);
        $this->getOptions()->shouldContain($option2);
    }

    function it_returns_options_in_jsonserializable_data(SelectOption $option1, SelectOption $option2) {
        $this->setOptions([$option1, $option2]);

        $result = $this->basicSerialize();
        $data = $result->getWrappedObject();

        if (!sizeof($data['options'], 2)) {
            throw new Exception('options does not have expected size 2. Actual: ' . sizeof($data['options']));
        }
    }
}
