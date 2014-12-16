<?php
/**
 * Created by PhpStorm.
 * User: Thijs
 * Date: 16-12-14
 * Time: 10:25
 */

namespace Label305\Auja\Menu;


class SortableMenuItem  extends MenuItem {

    const TYPE = 'sortable_item';

    /**
     * @var String The text to display.
     */
    private $text;

    /**
     * @var String The target.
     */
    private $target;

    /**
     * @var int Identifier.
     */
    private $id;

    /**
     * @var int left identifier for tree.
     */
    private $left;

    /**
     * @var int right identifier for tree.
     */
    private $right;

    /**
     * @return String get the type
     */
    public function getMenuType() {
        return self::TYPE;
    }

    /**
     * @return String The text to display.
     */
    public function getText() {
        return $this->text;
    }

    /**
     * @param String $name The text to display.
     * @return $this
     */
    public function setText($name) {
        $this->text = $name;
        return $this;
    }

    /**
     * @return String
     */
    public function getTarget() {
        return $this->target;
    }

    /**
     * @param String $target
     * @return $this
     */
    public function setTarget($target) {
        $this->target = $target;
        return $this;
    }

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getLeft() {
        return $this->left;
    }

    /**
     * @param int $left
     * @return $this
     */
    public function setLeft($left) {
        $this->left = $left;
        return $this;
    }

    /**
     * @return int
     */
    public function getRight() {
        return $this->right;
    }

    /**
     * @param int $right
     * @return $this
     */
    public function setRight($right) {
        $this->right = $right;
        return $this;
    }

    /**
     * @return array
     */
    public function getTypeProperties() {
        return [
            'id' => (int) $this->id,
            'text' => $this->text,
            'target' => $this->target,
            'left' => (int) $this->left,
            'right' => (int) $this->right
        ];
    }

}