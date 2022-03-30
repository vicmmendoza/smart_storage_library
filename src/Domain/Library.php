<?php

namespace Vic\Domain;

use Vic\Domain\LibraryValue;

final class Library
{

    private $value;

    public function __construct(LibraryValue $value)
    {
        $this->value = $value;
    }

    public function value() :LibraryValue
    {
        return $this->value;
    }
}


