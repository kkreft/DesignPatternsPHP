<?php

/*
 * DesignPatternPHP
 */

namespace DesignPatterns\Facade;

/**
 * The primary goal of a Facade Pattern is not to avoid you to read the manual of
 * a complex API. It's only a side-effect.
 *
 * The first goal is to reduce coupling and follow the Law of Demeter.
 *
 * A Facade is meant to decouple a client and a sub-system by embedding
 * many (but sometimes just one) interface, and of course to reduce complexity.
 *
 * 1. A facade does not forbid you the access to the sub-system
 * 2. You can (you should) have multiple facades for one sub-system
 *
 * That's why a good facade has no "new" in it. If there are multiple creations
 * for each method, it is not a Facade, it's a Builder or a
 * [Abstract|Static|Simple] Factory [Method].
 *
 * The best facade has no new and a constructor with interface-type-hinted parameters.
 * If you need creation of new instances, use Factory as argument.
 */
class Facade
{
    protected $opsys;
    protected $bios;

    /**
     * This is the perfect time to use a dependency injection container
     * to creaate an instance of this class.
     */
    public function __construct(BiosInterface $bios, OsInterface $os)
    {
        $this->bios = $bios;
        $this->opsys = $os;
    }

    public function turnOn()
    {
        $this->bios->execute();
        $this->bios->waitForKeyPress();
        $this->bios->launch($this->opsys);
    }

    public function turnOff()
    {
        $this->opsys->halt();
        $this->bios->powerDown();
    }
}
