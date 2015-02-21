<?php


namespace Label305\Auja\Page\FormItem;


use Label305\Auja\Exceptions\ObjectNotAFileException;
use Label305\Auja\Shared\File;

class FileSelectFormItem extends FormItem {

    const TYPE = 'file_select';

    public function getType() {
        return self::TYPE;
    }

    /**
     * @var String Target URL for uploading request
     */
    private $target;

    /**
     * @var array Array of files that have been uploaded already
     */
    private $files;

    /**
     * @var Boolean Should allow for multiple file uploads
     */
    private $multiple;

    /**
     * @return array
     */
    public function basicSerialize()
    {
        $result = array();

        $result['name'] = $this->getName();
        $result['label'] = $this->getLabel();
        $result['required'] = $this->isRequired();

        if ($this->isMultiple()) {
            $result['multiple'] = false;
            $result['target'] = $this->getTarget();

            foreach ($this->getFiles() as $file) {
                $result['files'][] = $file->basicSerialize();
            }
        }

        $result['multiple'] = false;
        $result['target'] = $this->getTarget();

        if (count($this->getFiles()) > 0) {
            $result['file'] = $this->getFiles()[0]->basicSerialize();
        }

        return $result;
    }

    /**
     * @return boolean
     */
    public function isMultiple()
    {
        return $this->multiple === true;
    }

    /**
     * @param boolean $multiple
     * @return $this
     */
    public function setMultiple($multiple)
    {
        $this->multiple = $multiple === true;
        return $this;
    }

    /**
     * @return String
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * @param String $target
     * @return $this
     */
    public function setTarget($target)
    {
        $this->target = $target;
        return $this;
    }

    /**
     * @return array
     */
    public function getFiles()
    {
        if ($this->files === null) {
            return [];
        }

        return $this->files;
    }

    /**
     * If 'multiple' is set to false, make sure to only enter an array with a single value
     *
     * @param array $files Array of File Objects
     * @return $this
     * @throws ObjectNotAFileException
     */
    public function setFiles(array $files)
    {
        foreach($files as $file) {
            if (!$file instanceof File) {
                throw new ObjectNotAFileException($file . ' is not a file');
            }
        }

        $this->files = $files;
        return $this;
    }


}
