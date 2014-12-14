<?php

namespace spec\Label305\Auja\Shared;

set_include_path(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . PATH_SEPARATOR . get_include_path());
require_once('BaseSpec.php'); // TODO: can this be prettier?

use Prophecy\Argument;
use spec\Label305\Auja\BaseSpec;

class MessageSpec extends BaseSpec {

    function it_is_initializable() {
        $this->shouldHaveType('Label305\Auja\Shared\Message');
    }

    function it_has_a_message_type(){
        $this->getType()->shouldBe('message');
    }

    function it_has_a_state() {
        $this->setState('info');
        $this->getState()->shouldBe('info');
    }

    function it_has_contents() {
        $this->setContents('Contents');
        $this->getContents()->shouldBe('Contents');
    }

    function it_has_an_authenticated_state() {
        $this->setAuthenticated(true);
        $this->isAuthenticated()->shouldBe(true);
    }

    function it_can_return_json_serializable_data() {
        $this->setState('info');
        $this->setContents('contents');
        $this->setAuthenticated(true);
        $this->basicSerialize()->shouldHaveKeys(array(
            'state',
            'contents',
            'authenticated'
        ));
    }

    function it_can_return_empty_json_serializable_data() {
        $this->basicSerialize()->shouldBeArray();
    }
}
