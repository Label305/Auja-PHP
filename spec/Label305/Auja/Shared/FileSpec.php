<?php

namespace spec\Label305\Auja\Shared;

set_include_path(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . PATH_SEPARATOR . get_include_path());
require_once('BaseSpec.php'); // TODO: can this be prettier?

use Prophecy\Argument;
use spec\Label305\Auja\BaseSpec;

class FileSpec extends BaseSpec {

    function it_is_initializable() {
        $this->shouldHaveType('Label305\Auja\Shared\File');
    }

    function it_has_a_message_type(){
        $this->getType()->shouldBe('file');
    }

    function it_has_a_reference() {
        $this->setReference('1');
        $this->getReference()->shouldBe('1');
    }

    function it_has_a_filename() {
        $this->setName('name.jpg');
        $this->getName()->shouldBe('name.jpg');
    }

    function it_has_a_mime_type() {
        $this->setMimetype('application/json');
        $this->getMimetype()->shouldBe('application/json');
    }

    function it_has_a_thumbnail() {
        $this->setThumbnail('http://www.google.com/thumb.jpg');
        $this->getThumbnail()->shouldBe('http://www.google.com/thumb.jpg');
    }

    function it_has_an_error() {
        $this->setError('my error description');
        $this->getError()->shouldBe('my error description');
    }

    function it_can_return_basic_serializable_data() {
        $this->setReference('1');
        $this->setName('name.jpg');
        $this->setMimetype('application/json');
        $this->setThumbnail('http://www.google.com/thumb.jpg');

        $this->basicSerialize()->shouldHaveKeys(array(
            'ref',
            'name',
            'type',
            'thumbnail'
        ));
    }

    function it_can_return_basic_serializable_data_with_error() {
        $this->setError('my error description');

        $this->basicSerialize()->shouldHaveKeys(array(
            'error'
        ));
    }

    function it_can_return_empty_basic_serializable_data() {
        $this->basicSerialize()->shouldBeArray();
    }

}