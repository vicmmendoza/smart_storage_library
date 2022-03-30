<?php

namespace Vic\Application\Create;

use Vic\Domain\Library;
use Vic\Domain\LibraryValue;
use Vic\Application\LibraryCommand;
use Vic\Application\Create\LibraryCreator;

final class CreateLibraryCommandHandler
{

    private LibraryCreator $creator;

    public function __construct(LibraryCreator $creator)
    {
        $this->creator = $creator;
    }

    public function __invoke(LibraryCommand $command): ?Library
    {
        $value             = new LibraryValue($command->value());
        
        return $this->creator->__invoke($value);
    }
}