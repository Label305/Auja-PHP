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

set_include_path(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . PATH_SEPARATOR . get_include_path());
require_once('BaseSpec.php'); // TODO: can this be prettier?

use Label305\Auja\Menu\MenuItem;
use Label305\Auja\Menu\ResourceMenuItem;
use spec\Label305\Auja\BaseSpec;

class ResourceSpec extends BaseSpec {

    function it_is_initializable() {
        $this->shouldHaveType('Label305\Auja\Menu\Resource');
    }

    function it_should_have_a_type_of_items() {
        $this->getType()->shouldBe('items');
    }

    function it_has_a_collection_of_MenuItems(MenuItem $linkMenuItem1, MenuItem $linkMenuItem2) {
        $this->addItem($linkMenuItem1);
        $this->addItem($linkMenuItem2);

        $this->getItems()->shouldHaveCount(2);
        $this->getItems()->shouldContain($linkMenuItem1);
        $this->getItems()->shouldContain($linkMenuItem2);
    }

    function it_does_not_accept_a_ResourceMenuItem(ResourceMenuItem $resourceMenuItem){
        $this->shouldThrow('\InvalidArgumentException')->during('addItem', [$resourceMenuItem]);
    }

    function it_has_a_next_page_url() {
        $this->setNextPageUrl('url');
        $this->getNextPageUrl()->shouldBe('url');
    }

    function it_has_a_last_page_url() {
        $this->setLastPageUrl('url');
        $this->getLastPageUrl()->shouldBe('url');
    }

    function it_can_return_basic_serializable_data(MenuItem $linkMenuItem) {
        $this->addItem($linkMenuItem);

        $linkMenuItem->basicSerialize()->shouldBeCalled();
        $this->basicSerialize()->shouldHaveCount(1);
    }

    function it_adds_an_extra_paging_section_to_aujaSerialize() {
        $this->setNextPageUrl('url');

        $this->aujaSerialize()->shouldHaveCount(3);
        $this->aujaSerialize()->shouldHaveKeys([
            'type',
            'items',
            'paging'
        ]);
    }

    function it_adds_no_extra_paging_section_if_not_necessary() {
        $this->aujaSerialize()->shouldHaveCount(2);
        $this->aujaSerialize()->shouldHaveKeys([
            'type',
            'items'
        ]);
    }
}
