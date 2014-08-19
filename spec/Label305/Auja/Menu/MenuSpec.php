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

use Label305\Auja\Menu\MenuItem;

class MenuSpec extends BaseSpec {

    function it_is_initializable() {
        $this->shouldHaveType('Label305\Auja\Menu\Menu');
    }

    function it_has_a_menu_type() {
        $this->getType()->shouldBe('menu');
    }

    function it_has_a_collection_of_menu_items(MenuItem $menuItem) {
        $this->addMenuItem($menuItem);
    }

    function it_can_return_the_collection_of_menu_items(MenuItem $menuItem1, MenuItem $menuItem2) {
        $this->addMenuItem($menuItem1);
        $this->addMenuItem($menuItem2);

        $this->getMenuItems()->shouldBeArray();
        $this->getMenuItems()->shouldContain($menuItem1);
        $this->getMenuItems()->shouldContain($menuItem2);
    }

    function it_can_insert_menu_items(MenuItem $menuItem1, MenuItem $menuItem2) {
        $this->addMenuItem($menuItem1);
        $this->addMenuItem($menuItem2, 0);

        $this->getMenuItems()->shouldHaveItemAtPosition($menuItem2, 0);
        $this->getMenuItems()->shouldHaveItemAtPosition($menuItem1, 1);
    }

    function it_throws_an_exception_on_invalid_position_parameter(MenuItem $menuItem){
        $this->shouldThrow('\InvalidArgumentException')->duringAddMenuitem($menuItem, 'Hello');
    }

    function it_can_return_json_serializable_data(MenuItem $menuItem1, MenuItem $menuItem2) {
        $this->addMenuItem($menuItem1);
        $this->addMenuItem($menuItem2);

        $this->jsonSerialize()->shouldHaveCount(2);

        $menuItem1->jsonSerialize()->shouldBeCalled();
        $menuItem2->jsonSerialize()->shouldBeCalled();
    }
}
