<?php

/*
 * DesignPatternPHP
 */

namespace DesignPatterns\Tests\Facade;

use DesignPatterns\Facade\Facade as Computer;

/**
 * FacadeTest shows example of facades.
 */
class FacadeTest extends \PHPUnit_Framework_TestCase
{
    public function getComputer()
    {
        $bios = $this->getMockBuilder('DesignPatterns\Facade\BiosInterface')
                ->setMethods(['launch', 'execute', 'waitForKeyPress'])
                ->disableAutoload()
                ->getMock();
        $operatingSys = $this->getMockBuilder('DesignPatterns\Facade\OsInterface')
                ->setMethods(['getName'])
                ->disableAutoload()
                ->getMock();
        $bios->expects($this->once())
                ->method('launch')
                ->with($operatingSys);
        $operatingSys
                ->expects($this->once())
                ->method('getName')
                ->will($this->returnValue('Linux'));

        $facade = new Computer($bios, $operatingSys);

        return [[$facade, $operatingSys]];
    }

    /**
     * @dataProvider getComputer
     */
    public function testComputerOn(Computer $facade, $os)
    {
        // interface is simpler :
        $facade->turnOn();
        // but I can access to lower component
        $this->assertEquals('Linux', $os->getName());
    }
}
