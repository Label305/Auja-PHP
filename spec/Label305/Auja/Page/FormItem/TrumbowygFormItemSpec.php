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

use Label305\Auja\Page\FormItem\Selectbutton;
use spec\Label305\Auja\BaseSpec;

class TrumbowygFormItemSpec extends BaseSpec {

    function it_is_initializable() {
        $this->shouldHaveType('Label305\Auja\Page\FormItem\TrumbowygFormItem');
    }

    function it_has_type_select() {
        $this->getType()->shouldBe('trumbowyg');
    }

    function it_has_buttons() {
        $button1 = 'bold';
        $button2 = 'italic';
        $this->getButtons()->shouldNotBeArray();
        $this->addButton($button1);
        $this->addButton($button2);
        $this->getButtons()->shouldContain($button1);
        $this->getButtons()->shouldContain($button2);
        $this->getButtons()->shouldBeArray();
    }

    function it_can_mass_assign_buttons() {
        $button1 = 'bold';
        $button2 = 'italic';
        $this->setButtons([$button1, $button2]);
        $this->getButtons()->shouldContain($button1);
        $this->getButtons()->shouldContain($button2);
    }

    function it_returns_buttons_in_basic_serializable_data() {
        $button1 = 'bold';
        $button2 = 'italic';
        $this->setButtons([$button1, $button2]);

        $result = $this->basicSerialize();
        $data = $result->getWrappedObject();

        if (!sizeof($data['buttons'], 2)) {
            throw new Exception('buttons does not have expected size 2. Actual: ' . sizeof($data['buttons']));
        }
    }
    
    function it_should_not_return_buttons_when_none_set_in_basic_serializable_data() {
        $result = $this->basicSerialize();
        $data = $result->getWrappedObject();
        
        if(array_key_exists('buttons', $data)) {
            throw new Exception('buttons in serialized data while none specified');
        }
    }
}
