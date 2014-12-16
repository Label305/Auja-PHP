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

use spec\Label305\Auja\BaseSpec;

class SortableMenuItemSpec extends BaseSpec {

    function it_is_initializable() {
        $this->shouldHaveType('Label305\Auja\AujaItem');
        $this->shouldHaveType('Label305\Auja\Menu\MenuItem');
        $this->shouldHaveType('Label305\Auja\Menu\SortableMenuItem');
    }

    function it_has_a_text() {
        $this->beAnInstanceOf('Label305\Auja\Menu\SortableMenuItem');

        $this->setText('Text');
        $this->getText()->shouldBe('Text');
    }

    function it_has_sortable_item_menu_type(){
        $this->getMenuType()->shouldBe('sortable_item');
    }

    function it_has_a_link_target() {
        $this->setTarget('target');
        $this->getTarget()->shouldBe('target');
    }

    function it_has_an_id() {
        $this->setId(978);
        $this->getId()->shouldBe(978);
    }

    function it_has_a_left_id() {
        $this->setLeft(787);
        $this->getLeft()->shouldBe(787);
    }

    function it_has_a_right_id() {
        $this->setRight(875);
        $this->getRight()->shouldBe(875);
    }

    function it_has_type_properties() {
        $this->setTarget('target');
        $this->setText('text');
        $this->setRight(875);
        $this->setLeft(787);
        $this->setId(978);

        $this->getTypeProperties()->shouldBeArray();
        $this->getTypeProperties()->shouldHaveKeyValuePair('target', 'target');
        $this->getTypeProperties()->shouldHaveKeyValuePair('text', 'text');
        $this->getTypeProperties()->shouldHaveKeyValuePair('id', 978);
        $this->getTypeProperties()->shouldHaveKeyValuePair('left', 787);
        $this->getTypeProperties()->shouldHaveKeyValuePair('right', 875);
    }

}
