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

namespace Label305\Auja\Shared;

use Label305\Auja\AujaItem;

/**
 * A class for providing a Button.
 *
 * This class can be used to add a button to some Auja component.
 * It consists of:
 *  - A title;
 *  - A target URL;
 *  - An optional confirmation message.
 *
 * @author  Niek Haarman - <niek@label305.com>
 *
 * @package Label305\Auja
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
class Button extends AujaItem {

    /**
     * @var String The text on this `Button`.
     */
    private $text;

    /**
     * @var String The confirmation message, or `null` for no confirmation.
     */
    private $confirmationMessage;

    /**
     * @var String The target URL of this `Button`.
     */
    private $target;

    /**
     * @var String The HTTP method used.
     */
    private $method;

    public function getType() {
        /* Type is not used */
        return null;
    }

    /**
     * @return String The title text on this `Button`.
     */
    public function getText() {
        return $this->text;
    }

    /**
     * @param String $text The text on this `Button`.
     */
    public function setText($text) {
        $this->text = $text;
    }

    /**
     * @param String|null $confirmationMessage The confirmation message. `null` for no confirmation.
     */
    public function setConfirmationMessage($confirmationMessage) {
        $this->confirmationMessage = $confirmationMessage;
    }

    /**
     * @return String|null The confirmation message. `null` for no confirmation.
     */
    public function getConfirmationMessage() {
        return $this->confirmationMessage;
    }

    /**
     * @return String The target URL.
     */
    public function getTarget() {
        return $this->target;
    }

    /**
     * @param String $target The target URL.
     */
    public function setTarget($target) {
        $this->target = $target;
    }

    /**
     * @return String The HTTP method that is used.
     */
    public function getMethod() {
        return $this->method;
    }

    /**
     * @param String $method The HTTP method to use.
     */
    public function setMethod($method) {
        $this->method = $method;
    }

    public function jsonSerialize() {
        $result = array();

        $result['text'] = $this->text;
        $result['target'] = $this->target;
        $result['method'] = $this->method;

        if (!is_null($this->confirmationMessage)) {
            $result['confirm'] = $this->confirmationMessage;
        }

        return $result;
    }

    /**
     * Overridden to return the direct result of `jsonSerialize()`.
     *
     * @return array The result of `jsonSerialize()`.
     */
    public function aujaSerialize() {
        return $this->jsonSerialize();
    }
}
