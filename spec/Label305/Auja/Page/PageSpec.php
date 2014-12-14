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

use spec\Label305\Auja\BaseSpec;

use Label305\Auja\Page\PageComponent;

class PageSpec extends BaseSpec {

    function it_is_initializable() {
        $this->shouldHaveType('Label305\Auja\Page\Page');
    }

    function it_has_a_page_type() {
        $this->getType()->shouldBe('page');
    }

    function it_has_a_collection_of_page_components(PageComponent $pageComponent) {
        $this->addPageComponent($pageComponent);
    }

    function it_can_return_the_collection_of_page_components(PageComponent $pageComponent1, PageComponent $pageComponent2) {
        $this->addPageComponent($pageComponent1);
        $this->addPageComponent($pageComponent2);

        $this->getPageComponents()->shouldBeArray();
        $this->getPageComponents()->shouldContain($pageComponent1);
        $this->getPageComponents()->shouldContain($pageComponent2);
    }

    function it_can_insert_page_components(PageComponent $pageComponent1, PageComponent $pageComponent2, PageComponent $pageComponent3) {
        $this->addPageComponent($pageComponent1);
        $this->addPageComponent($pageComponent2, 0);
        $this->addPageComponent($pageComponent3, 1);

        $this->getPageComponents()->shouldHaveItemAtPosition($pageComponent2, 0);
        $this->getPageComponents()->shouldHaveItemAtPosition($pageComponent3, 1);
        $this->getPageComponents()->shouldHaveItemAtPosition($pageComponent1, 2);
    }

    function it_throws_an_exception_on_invalid_position_parameter(PageComponent $pageComponent) {
        $this->shouldThrow('\InvalidArgumentException')->duringAddPageComponent($pageComponent, 'Hello');
    }

    function it_can_return_json_serializable_data(PageComponent $pageComponent1, PageComponent $pageComponent2) {
        $this->addPageComponent($pageComponent1);
        $this->addPageComponent($pageComponent2);

        $this->basicSerialize()->shouldHaveCount(2);

        $pageComponent1->aujaSerialize()->shouldBeCalled();
        $pageComponent2->aujaSerialize()->shouldBeCalled();
    }

}
