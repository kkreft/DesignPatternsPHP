<?php

/*
 * DesignPatternPHP
 */

namespace DesignPatterns\Mediator;

/**
 * MediatorInterface is a contract for the Mediator
 * This interface is not mandatory but it is better for LSP concerns.
 */
interface MediatorInterface
{
    public function sendResponse($content);

    public function makeRequest();

    public function queryDb();
}
