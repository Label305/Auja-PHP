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
 * Represents a message in Auja.
 *
 * @author  Niek Haarman - <niek@label305.com>
 *
 * @package Label305\Auja\Shared
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
class Message extends AujaItem {

    const TYPE = "message";

    /**
     * @var String The state, e.g. 'info'.
     */
    private $state;

    /**
     * @var String The message to show.
     */
    private $contents;

    /**
     * @var bool The authentication status.
     */
    private $authenticated;

    public function getType() {
        return self::TYPE;
    }

    /**
     * @return String The message that will be displayed.
     */
    public function getContents() {
        return $this->contents;
    }

    /**
     * @param String $contents The message to display.
     */
    public function setContents($contents) {
        $this->contents = $contents;
    }

    /**
     * @return String The state, e.g. 'info'.
     */
    public function getState() {
        return $this->state;
    }

    /**
     * @param String $state The state, e.g. 'info'.
     */
    public function setState($state) {
        $this->state = $state;
    }

    /**
     * @return bool The authenticated state.
     */
    public function isAuthenticated() {
        return $this->authenticated;
    }

    /**
     * @param bool|null $authenticated The authenticated state, or null if not set.
     */
    public function setAuthenticated($authenticated) {
        $this->authenticated = $authenticated;
    }

    public function jsonSerialize() {
        $result = array();

        if (!is_null($this->state)) {
            $result['state'] = $this->state;
        }

        if (!is_null($this->contents)) {
            $result['contents'] = $this->contents;
        }

        if (!is_null($this->authenticated)) {
            $result['authenticated'] = $this->authenticated;
        }

        return $result;
    }

}