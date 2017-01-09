<?php

/*
 * DesignPatternPHP
 */

namespace DesignPatterns\Adapter;

/**
 * PaperBookInterface is a contract for a book.
 */
interface PaperBookInterface
{
    public function turnPage();

    public function open();
}
