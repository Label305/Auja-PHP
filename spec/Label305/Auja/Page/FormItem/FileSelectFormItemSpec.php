<?php


namespace spec\Label305\Auja\Page\FormItem;

set_include_path(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . PATH_SEPARATOR . get_include_path());
require_once('BaseSpec.php'); // TODO: can this be prettier?

use Label305\Auja\Exceptions\ObjectNotAFileException;
use Label305\Auja\Shared\Button;
use Label305\Auja\Shared\File;
use spec\Label305\Auja\BaseSpec;


class FileSelectFormItemSpec extends BaseSpec  {

    function it_is_initializable()
    {
        $this->shouldHaveType('Label305\Auja\Page\FormItem\FileSelectFormItem');
    }

    function it_has_type_textarea()
    {
        $this->getType()->shouldBe('file_select');
    }

    function it_has_a_target()
    {
        $this->setTarget('http://mytargeturl');
        $this->getTarget()->shouldBe('http://mytargeturl');
    }

    function it_can_be_multiple()
    {
        $this->setMultiple(true);
        $this->isMultiple()->shouldBe(true);
    }

    function it_can_not_be_multiple()
    {
        $this->setMultiple(false);
        $this->isMultiple()->shouldBe(false);
    }

    function it_can_have_files()
    {
        $files = [ new File(), new File() ];

        $this->setFiles($files);
        $this->getFiles()->shouldBe($files);
    }


    function it_can_not_have_something_else_than_files()
    {
        $files = [ new File(), 'bla' ];

        $this->shouldThrow('Label305\Auja\Exceptions\ObjectNotAFileException')->duringSetFiles($files);

        $files = [ new File(), new Button() ];

        $this->shouldThrow('Label305\Auja\Exceptions\ObjectNotAFileException')->duringSetFiles($files);

        $files = [ new File(), 1 ];

        $this->shouldThrow('Label305\Auja\Exceptions\ObjectNotAFileException')->duringSetFiles($files);
    }

    function it_can_return_basic_serializable_data_with_multiple()
    {
        $this->setFiles([ new File(), new File() ]);
        $this->setMultiple(true);
        $this->setTarget('http://mytargeturl');

        $this->basicSerialize()->shouldHaveKeys(array(
            'files',
            'multiple',
            'target'
        ));
    }

    function it_can_return_basic_serializable_data_with_single()
    {
        $this->setFiles([ new File() ]);
        $this->setMultiple(false);
        $this->setTarget('http://mytargeturl');

        $this->basicSerialize()->shouldHaveKeys(array(
            'file',
            'multiple',
            'target'
        ));
    }

}