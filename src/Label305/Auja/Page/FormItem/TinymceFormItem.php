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

namespace Label305\Auja\Page\FormItem;

/**
 * Represents a TinyMCE RTE in a form in Auja.
 *
 * @author  Xander Peuscher - <xander@label305.com>
 *
 * @package Label305\Auja\Page\FormItem
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
class TinymceFormItem extends FormItem {

    const TYPE = 'tinymce';

    public function getType() {
        return self::TYPE;
    }

    /**
     * @var Boolean
     */
    private $hasUploader;

    /**
     * @var String Target URL for uploading request
     */
    private $uploadTarget;

    /**
     * @return String
     */
    public function getHasUploader()
    {
        return $this->hasUploader;
    }

    /**
     * @param String $hasUploader
     * @return $this
     */
    public function setHasUploader($hasUploader)
    {
        $this->hasUploader = $hasUploader;
        return $this;
    }

    /**
     * @return String
     */
    public function getUploadTarget()
    {
        return $this->uploadTarget;
    }

    /**
     * @param String $uploadTarget
     * @return $this
     */
    public function setUploadTarget($uploadTarget)
    {
        $this->uploadTarget = $uploadTarget;
        return $this;
    }


}
