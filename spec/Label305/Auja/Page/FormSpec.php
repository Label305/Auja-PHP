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

namespace spec\Label305\Auja\Page;

set_include_path(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . PATH_SEPARATOR . get_include_path());
require_once('BaseSpec.php'); // TODO: can this be prettier?

use Label305\Auja\Page\FormItem\FormItem;
use spec\Label305\Auja\BaseSpec;

class FormSpec extends BaseSpec {

    function it_is_initializable() {
        $this->shouldHaveType('Label305\Auja\Page\Form');
    }

    function it_has_a_form_type() {
        $this->getType()->shouldBe('form');
    }

    function it_has_an_action(){
        $this->getAction()->shouldBeNull();
        $this->setAction('Action');
        $this->getAction()->shouldBe('Action');
    }

    function it_has_a_method(){
        $this->getMethod()->shouldBe('GET');
        $this->setMethod('POST');
        $this->getMethod()->shouldBe('POST');
    }

    function it_has_a_collection_of_FormItems(FormItem $formItem1, FormItem $formItem2){
        $this->getFormItems()->shouldBeArray();
        $this->getFormItems()->shouldBeEmpty();

        $this->addFormItem($formItem1);
        $this->addFormItem($formItem2);

        $this->getFormItems()->shouldHaveCount(2);
        $this->getFormItems()->shouldContain($formItem1);
        $this->getFormItems()->shouldContain($formItem2);
    }

    function it_can_return_basic_serializable_data(FormItem $formItem){
        $this->addFormItem($formItem);

        $this->basicSerialize()->shouldHaveCount(3);
        $this->basicSerialize()->shouldHaveKeys([
            'action',
            'method',
            'items'
        ]);
    }
}
