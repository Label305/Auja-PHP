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

namespace Label305\Auja\Main;

use Label305\Auja\AujaItem;
use Label305\Auja\Page\Form;
use Label305\Auja\Shared\Button;

/**
 * A class which represents the initial Auja setup.
 *
 * @author  Niek Haarman - <niek@label305.com>
 *
 * @package Label305\Auja
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
class Main extends AujaItem {

    const TYPE = "main";

    const COLOR_MAIN = "main";

    const COLOR_SECONDARY = "secondary";

    const COLOR_ALERT = "alert";

    /**
     * @var String The title.
     */
    private $title;

    /**
     * @var bool Whether debug mode is active.
     */
    private $debug = false;

    /**
     * @var bool Whether the user is authenticated.
     */
    private $authenticated = false;

    /**
     * @var String The name of the logged in user.
     */
    private $username;

    /**
     * @var array The colors per category. See the COLOR constants in this class for the categories.
     */
    private $colors = array();

    /**
     * @var Button[] The buttons to display. Usually contains a 'logout' button.
     */
    private $buttons = array();

    /**
     * @var Item[] The items to display. // TODO think of a better name.
     */
    private $items = array();

    /**
     * @var Form The authentication `Form`, or `null` if none.
     */
    private $authentication;

    /**
     * @return String The type of the AujaItem.
     */
    function getType() {
        return self::TYPE;
    }

    /**
     * @param String $title The title.
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * @return String The title.
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param bool $authenticated Whether the user is authenticated.
     */
    public function setAuthenticated($authenticated) {
        $this->authenticated = $authenticated;
    }

    /**
     * @return bool Whether the user is authenticated.
     */
    public function isAuthenticated() {
        return $this->authenticated;
    }

    /**
     * @param bool $debug Whether to activate debug mode.
     */
    public function setDebug($debug) {
        $this->debug = $debug;
    }

    /**
     * @return bool whether debug mode is active.
     */
    public function isDebug() {
        return $this->debug;
    }

    /**
     * Sets the color for given category.
     *
     * @param $category String The category. See the COLOR constants in this class for the categories.
     * @param $color    String The hexadecimal color value, e.g. '#FF0000'.
     */
    public function setColor($category, $color) {
        $this->colors[$category] = $color;
    }

    /**
     * @return array A key value pair of categories and their colors.
     */
    public function getColors() {
        return $this->colors;
    }

    /**
     * @param String $username The username.
     */
    public function setUsername($username) {
        $this->username = $username;
    }

    /**
     * @return String The username.
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * @param Button $button The Button to add.
     */
    public function addButton(Button $button) {
        $this->buttons[] = $button;
    }

    /**
     * @param Item $item The Item to add.
     */
    public function addItem(Item $item) {
        $this->items[] = $item;
    }

    /**
     * @return Button[] The Buttons in this Auja instance.
     */
    public function getButtons() {
        return $this->buttons;
    }

    /**
     * @return Item[] The Items in this Auja instance.
     */
    public function getItems() {
        return $this->items;
    }

    /**
     * @return Form|null The authentication `Form`, or `null` if none.
     */
    public function getAuthenticationForm() {
        return $this->authentication;
    }

    /**
     * @param Form|null $authentication The authentication `Form` to use, or `null` if none.
     */
    public function setAuthenticationForm($authentication) {
        $this->authentication = $authentication;
    }

    public function jsonSerialize() {
        $result = array();

        $result['title'] = $this->getTitle();
        $result['authenticated'] = $this->isAuthenticated();
        $result['debug'] = $this->isDebug();
        $result['colors'] = $this->getColors();
        $result['user'] = array('name' => $this->getUsername());

        $result['buttons'] = array();
        foreach($this->getButtons() as $button){
            $result['buttons'][] = $button->jsonSerialize();
        }

        $result['menu'] = array();

        foreach ($this->getItems() as $item) {
            $result['menu'][] = $item->jsonSerialize();
        }

        if ($this->getAuthenticationForm() != null) {
            $result['authentication'] = $this->getAuthenticationForm()->aujaSerialize();
        }

        return $result;
    }
}
