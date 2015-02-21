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

use Label305\Auja\Shared\Button;
use Prophecy\Argument;
use spec\Label305\Auja\BaseSpec;

class PageHeaderSpec extends BaseSpec  {

    function it_is_initializable() {
        $this->shouldHaveType('Label305\Auja\Page\PageHeader');
    }

    function it_has_a_header_type(){
        $this->getType()->shouldBe('header');
    }

    function it_has_text(){
        $this->setText('Text');
        $this->getText()->shouldBe('Text');
    }

    function it_has_buttons(Button $button) {
        $this->addButton($button);
        $this->getButtons()->shouldBeArray();
        $this->getButtons()[0]->shouldBe($button);
    }

    function it_can_return_basic_serializable_data(Button $button){
        $this->setText('Text');
        $this->addButton($button);
        $button->basicSerialize()->shouldBeCalled();

        $this->basicSerialize()->shouldHaveCount(2);
        $this->basicSerialize()->shouldHaveKeyValuePair('text', 'Text');
        $this->basicSerialize()->shouldHaveKey('buttons');
        $this->basicSerialize()['buttons']->shouldBeArray();
        $this->basicSerialize()['buttons']->shouldHaveCount(1);
    }
}
