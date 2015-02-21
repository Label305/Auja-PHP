<?php


namespace Label305\Auja\Shared;


use Label305\Auja\AujaItem;

class File extends AujaItem {

    const TYPE = 'file';

    public function getType() {
        return self::TYPE;
    }

    /**
     * @var String|null If error set this property, if no error leave it null.
     */
    private $error;

    /**
     * @var String The file name
     */
    private $name;

    /**
     * @var String|Int The internal reference kept to the file (for example the id)
     */
    private $reference;

    /**
     * @var String URL to the thumbnail for the file.
     */
    private $thumbnail;

    /**
     * @var String MimeType of the file.
     */
    private $mimetype;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param mixed $reference
     * @return $this
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @param mixed $thumbnail
     * @return $this
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMimetype()
    {
        return $this->mimetype;
    }

    /**
     * @param mixed $mimetype
     * @return $this
     */
    public function setMimetype($mimetype)
    {
        $this->mimetype = $mimetype;
        return $this;
    }

    /**
     * @return null|String
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param null|String $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }

    /**
     * @return array An `array` of key-value pairs of properties of this `AujaItem`.
     */
    public function basicSerialize()
    {
        $error = $this->getError();

        if ($error == null) {
            return ['error' => $error];
        }

        $result = [
            'name' => $this->getName(),
            'thumbnail' => $this->getThumbnail(),
            'type' => $this->getType()
        ];

        $reference = $this->getReference();

        if ($reference !== null) {
            $result['ref'] = $reference;
        }

        return $result;
    }



}