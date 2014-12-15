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

namespace Label305\Auja\Page;

use Label305\Auja\Page\FormItem\FormItem;

/**
 * Represents a form in Auja.
 *
 * @author  Niek Haarman - <niek@label305.com>
 *
 * @package Label305\Auja\Page
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
class Form extends PageComponent {

    const TYPE = 'form';

    /**
     * @var String The target url to call when submitting this `Form`.
     */
    private $action = null;

    /**
     * @var String The HTTP method to use when submitting this `Form`, such as `POST`, or `PUT`. Defaults to 'GET'.
     */
    private $method = 'GET';

    /**
     * @var FormItem[] The `FormItem`s to show.
     */
    private $items = array();

    function getType() {
        return self::TYPE;
    }

    /**
     * @return String The target url which will be called when submitting this `Form`. Defaults to 'GET'.
     */
    public function getAction() {
        return $this->action;
    }

    /**
     * @param String $action The target url to call when submitting this `Form`.
     */
    public function setAction($action) {
        $this->action = $action;
    }

    /**
     * @return String The HTTP method which is used when submitting this `Form`, such as `POST`, or `PUT`.
     */
    public function getMethod() {
        return $this->method;
    }

    /**
     * @param String $method The HTTP method to use when submitting this `Form`, such as `POST`, or `PUT`. Defaults to 'GET'.
     */
    public function setMethod($method) {
        $this->method = $method;
    }

    /**
     * Adds a `FormItem` to this `Form`.
     *
     * @param FormItem $item The `FormItem` to add.
     */
    public function addFormItem(FormItem $item) {
        $this->items[] = $item;
    }

    /**
     * @return FormItem[] The `FormItem`s which will be displayed.
     */
    public function getFormItems() {
        return $this->items;
    }

    function basicSerialize() {
        $result = array();

        $result['action'] = $this->action;
        $result['method'] = $this->method;
        $result['items'] = array();

        foreach ($this->items as $item) {
            $result['items'][] = $item->aujaSerialize();
        }

        return $result;
    }
}