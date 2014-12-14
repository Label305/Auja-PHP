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

namespace spec\Label305\Auja\Main;

set_include_path(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . PATH_SEPARATOR . get_include_path());
require_once('BaseSpec.php'); // TODO: can this be prettier?

use Label305\Auja\Page\Form;
use spec\Label305\Auja\BaseSpec;

use Label305\Auja\Shared\Button;
use Label305\Auja\Main\Item;

class MainSpec extends BaseSpec {

    function it_is_initializable() {
        $this->shouldHaveType('Label305\Auja\Main\Main');
    }

    function it_has_an_auja_type() {
        $this->getType()->shouldBe('main');
    }

    function it_has_a_title() {
        $this->setTitle('MyTitle');
        $this->getTitle()->shouldBe('MyTitle');
    }

    function it_has_an_authenticated_state() {
        $this->setAuthenticated(true);
        $this->isAuthenticated()->shouldBe(true);
    }

    function it_has_a_debug_state() {
        $this->setDebug(true);
        $this->isDebug()->shouldBe(true);

        $this->setDebug(false);
        $this->isDebug()->shouldBe(false);
    }

    function it_has_colors() {
        $this->setColor('main', '#00ff00');

        $this->getColors()->shouldBeArray();
        $this->getColors()->shouldHaveKeyValuePair('main', '#00ff00');
    }

    function it_has_a_username() {
        $this->setUsername('Name');
        $this->getUsername()->shouldBe('Name');
    }

    function it_has_buttons(Button $button1, Button $button2) {
        $this->addButton($button1);
        $this->addButton($button2);

        $this->getButtons()->shouldBeArray();
        $this->getButtons()->shouldContain($button1);
        $this->getButtons()->shouldContain($button2);
    }

    function it_has_items(Item $item1, Item $item2) {
        $this->addItem($item1);
        $this->addItem($item2);

        $this->getItems()->shouldBeArray();
        $this->getItems()->shouldContain($item1);
        $this->getItems()->shouldContain($item2);
    }

    function it_has_an_authentication_form(Form $form) {
        $this->setAuthenticationForm($form);
        $this->getAuthenticationForm()->shouldBe($form);
    }

    function it_can_return_basic_serializable_data(Button $button, Form $form, Item $item) {
        $this->addButton($button);
        $this->setAuthenticationForm($form);
        $this->addItem($item);
        $this->setAuthenticated(true);

        $this->basicSerialize()->shouldHaveKeys(array(
            'title',
            'authenticated',
            'debug',
            'colors',
            'user',
            'buttons',
            'menu',
            'authentication'
        ));
    }

    function it_can_return_basic_serializable_data_without_an_authentication_form() {
        $this->setAuthenticated(true);
        $this->basicSerialize()->shouldHaveKeys(array(
            'title',
            'authenticated',
            'debug',
            'colors',
            'user',
            'buttons',
            'menu'
        ));
    }

    function it_only_returns_non_sensitive_data_when_not_authenticated() {
        $this->basicSerialize()->shouldHaveKeys(array(
            'title',
            'authenticated',
            'debug',
            'colors',
        ));

        $this->basicSerialize()->shouldNotHaveKeys(array(
            'user',
            'buttons',
            'menu'
        ));
    }
}