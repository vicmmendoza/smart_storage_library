<?php

namespace Vic\Application\Create;

use Vic\Domain\LibraryValue;
use Vic\Application\Create\LibraryCreator;
use Vic\Application\LibraryCommand;

final class CreateLibraryCommandHandler
{

    private LibraryCreator $creator;

    public function __construct(LibraryCreator $creator)
    {
        $this->creator = $creator;
    }

    public function __invoke(LibraryCommand $command): void
    {
        $value             = new LibraryValue($command->value());
        
        $this->creator->__invoke($value);
    }
}