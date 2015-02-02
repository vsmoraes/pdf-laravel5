<?php

class DompdfTest extends PHPUnit_Framework_TestCase
{

    /**
     * @tests
     */
    public function load()
    {
        $stub = $this->getMockBuilder('\DOMPDF')
            ->setMethods(null)
            ->getMock();

        $mock = $this->getMockBuilder('Vsmoraes\Pdf\Dompdf')
            ->setConstructorArgs([$stub])
            ->setMethods(null)
            ->getMock();

        $stub->expects($this->once())
            ->method('load_html');

        $mock->load('<html><head></head><body></body></html>');
    }

}
