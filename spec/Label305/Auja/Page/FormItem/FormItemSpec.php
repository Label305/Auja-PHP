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

set_include_path(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . PATH_SEPARATOR . get_include_path());
require_once('BaseSpec.php'); // TODO: can this be prettier?

use spec\Label305\Auja\BaseSpec;

class FormItemSpec extends BaseSpec {

    function it_is_initializable() {
        /* We need a not abstract implementation to test */
        $this->beAnInstanceOf('Label305\Auja\Page\FormItem\TextFormItem');
        $this->shouldHaveType('Label305\Auja\Page\FormItem\FormItem');
    }

    function it_has_a_label() {
        $this->beAnInstanceOf('Label305\Auja\Page\FormItem\TextFormItem');

        $this->setLabel('Label');
        $this->getLabel()->shouldBe('Label');
    }

    function it_has_a_name() {
        $this->beAnInstanceOf('Label305\Auja\Page\FormItem\TextFormItem');

        $this->setName('Name');
        $this->getName()->shouldBe('Name');
    }

    function it_has_a_value() {
        $this->beAnInstanceOf('Label305\Auja\Page\FormItem\TextFormItem');

        $this->setValue('Value');
        $this->getValue()->shouldBe('Value');
    }

    function it_has_a_required_state(){
        $this->beAnInstanceOf('Label305\Auja\Page\FormItem\TextFormItem');

        $this->setRequired(true);
        $this->isRequired()->shouldBe(true);

        $this->setRequired(false);
        $this->isRequired()->shouldBe(false);
    }

    function it_can_return_json_serializable_data() {
        $this->beAnInstanceOf('Label305\Auja\Page\FormItem\TextFormItem');

        $this->setLabel('Label');
        $this->setName('Name');
        $this->setValue('Value');
        $this->setRequired(true);

        $this->jsonSerialize()->shouldHaveCount(4);
        $this->jsonSerialize()->shouldHaveKeyValuePair('label', 'Label');
        $this->jsonSerialize()->shouldHaveKeyValuePair('name', 'Name');
        $this->jsonSerialize()->shouldHaveKeyValuePair('value', 'Value');
        $this->jsonSerialize()->shouldHaveKeyValuePair('required', 'true');
    }
}
