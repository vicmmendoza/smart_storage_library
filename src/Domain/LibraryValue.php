<?php

namespace Vic\Domain;

final class LibraryValue 
{

    protected $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function value()
    {
        return $this->value;
    }

}


